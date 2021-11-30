<?php

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $reservations=[
            [
                'room_id' => '1',
                'guest_id' => '1',
                'date_start' => '12-01-2021',
                'date_end' => '12-01-2021',
                'people' => '2',
            ],
            [
                'room_id' => '4',
                'guest_id' => '1',
                'date_start' => '01-12-2021',
                'date_end' => '12-12-2021',
                'people' => '1',
            ],
            [
                'room_id' => '1',
                'guest_id' => '2',
                'date_start' => '29-11-2021',
                'date_end' => '02-12-2021',
                'people' => '2',
                'check_in' => '1',
            ],
            [
                'room_id' => '2',
                'guest_id' => '2',
                'date_start' => '01-12-2021',
                'date_end' => '12-01-2021',
                'people' => '3',
            ],
        ];

        foreach ($reservations as $key => $value){
            Reservation::firstOrCreate($value);
        }

    }
}
