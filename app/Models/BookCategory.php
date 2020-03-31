<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory parent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BookCategory whereTitle($value)
 * @mixin \Eloquent
 */
class BookCategory extends Model
{


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

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'books_categories';
    }


    public function scopeLang($query, $arg)
    {
        return $query->where('lang', strtoupper($arg));
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', '0');
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

}
