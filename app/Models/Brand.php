<?php

namespace App\Models;

use App\Http\Controllers\BrandController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand,$image,$extension,$imageName,$directory,$imageUrl;

    private static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'upload/brand-images/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    private static function saveBasicInfo($brand,$request,$imageUrl)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
    }

    private static function deleteImageUrl($imageUrl)
    {
        if (file_exists($imageUrl))
        {
            unlink($imageUrl);
        }
    }
    public static function newBrand($request)
    {
        self::saveBasicInfo(new Brand(),$request,self::getImageUrl( $request->file('image')));

    }

    public static function updateBrandInfo($request,$id)
    {
        self::$brand = Brand::find($id);

        if (self::$image = $request->file('image'))
        {

            self::deleteImageUrl(self::$brand->image);
            self::$imageUrl = self::getImageUrl( $request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }

        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);

    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        self::deleteImageUrl(self::$brand->image);
        self::$brand->delete();
    }







}
