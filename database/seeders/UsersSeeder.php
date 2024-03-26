<?php

namespace Database\Seeders;

use App\Repositories\Users;
use App\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Users repository instance.
     *
     * @param Users $users
     */
    protected Users $users;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $user = $this->users->create([
            'name' => 'Guillem Dolcet Jové',
            'email' => 'demo@demo.com',
            'password' => 'demo',
            'remember_token' => Str::random(10),
            'active' => true
        ]);

        $user->assignRole('admin');
    }
}
