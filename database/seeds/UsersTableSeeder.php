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
				'nombreUsuario'    => 'manuel',
				'email' => 'manuel@gmail.com',
				'password' => Hash::make('123456789'),
			]
		];

		foreach ($users as $user) {
			\App\User::create($user);
		}
	}
}
