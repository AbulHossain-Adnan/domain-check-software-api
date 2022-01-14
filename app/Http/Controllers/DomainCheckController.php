<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DomainCheckController extends Controller
{
    public function domain_check(Request $Request){
        $domain=$Request->domain;
        $response=HTTP::get('https://domain-availability.whoisxmlapi.com/api/v1?apiKey=at_kk2UUwrFAYDkWnLRbfjO27HcSAjPP&domainName='.$domain);
        return response()->json($response->json());
    }
}
