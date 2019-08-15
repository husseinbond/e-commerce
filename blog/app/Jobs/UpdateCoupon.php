<?php

namespace App\Jobs;

use App\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use Auth;
use Session;
class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $coupon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        if(Auth::check()){
            $user_email = Auth::user()->email;
           
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
            
            }else{
              $session_id = Session::get('session_id');
              $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();   
            }
            $total_amount = 0;
            foreach($userCart as $item){
               $total_amount = $total_amount + ($item->price * $item->quantity);
            }


    
            Session::put('coupon',[
            'name' => $this->coupon->code,
            'discount' => $this->coupon->discount($total_amount),
        ]);




        return back()->with('success_message', 'Coupon has been applied!');

        
    }
}
