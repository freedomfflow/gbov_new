<?php

namespace App\Http\Controllers;

use App;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Allcops\Billing\BillingInterface;
use App\Helpers\Functions;
use App\Http\Requests;
use App\Item;
use App\Order;
use App\User;
use Log;
use Hash;

class OrdersController extends Controller
{

    public function index()
    {
        //TODO redisgn db to have item_attributes for sizes, colors, etc.. then pull products dynamically from db
        //TODO to be shown on order page... For now, we have input id's hardcoded to item.name

        return view('orders.index');
    }

    /**
     * Checking via ajax call to ensure email is not already taken by another user
     *
     * @param $email
     *
     * @return int
     */
    public function verifyUser($email)
    {
        try {
            // If email exists, this is a problem for registration, so we return 0
            return ($usr = User::where('email', $email)
                ->first()) ? 0 : 1;
        } catch (Exception $e) {
            // Treat success case as we are testing for uniqueness of email via ajax call, for now..
            return 1;
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPrices()
    {
        $items = Item::all();

        return $items->pluck('price', 'id')
            ->toArray();
    }

    /**
     * @param $rule
     * @param $value
     * @param string $value2
     *
     * @return mixed
     */
    public function validateFormField($rule, $value, $value2 = '')
    {
        $request = new Request;
        $request[$rule] = $value;
        $rules = [];
        switch ($rule) {
            case 'first_name':
            case 'last_name':
            case 'city':
                $rules = [
                    $rule => 'required|min:2',
                ];
                break;
            case 'address':
                $rules = [
                    'address' => 'required|min:2',
                ];
                break;
            case 'email':
                $rules = [
                    'email' => 'required|email',
                ];
                break;
            //			case 'zip':
            //				$rules = [
            //					'zip' => 'required|numeric'
            //				];
            //				break;
            case 'password':
                $rules = [
                    'password' => 'required|min:8',
                ];
                break;
            case 'password_confirmation':
                $rules = [
                    'password_confirmation' => 'required|min:8',
                ];
                break;
            case 'ccnumber':
                //TODO makes sure 16 digits and starts with 4 or 5
                $rules = [

                ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
    }

    public function processOrder(Request $request, BillingInterface $billing)
    {
        \Log::info(var_export($request->all(), true));

        /*
         * Not yet allowing logins.  We should be detecting client side (have that set up, but off now) to see if
         * the email is being used, and if so, have them login and order using existing address data et al.
         * But for now, I'm just going to modify email to keep it unique and clean up the mess later
         */
        $inputEmail = $request->input('email');
        try {
            $user = User::where('email', $request->input('email'))
                ->firstOrFail();
            list($name, $domain) = explode("@", $request->input('email'));
            $inputEmail = $name . '+' . date('His') . '@' . $domain;
        } catch (Exception $d) {
            // Create User Record
            $user = new User;
        }

        try {
            $user->email = $inputEmail;
            $user->password = Hash::make(date('YmdHis'));       // default pwd - no logins yet
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->address = $request->input('address');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');
            $user->stripe_id = $request->input('stripeToken');
            $user->save();
        } catch (Exception $e) {
            \Log::info('User save failed for:' . var_export($user->email, true) . ' exception = ' . $e->getMessage());
        }

        // Create Order record to get an order id, then we will update this table after adding order_item
        $shipping_cost = 0;
        if ($request->has('shipping_cost') && is_numeric($request->input('shipping_cost'))) {
            $shipping_cost = $request->input('shipping_cost');
        }
        $order = new Order;
        $order->user_id = $user->id;
        $order->shipping_cost = $shipping_cost;
        $order->save();

        /*
         * Working of premise we have 6 products and all on order page - will need to rework this completely in the future
         */
        for ($i = 1; $i < 7; $i++) {
            if ($request->input($i) > 0) {
                try {
                    /*
                     * $i is the item.id - attach is how we add to the many-to-many pivot table
                     */
                    $order->items()
                        ->attach($i, ['quantity' => $request->input($i)]);
                } catch (Exception $e) {
                    \Log::error('Item ' . $request->input($i) . ' not saved for Order ' . $order->id);
                }
            }
        }

        /*
         * Write ttl cost to order record
         */
        $currentOrder = Order::where('id', $order->id)
            ->with('items')
            ->first();

        $totalCost = $itemCount = '';
        foreach ($currentOrder->items as $item) {
            $totalCost += $item->price * $item->pivot->quantity;
            //			echo "<br>item = " . $item->name;
            //			echo "<br>qty = " . $item->pivot->quantity;
            //			echo "<br>price = " . $item->price;
            //			echo "<br>subttl = " . $item->price * $item->pivot->quantity;
            //			$itemCount += $item->pivot->quantity;
        }

        $order->total_items_price = $totalCost;
        $order->save();

        /*
         * Process Stripe Payment
         */
        $totalBillAmount = $totalCost + $currentOrder->shipping_cost;
        $billing_data = [
            'amount' => $totalBillAmount,
            'email'  => $request->input('email'),
            'token'  => $request->input('stripeToken'),
        ];

        if ($billing_result = $billing->charge($billing_data)) {
            flash()->success('Your order has been successfully processed.  Look for an email confirmation soon.', true);

            //TODO Queue up an email about order
            return view('orders.thankyou');
        }
    }

    public function thankyou()
    {
        return view('orders.thankyou');
    }

    public function test()
    {
        $rsl = User::where('email', 'gary.wolff+123@gmail.co')
            ->firstOrFail();

        dd($rsl);

        return view('orders.test');
    }

}
