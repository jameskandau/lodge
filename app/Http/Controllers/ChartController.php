<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Booking;
class ChartController extends Controller
{
    public function customers()
    {
    	$agodate =Carbon::now()->subWeek()->format('Y-m-d');
        $now = Carbon::now()->format('Y-m-d');
        $query = Booking::whereBetween('created_at', [$agodate, $now])
        ->groupBy('created_at')
        ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "customers"')
                ]);

          return $query;
    }
}
