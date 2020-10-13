<?php


namespace App\Core\ImageTemplate\Category;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Medium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(351, 256);
    }
}
