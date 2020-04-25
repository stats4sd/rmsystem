<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name' => 'Admin',
            'email'=>'admin@stats4sd.org',
            'id'=>'10'
        ]);
    }
}
