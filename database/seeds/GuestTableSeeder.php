<?php

use App\Models\Guest;
use Illuminate\Database\Seeder;

class GuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $guest = [
           [ 'first_name' => 'Jean',
            'last_name' => 'Dupont',
            'address' => '8 rue de l\'hôtel de ville',
            'code_postal' => '60280',
            'ville' => 'Venette',
            'num_ID' => '12313212431',
            'contact' => '08.09.02.38.48'],
            [ 'first_name' => 'Joséphine',
            'last_name' => 'Delarue',
            'address' => '16 Avenue du parc',
            'code_postal' => '60000',
            'ville' => 'Compiegne',
            'num_ID' => '12313269431',
            'contact' => '08.09.02.38.48'],
        ];

        foreach ($guest as $key => $value) {
            Guest::firstOrCreate($value);
        }
    }
}

