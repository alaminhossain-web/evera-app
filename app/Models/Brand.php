<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image,$imageUrl;

    public static function newBrand($request)
    {
//        if ($request->file('image'))
//        {
//            self::$imageUrl = self::getImageUrl($request);
//        } else {
//            self::$imageUrl = ' ';
//        }

        self::$imageUrl = $request->file('image') ? imageUpload($request->file('image'),'upload/brand-imags/') : ' ';

        self::$brand = new Brand();
        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);

    }
    public static function updateBrand($request,$brand)
    {
        if($request->file('image'))
        {
            if(file_exists($brand->image))
            {
                unlink($brand->image);
            }
            self::$imageUrl =imageUpload($request->file('image'),'upload/brand-images/');
        }else{
            self::$imageUrl = $brand->image;
        }
        self::saveBasicInfo($brand,$request,self::$imageUrl);
    }
    private static function saveBasicInfo($brand,$request,$imageUrl)
    {

        $brand->name                    = $request->name;
        $brand->description             = $request->description;
        $brand->image                   = $imageUrl;
        $brand->status                  = $request->status;
        $brand->save();
    }
    public static function deleteBrand($brand)
    {
        if(file_exists($brand->image))
        {
            unlink($brand->image);
        }
        $brand->delete();
    }
    
}
