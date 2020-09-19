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

function human_money($amount, $empty_text = null, $currency = null){
    $empty_text = $empty_text === null ? trans('common.free') : $empty_text;
    $currency = $currency === null ? config('app.currency') : $currency;
    if($amount == 0 && $empty_text != ''){
        return $empty_text;
    }else{
        return number_format($amount,
                config('app.decimals'),
                config('app.dec_point'),
                config('app.thousands_sep')) . " " . $currency;
    }
}
