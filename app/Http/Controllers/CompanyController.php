<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ApiQueries;


use App\Services\CompaniesHouseService;
class CompanyController extends Controller
{
    //
    protected $companiesHouse;

    public function __construct(CompaniesHouseService $companiesHouse)
    {
        $this->companiesHouse = $companiesHouse;
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = $this->companiesHouse->searchCompanies($query);
        $count = count($results);
        return view('companies.index', compact('results', 'count'));
        // return response()->decode_json($results);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('q');
    
    //     // Check local DB first
    //     $companies = Company::where('name', 'like', "%{$query}%")->get();
    
    //     if ($companies->isEmpty()) {
    //         $results = $this->companiesHouse->searchCompanies($query);
    
    //         foreach ($results['items'] ?? [] as $item) {
    //             Company::updateOrCreate(
    //                 ['company_number' => $item['company_number']],
    //                 [
    //                     'name' => $item['title'],
    //                     'status' => $item['company_status'] ?? null,
    //                     'address' => $item['address_snippet'] ?? null,
    //                     'raw_data' => json_encode($item),
    //                 ]
    //             );
    //         }
    
    //         $companies = Company::where('name', 'like', "%{$query}%")->get();
    //     }
    
    //     return view('companies.index', compact('companies', 'query'));
    // }
    
    public function show($companyNumber)
    {
        $profile = $this->companiesHouse->getCompanyProfile($companyNumber);

        return response()->json($profile);
    }

    public function filings($companyNumber)
    {
        $files = $this->companiesHouse->getCompanyFiles($companyNumber);

        return response()->json($files);
    }

    public function showAll()
    {
        $profileAll = $this->companiesHouse->searchAll();

        return response()->json($profileAll);
    }

    public function profile($number)
{
    $company = $this->companiesHouse->get("company/{$number}");
    // return view('companies.profile', compact('company'));
    return response()->json($company);
}

public function officers($number)
{
    $officers = $this->companiesHouse->get("company/{$number}/officers");
    // return view('companies.officers', compact('officers'));
    return response()->json($officers);
}

public function work()
{
    $userName = 'Rufai SoftCode';

    ApiQueries::dispatch($userName);
    return response->json()
}


}
