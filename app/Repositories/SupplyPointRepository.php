<?php

namespace App\Repositories;

use App\Models\Fake\FakeDataSupplyPoints;

/**
 * Class SupplyPointRepository.
 */
class SupplyPointRepository
{
    /**
     * @param string|null $cups
     * @return mixed|string
     */
    public function getSuppliPointByCups(string $cups = null)
    {
        $supplyPoints = json_decode(FakeDataSupplyPoints::supplyPoints());

        $supplyPoint = '';
        $collection = collect($supplyPoints);
        $collection->each(function ($item) use ($cups, &$supplyPoint){
            if ($item->cups == $cups) {
                $supplyPoint = $item;
                return false;
            }
        });

        return $supplyPoint;
    }
}
