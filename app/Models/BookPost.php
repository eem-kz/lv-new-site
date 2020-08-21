<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BookPost
 *
 * @property int $id
 * @property int $post_author
 * @property string $post_content
 * @property string $post_title
 * @property string|null $slug
 * @property string $image
 * @property int $view_count
 * @property int $is_approved
 * @property string $lang
 * @property int $post_status
 * @property string $comment_status
 * @property int $comment_count
 * @property string|null $post_modified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereCommentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereCommentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost wherePostAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost wherePostContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost wherePostModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost wherePostStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost wherePostTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereViewCount($value)
 * @mixin \Eloquent
 * @property int $book_category_id
 * @property-read \App\Models\BookCategory $bookCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost whereBookCategoryId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\CyrildeWit\EloquentViewable\View[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost approved()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost lang($arg)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost orderByUniqueViews($direction = 'desc', $period = null, $collection = null, $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost orderByViews($direction = 'desc', $period = null, $collection = null, $unique = false, $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookPost withViewsCount($period = null, $collection = null, $unique = false, $as = 'views_count')
 */
class BookPost extends Model implements Viewable
{
    use InteractsWithViews;


    protected $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'post_author', 'id')->select(['id', 'name']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id', 'id')
                ->with('parentOnChild');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }





    /**
     * @param $query
     * @param $arg
     * @return mixed
     */
    public function scopeLang($query, $arg)
    {
        return $query->where('lang', strtoupper($arg));
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query)
    {
        return $query->where('post_status', 1);
    }

}
