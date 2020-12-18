<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $user = new User();
        $user->name = 'Julio';
        $user->lastname = 'Iquierdo Mejia';
        $user->password = Hash::make(12345678);
        $user->email = 'julio@gmail.com';
        $user->imei = 'LYduZAuQj9';
        $user->phone = '998913140';
        $user->dni = '06813928';
        $user->save();
        

    }
}
