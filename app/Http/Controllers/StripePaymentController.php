<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\DepositStmt;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // dd($request);
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Stripe\Charge::create ([
        //         "amount" => 100 * 100,
        //         "currency" => "usd",
        //         "source" => $request->stripeToken,
        //         "description" => "Test payment from itsolutionstuff.com." 
        // ]);

        
$stripe = new \Stripe\StripeClient('sk_test_51Lb8zWSCAX5LkUiEgiREdLwZdGYXqpxWYjBTysaHNiRzcjIWvpP8Z9wUnWJhPk5JAmvJDjFSa2dhQMytF4YjNnKR005moIYtcW');

$stripe->paymentIntents->create(
  [
    'amount' => $request->amt,
    'currency' => 'usd',
    'description' => 'Software development services',

  ]
);
    $data = array(
    'status'        =>  'success',
    );
    DepositStmt::where('id',$request->id)->update($data);
        // Session::flash('success', 'Payment successful!');
          
        // return back();
        Session::flash('message', 'Payment successful!');
            return redirect('user_deposit')->with('success', 'Payment successful!');
    }
public function api_stripe_post(Request $request)
{
    $stripe = new \Stripe\StripeClient('sk_test_51Lb8zWSCAX5LkUiEgiREdLwZdGYXqpxWYjBTysaHNiRzcjIWvpP8Z9wUnWJhPk5JAmvJDjFSa2dhQMytF4YjNnKR005moIYtcW');

    $stripe->paymentIntents->create(
      [
        'amount' => $request->amt,
        'currency' => 'usd',
        'description' => 'Software development services',

      ]
);
    $data = array(
    'status'        =>  'success',
    );
    DepositStmt::where('id',$request->id)->update($data);
    return response()->json([
                 'message' =>'Payment successful!'
                   ]);

}
}