<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\model\flight_schedule;

class ReportController extends Controller
{
    public function flightsProfit()
    {
        $flights = flight_schedule::get();

        $data['flights'] = $flights;
        return view('frontend.pages.profits', $data);
    }
}