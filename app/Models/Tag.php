<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Tag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $tag_title
 * @property string $tag_slug
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereTagSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereTagTitle($value)
 */
class Tag extends Model
{
    protected $fillable = ['tag_title','tag_slug'];
    public $timestamps = false;


    public function posts()
    {
        return $this->belongsToMany(BookPost::class)->withTimestamps();
    }
}
