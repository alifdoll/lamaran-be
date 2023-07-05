<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $now = Carbon::now()->format('Y-m-d H:i:s');
        DB::table('jobs')->insert([
            [
                'name' => 'Frontend Web Programmer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Fullstack Web Programmer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Quality Control',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table('skills')->insert([
            [
                'name' => 'PHP',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'PostgreSQL',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'API (JSON, REST)',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Version Control System (Gitlab, Github)',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
