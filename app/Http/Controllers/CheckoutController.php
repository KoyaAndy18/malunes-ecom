<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout');
    }

    public function process(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => 5000, // Amount in cents ($50.00)
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Order Payment',
            ]);

            // Payment successful
            Session::flash('success', 'Payment successful! Thank you for your order.');
            return redirect()->route('checkout');

        } catch (CardException $e) {
            // Stripe-specific error for invalid or declined cards
            Session::flash('error', 'Payment failed: ' . $e->getError()->message);
            return redirect()->route('checkout');
        
        } catch (\Exception $e) {
            // General error (e.g., network issues, API key errors, etc.)
            Session::flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            return redirect()->route('checkout');
        }
    }
}
