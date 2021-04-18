<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AppOption
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereValue($value)
 * @mixin \Eloquent
 */
class AppOption extends Model
{
    protected $table = 'app_options';
    protected $guarded = ['id'];

    const APP_MENU = 'app_menu';
    const APP_BANNER = 'banner';
    const APP_TITLE = 'title';
    const APP_DESC = 'description';
    const APP_KEYWORDS = 'keywords';

    const FOOTER_NAME = 'footer_name';
    const FOOTER_HOTLINE = 'footer_hotline';
    const FOOTER_EMAIL = 'footer_email';
    const FOOTER_ADDRESS = 'footer_address';

    const FOOTER_WIDGET_LEFT_TITLE = 'footer_widget_left_title';
    const FOOTER_META_LEFT = 'footer_meta_left';

    const FOOTER_WIDGET_CENTER_TITLE = 'footer_widget_center_title';
    const FOOTER_META_CENTER = 'footer_meta_center';

    // widget social
    const FOOTER_WIDGET_SOCIAL_FACEBOOK = 'footer_widget_social_facebook';
    const FOOTER_WIDGET_SOCIAL_YOUTUBE = 'footer_widget_social_youtube';
    const FOOTER_WIDGET_SOCIAL_MESSENGER = 'footer_widget_social_messenger';
    const FOOTER_WIDGET_SOCIAL_EMAIL = 'footer_widget_social_email';

    // copyright
    const FOOTER_COPYRIGHT = 'footer_copyright';


    /**
     * @return array|mixed
     */
    public static function allBanner(){
        $bannerConfig = [];
        $banner = AppOption::where('key', AppOption::APP_BANNER)->first();
        if($banner && !empty($banner->value)){
            $bannerConfig = json_decode($banner->value, true);
        }

        return $bannerConfig;
    }
    /**
     * @param $index
     * @return mixed|null
     */
    public static function getBannerByIndex($index){
        $bannerConfig = self::allBanner();
        return isset($bannerConfig[$index]) ? $bannerConfig[$index] : null;
    }


    /**
     * @param $key
     * @return mixed|string
     */
    public static function getOptionValue($key, $cache = false){

        if($cache){
            return \Cache::remember($key, 24*60, function () use ($key){
                $footerInfo = AppOption::where('key', $key)->first();
                return ($footerInfo) ? $footerInfo->value : '';
            });
        }
        $footerInfo = AppOption::where('key', $key)->first();
        return ($footerInfo) ? $footerInfo->value : null;
    }

    public static function getWidgetTitleKey($meta){
        if($meta == 'left'){
            return self::FOOTER_WIDGET_LEFT_TITLE;
        }
        if($meta == 'center'){
            return self::FOOTER_WIDGET_CENTER_TITLE;
        }
    }

    public static function getWidgetLinkKey($meta){
        if($meta == 'left'){
            return self::FOOTER_META_LEFT;
        }
        if($meta == 'center'){
            return self::FOOTER_META_CENTER;
        }
    }


    /**
     * @param $meta
     * @param bool $cache
     * @return mixed
     */
    public static function getWidgetTitle($meta, $cache = false){
        $widgetTitleKey = self::getWidgetTitleKey($meta);
        if($cache){
            return \Cache::remember($widgetTitleKey, 24*60, function () use ($widgetTitleKey){
                $widgetTitle = AppOption::where('key', $widgetTitleKey)
                    ->first();
                return ($widgetTitle) ? $widgetTitle->value : '';
            });
        }
        $widgetTitle = AppOption::where('key', $widgetTitleKey)
            ->first();
        return ($widgetTitle) ? $widgetTitle->value : '';
    }

    /**
     * @return array|mixed
     */
    public static function footerWidgetLink($meta){
        $key = self::getWidgetLinkKey($meta);
        $widgetLinks = [];
        $meta = AppOption::where('key', $key)->first();
        if($meta && !empty($meta->value)){
            $widgetLinks = json_decode($meta->value, true);
        }
        return $widgetLinks;
    }
    /**
     * @param $index
     * @return mixed|null
     */
    public static function getWidgetLinkById($meta, $index){
        $widgetLinks = self::footerWidgetLink($meta);
        return isset($widgetLinks[$index]) ? $widgetLinks[$index] : null;
    }

    public static function getWigetLinkLeftFromCache($widget){

        $widgetCacheKey =  self::getWidgetLinkKey($widget);

        return \Cache::remember($widgetCacheKey, 24*60, function () use ($widgetCacheKey){
            $widgetLink = self::query()
                ->where('key', $widgetCacheKey)
                ->first();
            return ($widgetLink) ? json_decode($widgetLink->value, true) : [];
        });
    }
}
