<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Author;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title'=>$faker->title(),
        'isbn'=>$faker->numberBetween(1000,2000),
        'pages'=>$faker->numberBetween(1000,2000),
        'about'=>$faker->sentence(20),
        'author_id'=>factory(Author::class)->create()->id
    ];
});
