<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prize;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prize = new Prize();
        $prize->name = 'Freebuds 3i';
        $prize->original_total = 100;
        $prize->total = 100;
        $prize->quantity = 1;
        $prize->type = 'static';
        $prize->enabled = 1;
        $prize->save();

        $prize = new Prize();
        $prize->name = '1 película de alquiler gratis en Claro Vídeo';
        $prize->original_total = 100;
        $prize->total = 100;
        $prize->quantity = 1;
        $prize->type = 'dinamic';
        $prize->enabled = 1;
        $prize->save();

        $prize = new Prize();
        $prize->name = '3 películas de alquiler gratis en Claro Vídeo';
        $prize->original_total = 100;
        $prize->total = 100;
        $prize->quantity = 3;
        $prize->type = 'dinamic';
        $prize->enabled = 1;
        $prize->save();

        $prize = new Prize();
        $prize->name = '5 películas de alquiler gratis en Claro Vídeo';
        $prize->original_total = 100;
        $prize->total = 100;
        $prize->quantity = 5;
        $prize->type = 'dinamic';
        $prize->enabled = 1;
        $prize->save();

        $prize = new Prize();
        $prize->name = 'Matepad T310';
        $prize->original_total = 100;
        $prize->total = 100;
        $prize->quantity = 1;
        $prize->type = 'static';
        $prize->enabled = 1;
        $prize->save();

        $prize = new Prize();
        $prize->name = 'Watch GT-2';
        $prize->original_total = 100;
        $prize->total = 100;
        $prize->quantity = 1;
        $prize->type = 'static';
        $prize->enabled = 1;
        $prize->save();
    }
}
