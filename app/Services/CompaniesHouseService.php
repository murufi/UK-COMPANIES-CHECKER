<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CompaniesHouseService
{
    //The URL to the Company House Website, but this search companies alphabetically 
    // protected $baseUrl = 'https://api.company-information.service.gov.uk/alphabetical-search/';
    
    //The URL to the Company House Website, but this search companies alphabetically 
    protected $baseUrl = 'https://api.company-information.service.gov.uk/';

    //Methord that request search Companies api
    public function searchCompanies($query)
    {
        $api_key = config('services.companies_house.api_key');
        // dd($api_key);
        $response = Http::withBasicAuth($api_key, '')
                        ->get($this->baseUrl. 'search/companies', [
                    'q'=>$query]);
// dd($response->status(), $response->body());
        return $response->json();
    }

    //Methord that request Company Profile api, using company number
    public function getCompanyProfile($companyNumber)
    {
        $api_key = config('services.companies_house.api_key');
        $response = Http::withBasicAuth($api_key, '')
                        ->get($this->baseUrl . 'company/' . $companyNumber);

        return $response->json();
    }

    public function getCompanyFiles($companyNumber)
    {
        $api_key = config('services.companies_house.api_key');
        $response = Http::withBasicAuth($api_key, '')
                        ->get($this->baseUrl. 'company/'.$companyNumber.'/filing-history');
        return $response->json();
    }

    public function getOfficers($companyNumber)
    {
        //API key
        $api_key = config('services.companies_house.api_key');
        $response = Http::withBasicAuth($api_key, '')
                        ->get($this->baseUrl.'company/'.$companyNumber.'/officers' );
        dd($response->status(), $response->body());
        // return $response->json();
    }
    public function searchAll()
    {
        $api_key = config('services.companies_house.api_key');
        $response = Http::withBasicAuth($api_key, '')
            ->get($this->baseUrl.'search/');

            return $response->json();
    }

    public function get($endpoint, $params = [])
{
    $api_key = config('services.companies_house.api_key');

    $response = Http::withBasicAuth($api_key, '')
        ->get("https://api.company-information.service.gov.uk/{$endpoint}", $params);

    if ($response->unauthorized()) {
        throw new \Exception('Unauthorized – Check your API key');
    }

    return $response->json();
}

}
