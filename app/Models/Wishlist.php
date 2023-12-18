<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;
    private static $wishlist;
    public static function newWishlist($customer,$request)
    {
        
        self::$wishlist = new Wishlist();
        self::$wishlist->customer_id          = $customer->id;
        self::$wishlist->product_id           = $request->id;
        self::$wishlist->date                 = date('y-m-d');
        self::$wishlist->timestamp            = strtotime(date('y-m-d'));
        self::$wishlist->status               = $request->status;
        self::$wishlist->save();
        return self::$wishlist->product_id;
        
    }
    public static function deleteWishlist($wishlist)
    {
        $wishlist->delete();
    }
   public function product()
   {
    return $this->belongsTo(Product::class);
   }
}
