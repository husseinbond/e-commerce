<?php

namespace App\Http\Controllers;
use App\post;
use App\coupon;
use App\detail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Jobs\UpdateCoupon;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
class cartcontroller extends Controller
{
 



    

 public function store(request $request,$id){
  



    $data = $request->all();

   

    if(empty(Auth::user()->email)){
        $data['user_email'] = ''; 
    }
    else{
        $data['user_email'] = Auth::user()->email;
    }

    $session_id = Session::get('session_id');
    if(!isset($session_id)){
        $session_id = str_random(40);
        Session::put('session_id',$session_id);
    }

    
    $this->validate($request,[
        'quantity' => 'required|numeric|between:1,5',
        'size'=>'required'
    ]);

    $sizeIDArr = explode('-',$data['size']);
    $product_size = $sizeIDArr[1];

   


  
    $get = detail::select('quantity')->where(['post_id' => $data['post_id'], 'sizes' => $product_size])->first();

if($data['quantity'] > $get->quantity){
    return redirect()->back()->with('your quantity more than our stock Cart!');

}

    $count = DB::table('cart')->where(['post_id' =>$id, 'size'=>$product_size, 'session_id' => $session_id])->count();
    if($count>0){
        return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
    }


    DB::table('cart')
    ->insert(['post_id' => $data['post_id'],'post_name' => $data['post_name'],
       
        'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id]);

        return back()->with('success_message', 'done');
}

public function coutercarts(){
    if(Auth::check()){
        $user_email = Auth::user()->email;
       
        $userCart = DB::table('cart')->where(['user_email' => $user_email])->get()->count();     
        
        }else{
          $session_id = Session::get('session_id');
          $userCart = DB::table('cart')->where(['session_id' => $session_id])->get()->count();   
        }
        
        
}






public function destroy($id){
  
    $delete = cart::find($id);

   $delete->delete();
   $delete->save();
    return back()->with('success_message', 'Item has been removed!');
}




public function update(request $request,$id){




    $this->validate($request,[
        'quantity' => 'required|numeric|between:1,5'
    ]);

$data = $request->all();





  $getpro = DB::table('cart')->select('size','post_id')->where(['id' => $id])->first();

$get = detail::select('quantity')->where(['post_id' => $getpro->post_id, 'sizes' => $getpro->size])->first();


if($data['quantity'] > $get->quantity)
{
    
    session()->flash('errors',collect(['quantity more than our stock']));
    return redirect()->back();
}

  

else{

    
   
    DB::table('cart')->where(['id' => $id])->update(['quantity'=>$data['quantity']]); 
    return redirect()->back();
}

}





public function couponsstore(Request $request){
    
  
    
    $coupon = Coupon::where('code', $request->coupon_code)->first();
    if (!$coupon) {
        return back()->withErrors('Invalid coupon code. Please try again.');
    }
    dispatch_now(new UpdateCoupon($coupon));




    return back()->with('success_message', 'Coupon has been applied!');

 
}


public function destroyy()
{
    session()->forget('coupon');
    return back()->with('success_message', 'Coupon has been removed.');
}
}
