<?php


namespace App\Core\ImageTemplate\Banner;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class BannerThumb implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(345, 108);
    }
}