<?php

namespace App\Models\Fake;

use App\Models\Client;

class FakeDataClients
{
    /**
     * @return false|string
     */
    public static function clients()
    {
        return file_get_contents(storage_path() . "/clients.json");
    }

    /** @noinspection PhpMethodParametersCountMismatchInspection */
    public static function transformClients()
    {
        $dataClients = file_get_contents(storage_path() . "/clients.json");

        $clients = [];

        foreach ($dataClients as $dataClient){
           $clients = new Client(
                $dataClient->full_name,
                $dataClient->address,
                $dataClient->cups,
                $dataClient->role,
                $dataClient->building_type,
                $dataClient->email,
                $dataClient->password
            );
        }

        return $clients;
    }
}
