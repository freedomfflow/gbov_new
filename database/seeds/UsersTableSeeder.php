<?php

class UsersTableSeeder extends DatabaseSeeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		foreach(range(1, 10) as $index) {
			App\User::create(
				[
					'email' => $faker->email,
					'first_name' => $faker->firstName,
					'last_name' => $faker->lastName,
					'password' => Hash::make($faker->word),
				]
			);
		}
	}
}