<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    static $password;

    return [
        'code'       => str_pad(CRC32(uniqid(rand(),1)), 10, '0', STR_PAD_LEFT),
        'name'       => $faker->name,
        'kana'       => $faker->kanaName,
        'postcode'   => $faker->postcode,
        'prefecture' => $faker->prefecture,
        'city'       => $faker->city,
        'address1'   => $faker->streetAddress,
        'address2'   => $faker->secondaryAddress,
        'tel'        => $faker->phoneNumber,
        'email'      => 'test_'.str_pad(CRC32(uniqid(rand(),1)), 5, '0', STR_PAD_LEFT).'_'.$faker->email,
        //'birthday'   => $faker->year.'-'.$faker->month.'-'.$faker->day,
        'birthday'   => $faker->date,
        'sex'        => rand(1,2),
        'password'   => $password ?: $password = bcrypt('secret'),
    ];
});
