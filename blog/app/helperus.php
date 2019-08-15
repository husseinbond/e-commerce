<?php
function getNumbers()
{
  $tax = config('cart.tax') / 100;
if(Auth::check()){
$user_email = Auth::user()->email;
$userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     

}else{
  $session_id = Session::get('session_id');
  $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();   
}
$total_amount = 0;
$total = 0;
foreach($userCart as $item){
   $total_amount = $total_amount + ($item->price * $item->quantity);

  
  $total = $total_amount* ($tax + 1);

}




   
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = ( $total_amount - $discount);
  $newTax = $newSubtotal * $tax;
  $newtotal = $newSubtotal * ($tax + 1);
    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newtotal'=>$newtotal,
        'newSubtotal'=>$newSubtotal,
        'newTax'=>$newTax,
        'total'=>$total,
    ]);


   

  }