<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $to_truncate = [
    'users',
    'benchmarks',
    'companies',
    'keywords_plans',
    'keywords',
    'keyword_keywords_plan',
    'roles',
    'permissions',
    'permission_role',
    'cities',
    'city_keywords_plan',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->to_truncate as $table) {
            DB::table($table)->truncate();
        }

        $this->call('UsersTableSeeder');

        $this->call('RolesTableSeeder');

        $this->call('PermissionsTableSeeder');

        $this->call('CompaniesTableSeeder');

        // $this->call('KeywordsPlansTableSeeder');

        // $this->call('KeywordsTableSeeder');

    }
}
