<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [
            'name' => 'Trần Việt Hoàng',
            'address' => 'Nam Định',
            'email' => 'hoangtv@gmail.com',
            'phone' => '0123456789',
            'avatar' => 'https://thuthuatnhanh.com/wp-content/uploads/2018/07/anh-dai-dien-boy-cam-kiem-samurai-kyo.jpg',
        ],
        [
            'name' => 'Trần Trung Đức',
            'address' => 'Hà Nội',
            'email' => 'ductt@gmail.com',
            'phone' => '0123756789',
            'avatar' => 'https://thuthuatnhanh.com/wp-content/uploads/2018/07/anh-dai-dien-boy-cam-kiem-samurai-kyo.jpg',
        ],
        ];
        DB::table('user_lists')->insert($data);
    }
}
