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

class reportsController extends Controller
{

    // log in in admin
    public function index(request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (!empty($email) && !empty($password) && $email == 'admin' && $password == 'admin') 
            {
                $request->session()->put(['user' => 'admin']);
                return redirect('admin');
            } 
        else
            {
                return back()->with('failed','Email or password not match');
            }
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
            $weeks_data = reports::select('*')->where('created_at','>',$dateMinusOneWeek)->get();
            $months = reports::select('*')->where('created_at','>',$dateMinusOneMonth)->orderBy('pri_level', 'ASC')->count();

        // data for ongoing report/ticket ------------------------------------------------------------------------------------------------------------------------
            $data = reports::select('*')->where('status','=','Ongoing')->orderBy('pri_level', 'ASC')->get();
            $data2 = reports::select('*')->orderBy('created_at', 'ASC')->get();

        // history data -------------------------------------------------------------------------------------------------------------------------------------------
            $cancel = canceled_reports::all();
            $History_reports = reports::select('*')->where('status','!=','Ongoing')->latest()->simplePaginate(10);

        // month for chart ----------------------------------------------------------------------------------------------------------------------------------------
            foreach ($data2 as $result) {
                    array_push($month,$result->created_at);
                    array_push($count,$result->pri_level);
            }
            
            return view('user/dashboard_guest',compact('data','data2','weeks','month','weeks_data','count','system','cancel','History_reports'));

        
    }

    // admin main page
    public function admin()
    {
        $month = [];
        $count = [];

        // sytem array
        $system = ['Citrix','Data Center Server','eClipse','MITS Server','Subic NAS','TSM Mobile','TSM Office'];

        if(Session::has('user')){

        // date formating for last week and last month --------------------------------------------------------------------------------------------------------------------
            $now = Carbon::now();
            $today = Carbon::parse($now)->format('Y-m-d');
            $dateMinusOneWeek = Carbon::parse($now)->subWeek()->format('Y-m-d');
            $dateMinusOneMonth = Carbon::parse($now)->subMonth()->format('Y-m-d');

            $weeks = reports::select('*')->where('created_at','>',$dateMinusOneWeek)->orderBy('pri_level', 'ASC')->count();
            $weeks_data = reports::select('*')->where('created_at','>',$dateMinusOneWeek)->get();
            $months = reports::select('*')->where('created_at','>',$dateMinusOneMonth)->orderBy('pri_level', 'ASC')->count();

        // data for ongoing report/ticket ------------------------------------------------------------------------------------------------------------------------
            $data = reports::select('*')->where('status','=','Ongoing')->orderBy('pri_level', 'ASC')->get();
            $data2 = reports::select('*')->orderBy('created_at', 'ASC')->get();

        // history data -------------------------------------------------------------------------------------------------------------------------------------------
            $cancel = canceled_reports::all();
            $History_reports = reports::select('*')->where('status','!=','Ongoing')->latest()->simplePaginate(10);

        // month for chart ----------------------------------------------------------------------------------------------------------------------------------------
            foreach ($data2 as $result) {
                    array_push($month,$result->created_at);
                    array_push($count,$result->pri_level);
            }
            
            return view('admin/dashboard_admin',compact('data','data2','weeks','month','weeks_data','count','system','cancel','History_reports'));

          }else{

              return view('index');

          }
    }
   
    // log in as guest
    public function logout(request $request)
    {
              $request->session()->forget('user');
              $request->session()->forget('Error');
              return view('index');
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
    // filter
    public function filter(request $request)
    {
        $data = [];
        // if date is not empty
        if($request->from != null || $request->to != null){
           
            $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString(); // 2018-09-29 00:00:00
            $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString(); // 2018-09-29 23:59:59

                // if status == All 
                    if($request->status == 'All' ){

                        // if personle == All 
                            if($request->personel == 'All' )
                            {   
                                if($request->systems  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->latest()->simplePaginate(10);

                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('system','=',$request->systems)->latest()->simplePaginate(10);
                                }
                            }else{
                                if($request->systems  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('ass_personel','=',$request->personel)->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('ass_personel','=',$request->personel)->where('system','=',$request->systems)->latest()->simplePaginate(10);
                                    
                                }
                            }
                    }else{
                            if($request->personel == 'All' )
                            {
                                if($request->systems  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('system','=',$request->systems)->latest()->simplePaginate(10);
                                }
                            }else{
                                if($request->systems  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->where('system','=',$request->systems)->latest()->simplePaginate(10);
                                }
                               
                            }
                    }
                    
            }else{
                    if($request->status == 'All' ){
                        // if personle == All 
                            if($request->personel == 'All' )
                            {
                                if($request->system  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('system','=',$request->system)->latest()->simplePaginate(10);
                                }
                            }else{
                                if($request->system  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('ass_personel','=',$request->personel)->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('ass_personel','=',$request->personel)->where('system','=',$request->system)->latest()->simplePaginate(10);
                                }
                            }
                    }else{
                            if($request->personel == 'All' )
                            {
                                if($request->system  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('status','=',$request->status)->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('status','=',$request->status)->where('system','=',$request->system)->latest()->simplePaginate(10);
                                }
                            }else{
                                if($request->system  == 'All'){
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->latest()->simplePaginate(10);
                                }else{
                                    $data  = reports::select('*')->where('status','!=','Ongoing')->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->where('system','=',$request->system)->latest()->simplePaginate(10);
                                }
                            }
                    }
        }  
            
            return $data;
    
    }

    public function export(request $request)
    {
        echo $request;
        // get data based on inputs of filter

    //     $data = [];

    //     // if date is not empty
    //     if($request->from != null || $request->to != null){
           
    //         $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString(); // 2018-09-29 00:00:00
    //         $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString(); // 2018-09-29 23:59:59

    //             // if status == All 
    //                 if($request->status == 'All' ){

    //                     // if personle == All 
    //                         if($request->personel == 'All' )
    //                         {
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->get();
    //                         }else{
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('ass_personel','=',$request->personel)->get();
    //                         }
    //                 }else{
    //                         if($request->personel == 'All' )
    //                         {
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->get();
    //                         }else{
                                
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->whereBetween('created_at', [$from, $to])->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->get();
                               
    //                         }
    //                 }
                    
    //         }else{
    //                 if($request->status == 'All' ){
    //                     // if personle == All 
    //                         if($request->personel == 'All' )
    //                         {
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->get();
    //                         }else{
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->where('ass_personel','=',$request->personel)->get();
    //                         }
    //                 }else{
    //                         if($request->personel == 'All' )
    //                         {
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->where('status','=',$request->status)->get();
    //                         }else{
    //                             $data  = reports::select('*')->where('status','!=','Ongoing')->where('status','=',$request->status)->where('ass_personel','=',$request->personel)->get();
    //                         }
    //                 }
    //     }  

    //     // $data  = reports::select('*')->where('status','!=','Ongoing')->get();

    //     $headers = array(
    //         "Content-type" => "text/csv",
    //         "Content-Disposition" => "attachment; filename=file.csv",
    //         "Pragma" => "no-cache",
    //         "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
    //         "Expires" => "0"
    //     );      

    //     $columns = array('id');
    // // , 'Title', 'Description', 'Name', 'Comment', 'System', 'Priority Level', 'Status', 'Personel', 'created_at', 'updated_at'
    //     $callback = function() use ($data, $columns)
    //     {
    //         $file = fopen('php://output', 'w');
    //         fputcsv($file, $columns);
    
    //         foreach($data as $review) {
    //             fputcsv($file, array($review->id));
    //         //   ,$review->s_description,$review->l_description,$review->name,$review->comment,$review->system,$review->pri_level,$review->status,$review->ass_personel,$review->created_at,$review->updated_at
    //         }
    //         fclose($file);
    //     };
    //     return Response::stream($callback, 200, $headers);
    }

    // history 
    public function history()
    {
        
            if(Session::has('user'))
            {
                
                        $cancel = canceled_reports::all();
                        $data = reports::select('*')->where('status','!=','Ongoing')->latest()->simplePaginate(10);

                        return view('admin/history',compact('data','cancel'));

            }else{

                return view('index');

            }
    }
    public function edit_report(reports $reports,request $request)
    {
        
        if(Session::has('user')){

            $reports = reports::find($request->id);
       
            return view('admin/edit_report',compact('reports'));

        }else{

            return view('index');

        }
     
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
        echo $request->rep_id;
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
}
