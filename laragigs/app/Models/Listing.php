<?php

namespace App\Models;



class Listing
{
    public static function all()
    {
        return [
            [
                'id' => '1',
                'title' => 'listing 1',
            ],
            [
                'id' => '2',
                'title' => 'listing 2',
            ],
            [
                'id' => '3',
                'title' => 'listing 3',
            ],
        ];
    }
}
