<?php

namespace Modules\Post\Entities;

use Modules\Brand\Admin\BrandTable;
use Modules\Group\Entities\Group;
use Modules\Rating\Entities\Rating;
use Modules\Support\Eloquent\Model;
use Modules\Media\Eloquent\HasMedia;
use Modules\Media\Entities\File;
use Modules\Meta\Eloquent\HasMetaData;
use Modules\Post\Admin\PostTable;
use Modules\Support\Eloquent\Sluggable;
use Modules\Support\Eloquent\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use Translatable, Sluggable, HasMedia, HasMetaData, SoftDeletes;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    // public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'is_active',
        'is_toc',
        'is_thumbnail_display',
        'sidebar_layout',
        'created_at',
        'video',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active'             => 'boolean',
        'is_thumbnail_display'  => 'boolean',
        'is_toc'                => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name','content'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

     protected $postNotShow = [
        'lap-dat-adsl-fpt-tang-modem-wifi',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-2-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-3-2015',
        'lap-mang-fpt-va-truyen-hinh-fpt-xuan-2015',
        'cac-goi-cuoc-internet-adsl',
        'goi-dich-vu-mega-save',
        'goi-dich-vu-mega-you',
        'lap-mang-fpt-mien-phi-huyen-tu-liem',
        'bao-gia-adsl',
        'fiber-me',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-5-2015																								"',
        'goi-dich-vu-mega-me',
        'fiber-home',
        'cap-quang-fpt-goi-fiber-play-goi-cuoc-khuyen-mai-danh-cho-doi-thu',
        'fiber-public-50mbps',
        'fiber-play-50mbps',
        'fiber-business-35mbps',
        'fiber-public-goi-cuoc-game-internet-danh-cho-doi-thu-canh-tranh',
        'fiber-family-fpt',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-2-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-3-2015',
        'khuyen-mai-lap-dat-mang-fpt-thang-4-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-5-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-6-2015',
        'khuyen-mai-lap-mang-adsl-fpt-thang-6-2015',
        'khuyen-mai-lap-dat-truyen-hinh-fpt-thang-6-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-gia-re-thang-7-2015',
        'khuyen-mai-lap-mang-wifi-fpt-thang-7-2015',
        'khuyen-mai-lap-mang-internet-adsl-fpt-thang-7-2015',
        'dang-ky-cap-quang-fpt-cho-quan-game-va-doanh-nghiep-thang-8-2015',
        'lap-mang-internet-adsl-fpt-thang-8-2015',
        'khuyen-mai-lap-mang-wifi-fpt-thang-8-2015',
        'dang-ky-cap-quang-fpt-ha-noi-gia-re-thang-7-2015',
        'dang-ky-cap-quang-fpt-hcm-gia-re-thang-7-2015',
        'khuyen-mai-sieu-khung-tai-fpt-binh-duong-thang-9-2015',
        'dang-ky-cap-quang-fpt-cho-doanh-nghiep-thang-9',
        'lap-mang-wifi-fpt-thang-9',
        'lap-mang-cap-quang-fpt-gia-re-thang-10-2015',
        'khuyen-mai-lap-mang-fpt-tai-da-lat-thang-92015',
        'uu-dai-lon-lap-cap-quang-fpt-chao-nam-moi-2016',
        'uu-dai-lap-truyen-hinh-fpt-thang-12016',
        'khuyen-mai-goi-combo-internet-va-truyen-hinh-fpt-cuc-soc-chao-xuan-2016',
        'uu-dai-lap-dat-truyen-hinh-fpt-thang-62016',
        'combo-internet-va-truyen-hinh-fpt-bung-no-trong-thang-5-2016',
        'khuyen-mai-cuc-chat-cap-quang-fpt-thang-52016',
        'uu-dai-lap-mang-cap-quang-fpt-thang-42016',
        'uu-dai-lon-lap-dat-combo-internet-va-truyen-hinh-fpt-thang-82016',
        'uu-dai-lap-mang-cap-quang-fpt-thang-82016',
        'khuyen-mai-combo-internet-truyen-hinh-fpt-thang-72016',
        'khuyen-mai-internet-fpt-quan-hoang-mai-thang-6-2016',
        'internet-va-truyen-hinh-fpt-dong-hanh-cung-euro-2016',
        'uu-dai-lap-mang-fpt-mung-sinh-nhat-fpt-thang-92016',
        'khuyen-mai-combo-internet-truyen-hinh-fpt-thang-92016',
        'khuyen-mai-combo-internet-truyen-hinh-fpt-thang-92016',
        'dai-tiec-khuyen-mai-mung-sinh-nhat-fpt',
        'uu-dai-dac-biet-combo-internet-va-truyen-hinh-fpt-thang-102016',
        'giam-gia-cuoc-lap-mang-fpt-quan-bac-tu-liem-thang-102016',
        'khuyen-mai-lap-mang-fpt-quan-nam-tu-liem-thang-102016',
        'combo-internet-va-truyen-hinh-fpt-khuyen-mai-thang-112016',
        'uu-dai-lap-mang-fpt-tai-ha-noi-don-nam-moi-dinh-dau-2017',
        'uu-dai-lap-cap-quang-fpt-ha-noi-thang-22017-tang-4-thang-cuoc',
        'fpt-play-box-2018-box-4k-bien-tivi-thuong-thanh-smart-tivi',
        'fpt-play-box-2018-qua-chat-ring-ngay-tang-thay-co',
        'khuyen-mai-lap-fpt-play-box-2020',
        'lap-dat-truyen-hinh-fpt-play-hd',
        'khuyen-mai-lap-dat-truyen-hinh-fpt-play-hd',
        'dang-ky-truyen-hinh-fpt-rinh-xe-sh-5-iphone-6-khuyen-mai-thang-12',
        'truyen-hinh-fpt-thang-2-2015-khuyen-mai-cuc-soc',
        'lap-mang-fpt-va-truyen-hinh-fpt-xuan-2015',
        'can-ban-gap-can-ho-118-32m2-tai-golden-palace-tri-gia-re-nhan-nha-ngay',
        'bai-tho-tieng-bien-cua-nguoi-linh-dao-lay-dong-trieu-trai-tim',
        'fpt-bo-nhiem-hai-ptgd-phu-trach-toan-cau-hoa',
        'ngay-30-07-2014-su-co-dut-cap-bien-quoc-te-aag-se-khac-phuc-xong',
        'ca-si-le-roi-rung-chuyen-lang-showbiz-cu-dan-mang-yeu-hay-ghet',
        'event-tuyen-dung-cuoi-cung-cua-fpt-telecom-trong-nam-2014',
        'chinh-chu-can-ban-can-ho-c-11-08-tai-golden-palace-tri',
        'ban-tin-3-ky-thi-chinh-thuc-bat-dau-trang-fpt-2014',
        'nguoi-ftel-tich-cuc-tham-gia-thi-trang-fpt-2014',
        'ai-se-thang-manchester-chelsea-ke-tam-lang-nguoi-nua-can',
        'het-f-a-nho-internet',
        'chung-cu-c14-bo-cong-ban-gia-re-nhan-nha-ngay',
        'vff-ke-hanh-hung-cdv-viet-nam-phai-bi-trung-tri',
        'khi-mot-ai',
        '15-nam-fyt-qua-nhung-dau-son',
        'chuc-mung-ngay-quoc-te-phu-nu-8-3-toi-chi-em-fpt',
        'cap-quang-aag-lai-dut-vao-sang-23-4-2015',
        'mu-chelsea-nghet-tho-phut-bu-gio-tren-truyen-hinh-fpt',
        'ban-can-ho-65-1-m2-tang-09-toa-ct12b-tai-chung-cu-kim-van-kim-lu',
        'ban-yeu-quy-khong-biet-ban-lua-chon-kieu-song-nao-day',
        'fpt-telecom-chinh-thuc-lam-viec-7-ngay-tuan-tu-ngay-01-06-2015',
    ];


    protected static function booted()
    {
        static::saved(function ($post) {
            if (! empty(request()->all())) {
                $post->saveRelations(request()->all());
            }
            if(!empty(request()->get('current-slug'))){
                $post->withoutEvents(function () use ($post) {
                    $post->update(['slug' => request()->get('current-slug')]);
                });
            }
        });
        static::addActiveGlobalScope();
    }

    public function scopeDesc($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    public function getDateSupportAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function table()
    {
        return new PostTable($this->newQuery()->whereNotIn('slug', $this->postNotShow)->withoutGlobalScope('active'));
    }

    public function getLogoAttribute()
    {
        return $this->files->where('pivot.zone', 'logo')->first() ?: new File;
    }

    public function saveRelations($attributes = [])
    {
        $this->groups()->sync(array_get($attributes, 'groups', []));
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'post_groups');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, Rating::POST_ID, 'id')
            ->where(Rating::TYPE, Rating::TYPE_POST_ID);
    }

    public function getAvgRatingAttribute()
    {
        if($this->is_default_rating) {
            return number_format($this->ratings()->active()->avg(Rating::RATING), 1);
        }
        return $this->custom_avg_rating;
    }

    public function getRatingCountAttribute()
    {
        if($this->is_default_rating) {
            return $this->ratings()->active()->count();
        }
        return $this->custom_rating_count;
    }
}
