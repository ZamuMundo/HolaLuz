<?php

namespace App\Repositories;

use App\Models\Fake\FakeDataClients;

/**
 * Class ClientRepository.
 */
class ClientRepository
{

    /**
     * @return false|string
     */
    public function getJsonClients()
    {
        return FakeDataClients::clients();
    }

    /**
     * @param STRING|null $cups
     * @return mixed|\TValue
     */
    public function getClientByCups(string $cups = null)
    {
        $clients = json_decode(FakeDataClients::clients());

        $client = '';
        $collection = collect($clients);
        $collection->each(function ($item) use ($cups, &$client){
            if ($item->cups == '123456') {
                $client = $item;
                return false;
            }
        });

        return $client;
    }

}
