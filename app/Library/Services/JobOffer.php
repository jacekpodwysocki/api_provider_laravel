<?php

namespace App\Library\Services;
  
use App\Library\Services\Contracts\CustomServiceInterface;
  
class JobOffer implements CustomServiceInterface
{


    public function getJobOffers()
    {

        $guzzleClient = new \GuzzleHttp\Client(['base_uri' => 'https://demo.appmanager.pl/api/v1/ads']);
		$response = $guzzleClient->request('GET', 'ads', [
		    'verify' => false,
		]);

		$payload = json_decode($response->getBody()->getContents());

        if($payload->success == 1){
            $jobOffers = [];
            foreach($payload->data as $data){
                array_push($jobOffers, [
                    'data' => $data->created_at,
                     'title' => $data->content->title,
                     'cities' => $data->cities            
                ]);
            }

            return $jobOffers;
        }

        return false;

    }
}
