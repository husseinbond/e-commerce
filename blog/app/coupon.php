<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class coupon extends Model
{
    public static function findByCode($code)
    {
        $couponDetails = Coupon::where('code',$code)->first();
    }
    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percent') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }







    }


}
