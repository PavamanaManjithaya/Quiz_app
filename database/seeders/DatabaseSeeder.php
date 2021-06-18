<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $admin=new User();
        $admin->name="admin";
        $admin->email="admin123@gmail.com";
        $admin->password=bcrypt('12345678');
        $admin->visible_password="12345678";
        $admin->email_verified_at=NOW();
        $admin->occupation="assistant";
        $admin->address="sulkeri";
        $admin->phone="9448932451";
        $admin->bio="hello";
        $admin->is_admin=1;
        $admin->save();

    }
}
