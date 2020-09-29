<?php


namespace App\Core\ImageTemplate\Product;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class SliderMedium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(700, 385);
    }
}
