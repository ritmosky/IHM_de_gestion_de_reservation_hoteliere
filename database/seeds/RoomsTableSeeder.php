<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $rooms =[
            [
                'number' => '1',
                'floor' => '1',
                'capacity' => '2',
                'price' => '45',
            ],
            [
                'number' => '2',
                'floor' => '1',
                'capacity' => '4',
                'price' => '90',
            ],
            [
                'number' => '1',
                'floor' => '2',
                'capacity' => '3',
                'price' => '80'
            ],
            [
                'number' => '2',
                'floor' => '2',
                'capacity' => '1',
                'price' => '24'
            ],
        ];

        foreach($rooms as $key=>$value) {
            Room::firstOrCreate($value);
        }
    }
}
