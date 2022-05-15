<?php

namespace App\Models\Fake;

use App\Models\SupplyPoint;


class FakeDataSupplyPoints
{

    /**
     * @return false|string
     */
    public static function supplyPoints()
    {
        return file_get_contents(storage_path() . "/supply-points.json");
    }
}
