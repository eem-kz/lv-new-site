<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
/**
 * App\Models\BookCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string|null $slug
 * @property string $link
 * @property string $lang
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookPost[] $bookPosts
 * @property-read int|null $book_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookCategory[] $children
 * @property-read int|null $children_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory lang($arg)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereTitle($value)
 * @mixin \Eloquent
 * @property int $_lft
 * @property int $_rgt
 * @property-read \App\Models\BookCategory|null $parent
 * @property-read \App\Models\BookCategory|null $parentOnChild
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookPost[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory d()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory noParent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory parent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereRgt($value)
 */
class BookCategory extends Model
{

    use NodeTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'title',
            'parent_id',
            'slug',
    ];

    protected $table = 'books_categories';
    public $timestamps = false;


    public function scopeLang($query, $arg)
    {
        return $query->where('lang', strtoupper($arg));
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', null);
    }


    public function scopeNoParent($query)
    {
        return $query->where('parent_id', '>=', '1');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(BookPost::class, 'book_category_id', 'id')->select(['book_category_id', 'post_title', 'slug']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentOnChild()
    {
        return $this->belongsTo(self::class,'parent_id');//->where('parent_id','>','0');
    }

}
