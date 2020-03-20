<?php

namespace App\Models;

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
 */
class BookPost extends Model
{

    protected $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User','post_author','id')->select(['id','name']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class,'book_category_id','id')->select(['id','title']);
    }
}
