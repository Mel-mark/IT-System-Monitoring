<?php

namespace App\Http\Controllers;

use App\Models\reports;
use App\Models\canceled_reports;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Session;
use Response;
use Illuminate\Pagination\Paginator;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class reportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // log in as guest
    public function guest()
    {
        $month = [];
        $count = [];

        // sytem array
        $system = ['Citrix','Data Center Server','eClipse','MITS Server','Subic NAS','TSM Mobile','TSM Office'];

      
        // date formating for last week and last month --------------------------------------------------------------------------------------------------------------------
            $now = Carbon::now();
            
            $today = Carbon::parse($now)->format('Y-m-d');
            $dateMinusOneWeek = Carbon::parse($now)->subWeek()->format('Y-m-d');
            $dateMinusOneMonth = Carbon::parse($now)->subMonth()->format('Y-m-d');

            $weeks = reports::select('*')->where('created_at','>',$dateMinusOneWeek)->orderBy('pri_level', 'ASC')->count();
         
        // data for ongoing report/ticket ------------------------------------------------------------------------------------------------------------------------
            $data = reports::select('*')->where('status','=','Ongoing')->orderBy('pri_level', 'ASC')->get();
            $data2 = reports::select('*')->where('created_at','>=',$dateMinusOneWeek)->orderBy('created_at', 'ASC')->get();

        // history data -------------------------------------------------------------------------------------------------------------------------------------------
            $cancel = canceled_reports::all();
            $History_reports = reports::select('*')->where('status','!=','Ongoing')->get();

        // yesterday file
            $yesterday_data = reports::select('*')->where('status','=','Ongoing')->where('created_at','<',$now)->orderBy('created_at', 'ASC')->get();
            $today_data = reports::select('*')->where('status','=','Ongoing')->where('created_at','>',$now)->orderBy('created_at', 'ASC')->get();
        // month for chart ----------------------------------------------------------------------------------------------------------------------------------------
            foreach ($data2 as $result) {
                    array_push($month,$result->created_at);
                    array_push($count,$result->pri_level);
            }
    
            return view('user/dashboard_guest',compact('data','data2','weeks','count','system','cancel','yesterday_data','today_data'));

        
    }

    // admin main page
    public function admin()
    {
        $month = [];
        $count = [];
        
        $user = Auth::user();
    
        // sytem array
        $system = ['Citrix','Data Center Server','eClipse','MITS Server','Subic NAS','TSM Mobile','TSM Office'];

        // date formating for last week and last month --------------------------------------------------------------------------------------------------------------------
            $now = Carbon::now();
            
            $today = Carbon::parse($now)->format('Y-m-d');
            $dateMinusOneWeek = Carbon::parse($now)->subWeek()->format('Y-m-d');
            $dateMinusOneMonth = Carbon::parse($now)->subMonth()->format('Y-m-d');

            $weeks = reports::select('*')->where('created_at','>',$dateMinusOneWeek)->orderBy('pri_level', 'ASC')->count();
         
        // data for ongoing report/ticket ------------------------------------------------------------------------------------------------------------------------
            $data = reports::select('*')->where('status','=','Ongoing')->orderBy('pri_level', 'ASC')->get();
            $data2 = reports::select('*')->where('created_at','>=',$dateMinusOneWeek)->orderBy('created_at', 'ASC')->get();

        // history data -------------------------------------------------------------------------------------------------------------------------------------------
            $cancel = canceled_reports::all();
            $History_reports = reports::select('*')->where('status','!=','Ongoing')->get();

        // yesterday file
            $yesterday_data = reports::select('*')->where('status','=','Ongoing')->where('created_at','<',$now)->orderBy('created_at', 'ASC')->get();
            $today_data = reports::select('*')->where('status','=','Ongoing')->where('created_at','>',$now)->orderBy('created_at', 'ASC')->get();
        // month for chart ----------------------------------------------------------------------------------------------------------------------------------------
            foreach ($data2 as $result) {
                    array_push($month,$result->created_at);
                    array_push($count,$result->pri_level);
            }
            if($user->isAdmin == 1){
                return view('admin/dashboard_admin',compact('data','data2','weeks','count','system','cancel','yesterday_data','today_data'));
            }else{
                return view('user/dashboard_guest',compact('data','data2','weeks','count','system','cancel','yesterday_data','today_data'));
            }
          
         
    }
    // get history data 
    public function getHistoryDdata(request $request)
    {
        // $data = reports::select('*')->where('status','!=','Ongoing')->get();
      
        $info = [
            'draw' => $request->draw,
            'data' => [],
            'total' => 0,
        ];
        $data_array = [];
        $search = $request->input('search.value');
        
        $reports = reports::orWhere( function($data) use ( $search ) {
            $data->where( "s_description", "LIKE", "%".$search."%" )
                 ->orwhere( "l_description", "LIKE", "%".$search."%" )
                 ->orwhere( "name", "LIKE", "%".$search."%" )
                 ->orwhere( "comment", "LIKE", "%".$search."%" )
                 ->orwhere( "system", "LIKE", "%".$search."%" )
                 ->orwhere( "pri_level", "LIKE", "%".$search."%" )
                 ->orwhere( "status", "LIKE", "%".$search."%" )
                 ->orwhere( "ass_personel", "LIKE", "%".$search."%" );
        } )->orderBy('created_at','DESC')->dateFilter( $request->from_date, 
                        $request->to_date, 
                        $request->System,
                        $request->Status,
                        $request->Personel)->take( $request->length )->skip( $request->start )->get();
   
        $info['total'] = reports::orWhere( function($data) use ( $search ) {
            $data->where( "s_description", "LIKE", "%".$search."%" )
                    ->orwhere( "l_description", "LIKE", "%".$search."%" )
                    ->orwhere( "name", "LIKE", "%".$search."%" )
                    ->orwhere( "comment", "LIKE", "%".$search."%" )
                    ->orwhere( "system", "LIKE", "%".$search."%" )
                    ->orwhere( "pri_level", "LIKE", "%".$search."%" )
                    ->orwhere( "status", "LIKE", "%".$search."%" )
                    ->orwhere( "ass_personel", "LIKE", "%".$search."%" );
        } )->dateFilter( $request->from_date, 
                        $request->to_date, 
                        $request->System,
                        $request->Status,
                        $request->Personel )->count();

        $sl_no_counter = ( $request->start == 0 )? 1 : $request->start+1;

        foreach( $reports as $post ){
            $post->sl_no = $sl_no_counter;
         
            $create = str_split($post->created_at,10);
            $update = str_split($post->updated_at,10);

            array_push($data_array,[
                            'id' => $post->id,
                            '#' => $sl_no_counter,
                            'Title'=> $post->s_description,
                            'Description'=> $post->l_description,
                            'Name'=> $post->name,
                            'Comment'=> $post->comment,
                            'System'=> $post->system,
                            'Pri_level'=> $post->pri_level,
                            'Status'=> $post->status,
                            'Personel'=> $post->ass_personel,
                            'Submitted'=> $create[0],
                            'Completed'=> $update[0],
                            'created_at'=> $post->created_at,
                            ]);   
                            
            $sl_no_counter++;
        }

        $info['data'] = $data_array;
      
        return $info;
    
    }
    

    // add reports
    public function addReport(request $request,reports $reports)
    {
    
        $reports = new reports();
        
        $reports->s_description = $request->title;
        $reports->l_description = $request->desc;
        $reports->name = $request->name;
        $reports->comment = $request->comment;
        $reports->pri_level = $request->pri_level;
        $reports->ass_personel = $request->personel;
        $reports->system = $request->system;
        $reports->status = 'Ongoing';

        date_default_timezone_set("Australia/Sydney");
        $Sydney = new \DateTime(Carbon::now()->toDateTimeString());
        $Sydney = $Sydney->format('Y-m-d H:i:s');

        $reports->created_at = $Sydney;
        
        $res = $reports->save();

        if($res){
            return redirect('admin');
        }else{
         return back()->with('Failed','Something went wrong');
        }
    }

    // update status of reports to resolve
    public function resolve_report(request $request,reports $reports)
    {

        $reports = reports::find($request->id);
       
        $reports->status = 'Complete';

        $res = $reports->update();

        if($res){
            return redirect('admin');
        }else{
         return back()->with('Failed','Something went wrong');
        }
    }
   
    public function export(request $request)
    {
        // get data based on inputs of filter
            if($request->from != 'null' || $request->to != 'null' ){
            
                $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString(); // 2018-09-29 00:00:00
                $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString(); // 2018-09-29 23:59:59

                    // if status == All 
                        if($request->status == 'All' ){

                            // if personle == All 
                                if($request->personel == 'All' )
                                {   
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->get();

                                    }else{
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('system','=',$request->systems)->get();
                                    }
                                }else{
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('ass_personel','=',$request->personel)->get();
                                    }else{
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('ass_personel','=',$request->personel)->where('system','=',$request->systems)->get();
                                        
                                    }
                                }
                        }else{
                                if($request->personel == 'All' )
                                {
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->get();
                                    }else{
                                        $data  = reports::select('*')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('system','=',$request->systems)->get();
                                    }
                                }else{
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->get();
                                    }else{
                                        $data  = reports::select('*')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->where('system','=',$request->systems)->get();
                                    }
                                
                                }
                        }
                        
                }else{
                        if($request->status == 'All' ){
                            // if personle == All 
                                if($request->personel == 'All' )
                                {
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->get();
                                    }else{
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->where('system','=',$request->systems)->get();
                                    }
                                }else{
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->where('ass_personel','=',$request->personel)->get();
                                    }else{
                                        $data  = reports::select('*')->where('status','!=','Ongoing')->where('ass_personel','=',$request->personel)->where('system','=',$request->systems)->get();
                                    }
                                }
                        }else{
                                if($request->personel == 'All' )
                                {
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->where('status','=',$request->status)->get();
                                    }else{
                                        $data  = reports::select('*')->where('status','=',$request->status)->where('system','=',$request->systems)->get();
                                    }
                                }else{
                                    if($request->systems  == 'All'){
                                        $data  = reports::select('*')->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->get();
                                    }else{
                                        $data  = reports::select('*')->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->where('system','=',$request->systems)->get();
                                    }
                                }
                        }
            }  
   

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );      

        $columns = array('Title', 'Description', 'Name', 'Comment', 'System', 'Priority Level', 'Status', 'Personel', 'created_at', 'updated_at');
        $callback = function() use ($data, $columns)
        {
            $file = fopen('php://output', 'w'); 
            fputcsv($file, $columns);
    
            foreach($data as $review) {
                fputcsv($file, array($review->s_description,$review->l_description,$review->name,$review->comment,$review->system,$review->pri_level,$review->status,$review->ass_personel,$review->created_at,$review->updated_at));
             
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

  
    public function edit_report(reports $reports,request $request)
    {
       
            $reports = reports::find($request->id);
       
            return view('admin/edit_report',compact('reports'));

       

            return view('index');

     
    }

    // update 
    public function update_report(request $request,reports $reports)
    {
        $reports = reports::find($request->id);
        
        $reports->s_description = $request->title;
        $reports->l_description = $request->desc;
        $reports->name = $request->name;
        $reports->comment = $request->comment;
        $reports->pri_level = $request->pri_level;
        $reports->ass_personel = $request->personel;
        $reports->system = $request->system;

        $res = $reports->update();

        if($res){
            return redirect('admin');
        }else{
         return back()->with('Failed','Something went wrong');
        }

    }

    public function cancel(request $request,reports $reports,canceled_reports $cancel)
    {
        // update status or report
        $reports = reports::find($request->rep_id);
       
        $reports->status = 'Cancel';

        $resup = $reports->update();


        // check if both work
        if($resup){

            // save reason of cancelation
            $cancel = new canceled_reports();
        
            $cancel->rep_id = $request->rep_id;
            $cancel->reason = $request->reason;

            $ressave = $cancel->save();

            if($ressave){
                return redirect('admin');
            }
        }else{
         return back()->with('Failed','Something went wrong');
        }
    }

    //CSV file upload and save to database
    public function addCSV(request $request,reports $reports)
    {
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );
     
        $file = $request->file('file');
      
         // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
        {
 
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                
                // save files to database
                $reports = new reports();
                // Get row data
                $reports->s_description = $getData[0];
                $reports->l_description = $getData[1];
                $reports->name = $getData[2];
                $reports->comment = $getData[3];
                $reports->system = $getData[4];
                $reports->pri_level = $getData[5];
                $reports->status = $getData[6];
                $reports->ass_personel = $getData[7];
                $reports->created_at = $getData[8];
              
                $res = $reports->save();
            }
 
            // Close opened CSV file
            fclose($csvFile);
             return redirect('admin');
        }
    }
}
