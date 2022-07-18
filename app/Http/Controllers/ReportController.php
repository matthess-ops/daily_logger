<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
  public function index(){
    error_log("report index called");
    $user = auth::user();
    $allReports =$user->client->reports;
    $reportsLastFiveDays= $allReports->where('created_at', '>=', Carbon::today()->subDays(3))->reverse();
    return view('client.reports.daily-report',compact('reportsLastFiveDays'));
  }
}
