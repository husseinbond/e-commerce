<?php

use Illuminate\Support\Facades\mail;
namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\post;
use App\Mail\orderplace;
use App\order;
use App\Http\Requests\checkoutrequest;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use App\coupon;
use App\detail;
use DB;
use Auth;
use Session;
use Money\Exchanger\ExchangerExchange;




class checkout2 extends Controller
{
 
 public $as;
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   return view('Checkout');
   if(Auth::check()){
    $user_email = Auth::user()->email;
   
    $userCart = DB::table('cart')->where(['user_email' => $user_email])->count();     
    
    }else{
      $session_id = Session::get('session_id');
      $userCart = DB::table('cart')->where(['session_id' => $session_id])->count();   
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
       

        if(Auth::check()){
            $user_email = Auth::user()->email;
           
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
            
            }else{
              $session_id = Session::get('session_id');
              $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();   
            }
    
    foreach ($userCart as $key =>  $product) {
        $userCarts  = DB::table('details')->select('quantity')->where(['post_id' => $product->post_id,'sizes'=>$product->size])->first();  
         
    
  if($product->quantity > $userCarts->quantity )
  {
  
    return redirect()->back()->with('flash_message_error','Product already exist in Cart!');

  }
        
}
  
        function convert($from, $to) {
            $data = file_get_contents('https://fx-rate.net/json.php?days=30day&currency=' . $from . '&currency_pair=' . $to);
            $data = \GuzzleHttp\json_decode($data);
            $array = $data->data;
            $response = $array[3];
            return $response[1];
        }
        
        
            
           
         
          $as=  convert('USD', 'EGP');

       

// Returns an array of Scheb\YahooFinanceApi\Results\Quote


$contents;

       
      
        try {
           
          
           
        $charge = Stripe::charges()->create([

            

               'amount' => getNumbers()->get('newtotal') / $as  ,
             'currency' => 'USD',
            
             'source' => $request->stripeToken,
                'description' => 'Order',
               'receipt_email' => $request->email,
              'metadata' => [
                  
            
                'discount' => collect(session()->get('coupon'))->toJson(),
              ],
    
            
         ]);
         $this->decreaseQuantities();

         $order = $this->addToOrdersTables($request, null);
         \Mail::
         send(new orderplace ($order));

    
            return back()->with('success_message', 'Thank You! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {

            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! '. $e->getMessage());
        }



        
 /*

            $charge = stripe::charges()->create([
                'amount' =>getNumber()->get('newtotal') / 100,
                'currency' => 'CAD',
                'source'=>$request->stripeToken,
                'description'=>'Order',
                'receipt_email'
=>$request->email,
//'metadata' [ 

//]            
]);
*/
       
       
       
       

       return back()->with('success_message', 'Item has been removed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




protected function addToOrdersTables($request, $error)
{
    $order = Order::create([
        'user_id' => auth()->user() ? auth()->user()->id : null,
        'billing_email' => $request->email,
        'billing_name' => $request->name,
        'billing_address' => $request->address,
        'billing_city' => $request->city,
        'billing_postalcode' => $request->postalcode,
        'billing_phone' => $request->phone,
        'billing_name_on_card' => $request->name_on_card,
        'billing_province' => $request->province,
            'billing_discount_code'=> getNumbers()->get('code'),
            'billing_subtotal'=>getNumbers()->get('newtotal'),
            'billing_total'=>getNumbers()->get('newtotal'),
            'billing_tax'=>getNumbers()->get('newTax'),
            
            'error'=> $error,
            ]);

          

            return $order;
}
protected function decreaseQuantities()
{
    
if(Auth::check()){
    $user_email = Auth::user()->email;
   
    $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
    
    }else{
      $session_id = Session::get('session_id');
      $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();   
    }

foreach ($userCart as $key =>  $product) {
    $userCarts = DB::table('details')->select('quantity')->where(['post_id' => $product->post_id,'sizes'=>$product->size])->first();  
    $as = $userCarts->quantity;
    
   
    DB::table('details')->where(['post_id' => $product->post_id,'sizes'=>$product->size])->update(['quantity'=>$userCarts->quantity-$product->quantity]); 

      
  
   // DB::table('cart')
   // ->insert(['post_id' => $data['post_id'],'post_name' => $data['post_name'],
   
}

}
}