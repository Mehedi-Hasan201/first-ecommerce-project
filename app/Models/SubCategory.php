<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $subCategory,$image,$imageUrl,$directory,$extension,$imageName;


    private static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'upload/sub-category-images/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newSubCategory($request)

    {

        self::saveBasicInfo(new SubCategory(),$request,self::getImageUrl($request->file('image')));

    }

    public static function updateSubcategory($request,$id)
    {
        self::$subCategory = SubCategory::find($id);
        if (self::$image = $request->file('image'))
        {
            self::deleteImageFolder(self::$subCategory->image);

            self::$imageUrl = self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }
        self::saveBasicInfo(self::$subCategory,$request,self::$imageUrl);

    }

    public static function deletedSubcategory($id)
    {
        self::$subCategory = SubCategory::find($id);

        self::deleteImageFolder(self::$subCategory->image);
        self::$subCategory->delete();
    }

    private static function saveBasicInfo($subCategory,$request,$imageUrl)
    {
        $subCategory->category_id         = $request->category_id;
        $subCategory->name                = $request->name;
        $subCategory->description         = $request->description;
        $subCategory->image               = $imageUrl;
        $subCategory->status              = $request->status;
        $subCategory->save();
    }

    private static function deleteImageFolder($imageUrl)
    {
        if (file_exists($imageUrl))
        {
            unlink($imageUrl);
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
