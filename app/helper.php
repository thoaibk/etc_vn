<?php
/**
 * @param $root
 * @param string|int $time timestamp
 * @param string $append
 * @param bool $create
 * @param null $tz
 * @return mixed|string
 */
function getPathByDay($root, $time = 'now', $append = '', $create = false, $tz = null)
{
    $path = rtrim($root, '\\\/');

    $time_helper = new \Carbon\Carbon($time, $tz);
    $path .= DIRECTORY_SEPARATOR . $time_helper->year
        . DIRECTORY_SEPARATOR . $time_helper->format('m_d');
    if ($append != '') {
        $path .= DIRECTORY_SEPARATOR . $append;
    }

    if ($create && \Illuminate\Support\Facades\File::exists($path)) {
        \Illuminate\Support\Facades\File::makeDirectory($path);
    }
    return $path;
}
