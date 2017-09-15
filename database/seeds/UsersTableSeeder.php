<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$users = [
			[
				'nit'     => '123456',
				'nombre'    => 'manuel',
				'email' => 'email',
				'password' => Hash::make('123456789'),
			]
		];

		foreach ($users as $user) {
			\App\User::create($user);
		}
	}
}
