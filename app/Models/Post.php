<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string $slug
 * @property string|null $excerpt
 * @property string|null $content
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property string $status
 * @property string|null $publish_time
 * @property int $view_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViewCount($value)
 * @mixin \Eloquent
 * @property int|null $image_id
 * @property-read \App\Models\Image|null $image
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Post findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageId($value)
 */
class Post extends Model
{
    use Sluggable;

    protected $table = 'posts';

    protected $guarded = ['id'];

    const STATUS_PUBLISH = 'publish';
    const STATUS_HIDDEN = 'hidden';

    const APPROVE_STATUS_PENDING = 'pending';
    const APPROVE_STATUS_YES = 'yes';
    const APPROVE_STATUS_NO = 'no';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image(){
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function statusLabel(){
        if($this->status == self::STATUS_PUBLISH){
            return 'Đang hiển thị';
        } else if($this->status == self::STATUS_HIDDEN){
            return 'Đã ẩn';
        }
        return '--';
    }

    public function approveLabel(){
        if($this->approve_status == self::APPROVE_STATUS_PENDING){
            return 'Chờ duyệt';
        } else if($this->approve_status == self::APPROVE_STATUS_YES){
            return 'Đã duyệt';
        } else if($this->approve_status == self::APPROVE_STATUS_NO){
            return 'Từ chối duyệt';
        }

        return '--';
    }

    public function approveCssClass(){
        if($this->approve_status == self::APPROVE_STATUS_PENDING){
            return 'text-default';
        } else if($this->approve_status == self::APPROVE_STATUS_YES){
            return 'text-success';
        } else if($this->approve_status == self::APPROVE_STATUS_NO){
            return 'text-danger';
        }

        return '';
    }

    public function thumb($template = 'small'){
        $defautImage = 'assets/img/no-image.jpg';
        if($this->image){
            return $this->image->getImageSrc($template);
        }
        return $defautImage;
    }

    /**
     * @return string
     */
    public function backendViewUrl(){
        return route('backend.post.view', ['id' => $this->id]);
    }

    /**
     * @return string
     */
    public function deleteUrl(){
        return route('backend.post.destroy', ['id' => $this->id]);
    }

    public function publicUrl(){
        return route('post.detail', ['id' => $this->id, 'slug' => $this->slug]);
    }

    public function getTitle(){
        return !empty($this->seo_title) ? $this->seo_title : $this->name;
    }

    public function getDescription(){
        return !empty($this->seo_description) ? $this->seo_description : $this->excerpt;
    }

    public function getKeywords(){
        return $this->seo_keywords;
    }

}
