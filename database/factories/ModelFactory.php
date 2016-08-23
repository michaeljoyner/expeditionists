<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'user_id'         => factory(\App\User::class)->create()->id,
        'name'            => $faker->name,
        'email'           => $faker->email,
        'intro'           => $faker->paragraph(),
        'nationality'     => $faker->country,
        'date_of_birth'   => $faker->date(),
        'residence'       => $faker->city,
        'athletic_skills' => 'None whatsoever',
        'hero_status'     => 'HIV positive',
        'hero_statement'  => 'I did not know she was only fourteen',
        'biography'       => $faker->paragraph,
        'facebook'        => $faker->url,
        'twitter'         => $faker->url,
        'instagram'       => $faker->url,
        'linkedin'        => $faker->url,
    ];
});

$factory->define(App\Expedition::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->city,
        'location'          => $faker->country,
        'about'             => $faker->paragraphs(3, true),
        'mission'           => $faker->paragraph(),
        'objectives'        => $faker->paragraph(),
        'donation_goal'     => $faker->numberBetween(999, 9999999),
        'donations_to_date' => $faker->numberBetween(2, 7),
        'distance'          => 10000,
        'distance_to_date'  => $faker->numberBetween(100, 5000),
        'start_date'        => $faker->date()
    ];
});

$factory->define(App\Gallery::class, function (Faker\Generator $faker) {
    $profile = factory(\App\Profile::class)->create();

    return [
        'name'             => $faker->sentence(),
        'galleryable_id'   => $profile->id,
        'galleryable_type' => \App\Profile::class
    ];
});

$factory->define(App\Content\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Content\EditableArea::class, function (Faker\Generator $faker, $overrides) {
    return [
        'page_id'     => isset($overrides['page_id']) ? $overrides['page_id'] : factory(\App\Content\Page::class)->create()->id,
        'name'        => $faker->sentence(),
        'allows_html' => 0,
        'content'     => $faker->paragraph()
    ];
});

$factory->define(App\Sponsor::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->company,
        'description' => $faker->paragraph,
        'site_link' => $faker->url
    ];
});

$factory->define(App\Charity::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->company,
        'description' => $faker->paragraph,
        'site_link' => $faker->url
    ];
});

$factory->define(App\Blog\Article::class, function (Faker\Generator $faker) {
    return [
        'profile_id'   => factory(\App\Profile::class)->create()->id,
        'title'        => $faker->sentence(),
        'intro'        => $faker->sentences(2, true),
        'body'         => $faker->paragraphs(5, true),
        'published_on' => null,
        'published'    => 0
    ];
});

$factory->define(App\TeamMember::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'title' => $faker->words(3, true),
        'intro' => $faker->paragraph()
    ];
});

$factory->define(\App\MapLocation::class, function (Faker\Generator $faker, $overrides) {
    $exp = isset($overrides['expedition_id']) ? $overrides['expedition_id'] : factory(\App\Expedition::class)->create()->id;

    return [
        'expedition_id' => $exp,
        'longitude'     => $faker->numberBetween(-180, 180),
        'latitude'      => $faker->numberBetween(-180, 180),
        'title'         => $faker->words(3, true)
    ];
});

$factory->define(\App\FileResource::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});

$factory->define(\App\Videos\Video::class, function (Faker\Generator $faker) {
    return [
        'title'        => $faker->sentence,
        'description' => $faker->paragraph,
        'source' => 'https://www.youtube.com/watch?v=RTRQSVnkUe8'
    ];
});