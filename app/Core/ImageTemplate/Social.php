<?php


namespace App\Core\ImageTemplate;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Social implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(600, 315);
    }
}
