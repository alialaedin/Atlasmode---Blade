<?php

namespace Modules\Flash\Entities;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Entities\Admin;
use Modules\Core\Helpers\Helpers;
use Modules\Core\Traits\HasDefaultFields;
use Shetabit\Shopit\Modules\Core\Entities\BaseEloquentBuilder;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Modules\Core\Traits\HasAuthors;
use Modules\Core\Entities\BaseModel;
use Spatie\EloquentSortable\Sortable;
use Modules\Product\Entities\Product;
use Spatie\EloquentSortable\SortableTrait;
use Modules\Core\Traits\InteractsWithMedia;
use Modules\Core\Transformers\MediaResource;
use Modules\Core\Entities\HasCommonRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flash extends BaseModel implements Sortable, HasMedia
{
    use HasFactory, HasCommonRelations, HasAuthors, LogsActivity,
        InteractsWithMedia, SortableTrait, HasDefaultFields;

    const DISCOUNT_TYPE_PERCENTAGE = 'percentage';
    const DISCOUNT_TYPE_FLAT = 'flat';

    CONST ACCEPTED_IMAGE_MIMES = 'gif|png|jpg|jpeg';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'preview_count',
        'order',
        'timer',
        'status',
        'color'
    ];

    protected  $appends = ['image', 'bg_image', 'mobile_image'];

    protected $hidden = ['media'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $defaults = [
        'preview_count' => 7
    ];

    protected $dates = [
        'start_date', 'end_date'
    ];

    protected static $commonRelations = [
        'products'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $admin = \Auth::user();
        $name = !is_null($admin->name) ? $admin->name : $admin->username;
        return LogOptions::defaults()
            ->useLogName('Flash')->logAll()->logOnlyDirty()
            ->setDescriptionForEvent(function($eventName) use ($name){
                $eventName = Helpers::setEventNameForLog($eventName);
                return "کمپین {$this->title} توسط ادمین {$name} {$eventName} شد";
            });
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
       return $date->format('Y-m-d H:i');
    }

    public static function getAvailableDiscountTypes()
    {
        return [static::DISCOUNT_TYPE_PERCENTAGE, static::DISCOUNT_TYPE_FLAT];
    }

    public static function booted()
    {
        static::deleting(function (Flash $flash) {
            //todo unable delete
        });

        Helpers::clearCacheInBooted(static::class, 'home_flash');

    }

    protected static function newFactory()
    {
        return \Modules\Flash\Database\factories\FlashFactory::new();
    }

    public function scopeActive( $query)
    {
        return $query->whereDate('start_date', '<=', today())
            ->whereDate('end_date', '>=', today())
            ->where('status', '=', 1);
    }

    //Media library

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('image')->singleFile();
        $this->addMediaCollection('mobile_image')->singleFile();
        $this->addMediaCollection('bg_image')->singleFile();
    }

    public function addImage($file)
    {
        if (!$file) {
            return ;
        }
        return $this->addMedia($file)
            ->withCustomProperties(['type' => 'flash'])
            ->toMediaCollection('image');
    }

    public function addMobileImage($file)
    {
        if (!$file) {
            return ;
        }
        return $this->addMedia($file)
            ->withCustomProperties(['type' => 'flash'])
            ->toMediaCollection('mobile_image');
    }

    public function addBackgroungImage($file)
    {
        return $this->addMedia($file)
            ->withCustomProperties(['type' => 'flash'])
            ->toMediaCollection('bg_image');
    }

    public function getImageAttribute()
    {
        $media = $this->getFirstMedia('image');
        if (!$media) {
            return null;
        }
        return new MediaResource($media);
    }

    public function getMobileImageAttribute()
    {
        $media = $this->getFirstMedia('mobile_image');
        if (!$media) {
            return null;
        }
        return new MediaResource($media);
    }

    public function getBgImageAttribute()
    {
        $media = $this->getFirstMedia('bg_image');
        if (!$media) {
            return null;
        }
        return new MediaResource($media);
    }

    //Relations

    public function products()
    {
        $query = $this->belongsToMany(Product::class)
            ->withPivot(['discount_type', 'discount', 'salable_max', 'sales_count'])
            ->with('varieties');
        if (!(Auth::user() instanceof Admin)) {
            $query->available();
        }
        return $query;
    }

    public function activeProducts()
    {
        return $this->belongsToMany(Product::class)->available(true)
            ->withPivot(['discount_type', 'discount', 'salable_max', 'sales_count'])
            ->whereColumn('sales_count', '<', 'salable_max')
            ->with('varieties');
    }

    public function finalDiscount($price)
    {
        if($this->descount_type == static::DISCOUNT_TYPE_FLAT){
            return $this->discount;
        }

        return (int)round(($this->discount * $price) / 100);
    }
}

