<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = new \App\Category();
        $cate->name = 'Máy lạnh';
        $cate->save();

        $cate = new \App\Category();
        $cate->name = 'Máy giặt';
        $cate->save();

        $cate = new \App\Category();
        $cate->name = 'Điện gia dụng';
        $cate->save();

        $cate = new \App\Category();
        $cate->name = 'Đồ dùng gia đình';
        $cate->save();

        $cate = new \App\Category();
        $cate->name = 'Điện thoại ';
        $cate->save();

        $cate = new \App\Category();
        $cate->name = 'Laptop ';
        $cate->save();

        $cate = new \App\Category();
        $cate->name = 'Tivi ';
        $cate->save();
    }
}
