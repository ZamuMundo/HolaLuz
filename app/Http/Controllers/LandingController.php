<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Repositories\SupplyPointRepository;


class LandingController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    private $supplyPointRepository;

    public function __construct(ClientRepository $clientRepository, SupplyPointRepository $supplyPointRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->supplyPointRepository = $supplyPointRepository;
    }

    public function index()
    {
        return view('home', [
            'success' => false,
            'error'     => false
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
;
        $searchCups = $request->search;

        if ($this->supplyPointRepository->getSuppliPointByCups($searchCups)){
            $supplyPoint = $this->supplyPointRepository->getSuppliPointByCups($searchCups);
            $client = $this->clientRepository->getClientByCups($searchCups);
            $powerClient = $supplyPoint->power;
            $neighbors = $supplyPoint->neighbors;

            return view('home')->with([
                'success'   => true,
                'client'    => $client,
                'points'    => $supplyPoint,
                'isOffer'     => $this->isExistOffertClient($neighbors, $powerClient),
            ]);
        }

        return view('home')->with([
            'success'   => false,
            'error'     => true
            ]);
    }

    /**
     * @param $neighbors
     * @param $powerClient
     * @return bool
     */
    private function isExistOffertClient($neighbors, $powerClient): bool
    {
        if (count($neighbors) == 0 or !$this->isPowerGreaterThanNeighbors( $powerClient, $neighbors)){
            return false;
        }

        return true;
    }

    /**
     * @param object $powerClient
     * @param array|null $neighbors
     * @return bool
     */
    private function isPowerGreaterThanNeighbors(object $powerClient, array $neighbors = null): bool
    {
        foreach ($neighbors as $neighbor)
        {
            $nPower = $this->supplyPointRepository->getSuppliPointByCups($neighbor)->power;

            if ( (int)$powerClient->p1 < (int)$nPower->p1 or (int)$powerClient->p2 < (int)$nPower->p2){
                return false;
            }
        }

        return true;
    }
}
