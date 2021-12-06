<?php

namespace Database\Seeders;

use App\Models\Inote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inote = new Inote();
        $inote->title = 'Làm ngay';
        $inote->content = Str::random(20);
        $inote->image = 'abc';
        $inote->save();

        $inote = new Inote();
        $inote->title = 'Chưa cần gấp';
        $inote->content = Str::random(20);
        $inote->image = 'xyz';
        $inote->save();
    }
}
