<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

   protected $fillable = ['name','description','image','status'];

   protected static $fileUrl,$fileObject,$fileName,$fileDirectory,$category;

   public static function saveCategories($request,$id = null)
   {
       self::$fileUrl = Category::uploadCategoryFile($request,$id);

       Category::updateOrCreate(['id'=>$id],[

           'name'            => $request->name,
           'description'      => $request->description,
           'image'            => self::$fileUrl,
           'status'           => $request->status,


       ]);
   }

   public static function uploadCategoryFile($request,$id)
   {
       if($id != null)
       {
           self::$category = Category::find($id);
       }
       self::$fileObject = $request->file('image');
       if(isset(self::$fileObject))
       {
           if(isset(self::$category))
           {
               if(file_exists(self::$category->image))
               {
                   unlink(self::$category->image);
               }
           }
           self::$fileName = self::$fileObject->getClientOriginalName();
           self::$fileDirectory = 'admin/uploaded-files/categories/';
           self::$fileObject ->move(self::$fileDirectory,self::$fileName);
           self::$fileUrl = self::$fileDirectory.self::$fileName;
       }else{

        $id != null ? self::$fileUrl = self::$category->image : ' ';
           //if($id != null)
           //{
             //  self::$fileUrl = self::$category->image;
           //}else{
             //  self::$fileUrl = null;
           //}
       }
       return self::$fileUrl;

   }
   public function subCategory()
   {
        return $this->hasMany(SubCategory::class);
   }
}
