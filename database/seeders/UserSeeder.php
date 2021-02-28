<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 * @package Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
    }

    /**
     *
     */
    private function createAdmin()
    {
        if (User::where('email', 'admin@admin.admin')->first() == null) {
            User::create([
                'email' => 'admin@admin.admin',
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin12345')
            ]);
        }
    }

}
