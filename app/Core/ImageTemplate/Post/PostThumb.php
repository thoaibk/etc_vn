<?php


namespace App\Core\ImageTemplate\Post;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class PostThumb implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(240, 151);
    }
}