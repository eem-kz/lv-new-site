<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookPost;
use Faker\Generator as Faker;

$factory->define(BookPost::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
            'post_author' => function () {
                return factory(App\User::class)->create()->id;
            },
            'book_category_id' => rand(1, 33),
            'post_content' => $faker->realText(500),
            'post_title' => $faker->sentence(5),
            'slug' => Str::slug($title),
            'post_status' => $faker->boolean,
            'post_modified' => $faker->dateTimeThisMonth()->format('Y-m-d'),
    ];
});
/*
 * id
post_author
post_content
post_title
slug->unique
default.png');
view_count
is_approved
lang
post_status
comment_status
comment_count
post_modified

*/