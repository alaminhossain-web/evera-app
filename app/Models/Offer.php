<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    private static $offer, $image, $imageName,$extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = "upload/offer-images/";
        self::$image->move(self::$directory, self::$imageName);
        return  self::$directory.self::$imageName;
    }

    public static function newOffer($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';

        self::$offer = new Offer();
        self::saveBasicInfo(self::$offer,$request,self::$imageUrl);

    }
    public static function updateOffer($request,$offer)
    {
        if($request->file('image'))
        {
            if(file_exists($offer->image))
            {
                unlink($offer->image);
            }
            self::$imageUrl =self::getImageUrl($request);
        }else{
            self::$imageUrl = $offer->image;
        }
        self::saveBasicInfo($offer,$request,self::$imageUrl);
    }
    private static function saveBasicInfo($offer,$request,$imageUrl)
    {

        $offer->product_id                   = $request->product_id;
        $offer->title_one                    = $request->title_two;
        $offer->title_two                    = $request->title_two;
        $offer->title_three                  = $request->title_three;
        $offer->description                  = $request->description;
        $offer->image                        = $imageUrl;
        $offer->status                       = $request->status;
        $offer->save();
    }
    public static function deleteOffer($offer)
    {
        if(file_exists($offer->image))
        {
            unlink($offer->image);
        }
        $offer->delete();
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
