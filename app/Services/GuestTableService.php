<?php

namespace App\Services;

use App\Models\Guest;

class GuestTableService implements TableServiceInterface
{
    public function getRouteName()
    {
        return 'guest';
    }

    public function getColumns()
    {
        $dataset = [
            [
                'title' => trans('general.first_name'),
                'value' => function (Guest $data) {
                    return $data->first_name;
                },
            ],
            [
                'title' => trans('general.last_name'),
                'value' => function (Guest $data) {
                    return $data->last_name;
                },
            ],
            [
                'title' => trans('general.address'),
                'value' => function (Guest $data) {
                    return $data->address.', '.$data->code_postal.' '.$data->ville;
                },
            ],
            [
                'title' => trans('general.num_id'),
                'value' => function (Guest $data) {
                    return $data->num_id;
                },
            ],
            [
                'title' => trans('general.contact'),
                'value' => function (Guest $data) {
                    return $data->contact;
                },
            ],
        ];

        return $dataset;
    }
}
