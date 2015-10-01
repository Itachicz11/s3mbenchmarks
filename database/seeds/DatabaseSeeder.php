<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    	$this->call('BenchmarksTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('KeywordsTableSeeder');
		$this->call('KeywordsPlansTableSeeder');
		$this->call('MigrationsTableSeeder');
		$this->call('PageRanksTableSeeder');
		$this->call('PasswordResetsTableSeeder');
		$this->call('UsersTableSeeder');
	}
}
