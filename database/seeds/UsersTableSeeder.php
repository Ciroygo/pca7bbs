<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = app(Faker\Generator::class);

        $avatars = [
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png',
        ];

        $users = factory(User::class)->times(10)->make()->each(function ($user, $index) use ($faker, $avatars) {
            $user->avatar = $faker->randomElement($avatars);
        });

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);
        $user->name = 'Ciroygo';
        $user->email = '11436549@qq.com';
        $user->avatar = 'http://bbs.pca7.test/uploads/images/avatar/201902/12/1_1549949298_0zlsboSXYK.jpg';
        $user->save();

        $user->assignRole('Founder');

        $user = User::find(2);
        $user->assignRole('Maintainer');


        $user = User::find(3);
        $user->assignRole('Maintainer');

        $user = User::find(4);
        $user->givePermissionTo('manage_contents');
    }
}
