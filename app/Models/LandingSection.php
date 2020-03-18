<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LandingSection
 *
 * @property int $id
 * @property string $section_name
 * @property string $title
 * @property string|null $description
 * @property string $slug
 * @property string $lang
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection lang($arg)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection whereSectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LandingSection whereTitle($value)
 * @mixin \Eloquent
 */
class LandingSection extends Model
{
    public function scopeLang($query, $arg){
        return $query->where('lang', strtoupper($arg));
    }
}
