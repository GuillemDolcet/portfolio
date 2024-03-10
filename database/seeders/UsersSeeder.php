<?php

namespace Database\Seeders;

use App\Repositories\Users;
use Illuminate\Database\Seeder;

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
            'email' => 'g.dolcet.jove@gmail.com',
            'active' => true
        ]);

        $user->assignRole('admin');
    }
}
