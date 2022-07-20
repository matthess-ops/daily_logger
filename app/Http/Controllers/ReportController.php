<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Report;
use App\ReportQuestion;

class ReportController extends Controller
{
    //function = client get of the last five days of daily reports
  public function index(){
    // get the user
    $user = auth::user();
    // get all the reports belonging to this user
    $allReports =$user->client->reports;
    // get the last five days of reports
    $reportsLastFiveDays= $allReports->where('created_at', '>=', Carbon::today()->subDays(3))->reverse();
    // return the last five days of reports to the frontend
    return view('client.reports.reports',compact('reportsLastFiveDays'));
  }

  //function =  admin show of client report questions
  //$id = the id of the client of interest
  public function showClientReport($id){
    // get the client
    $client = Client::find($id);
    // get the client report questions
    $questions = $client->reportQuestion;
    // return view with compacted client questions
    return view('admin.client-report-config',compact('questions'));

  }
  //function = admin delete of an question of the daily report
  //$id = the id of the reportQuestion table row
  //$request->input('index) = is the index of the question that needs to be deleted from the question array column
  public function deleteClientReportQuestion($id,Request $request){
    // find the report of interest
    $report = ReportQuestion::find($id);
    // get the questions column
    $questions =  $report->questions;
    // remove the question from the questions array
    array_splice($questions,$request->input('id'),1);
    //update the db question column
    $report->questions = $questions;
    $report->save();

    return redirect()->back();
  }
  //function = client gets report data of daily questions
  //id = the id of report of interest.
  public function edit($id){
    // get the report by its id
    $report = Report::find($id);
    // check if the report belongs to the user
    if(auth::id() ==$report->user_id){
        // return the report
        return view('client.reports.report-edit',compact('report'));

    }
    return redirect()->back();
  }
  //function = client update of the report of interest
  //$id =  the id of the report of interest
  //$request->input('scores) = array of scores for daily report questions
  public function update(Request $request, $id){
    // find the report
    $report = Report::find($id);
    // update the report scores to the newly inputted scores
    $report->scores = $request->input('scores');
    // set filled to true
    $report->filled = true;
    // set the filled_at to now
    $report->filled_at =Carbon::now();
    $report->save();
    return redirect()->back();

  }
}
