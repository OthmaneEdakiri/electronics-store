<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function payment(Request $request, Order $order)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success', $order->id),
                "cancel_url" => route('paypal.payment.cancel', $order->id),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
            "currency_code" => "USD",
                        "value" => $order->total_price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('orders.index')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('orders.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentSuccess(Request $request, Order $order)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) & $response['status'] == 'COMPLETED') {
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'paypal',
                'payment_provider_id' => $response['id'],
                'amount' => $order->total_price,
                'status' => 'completed',
                'currency' => 'MAD',
                'paid_at' => now(),
            ]);

            $order->update([
                'status' => 'paid',
            ]);
            $cartItems = CartItem::where("user_id", Auth::id())->get();
            foreach ($cartItems as $item) {
                $item->delete();
            }

            return redirect()
                ->route('orders.index')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('orders.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function paymentCancel(Order $order)
    {
        $order->update([
            'status' => 'cancelled'
        ]);
        return redirect()
            ->route('orders.index')
            ->with('error', 'Payment cancelled.');
    }
}
