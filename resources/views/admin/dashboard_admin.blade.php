<!-- php and laravel condition -->
           <!-- COUNT  -->
           <!-- store highest level priority-->
           @php  
                   
                   {{$i1 = 0; }}
                   {{$i2 = 0; }}
                   {{$i3 = 0; }}
                   {{$i4 = 0; }}
                   {{$i5 = 0; }}
                   {{$i6 = 0; }}
                   {{$i7 = 0; }}

                   {{$k1 = 0; }}
                   {{$k2 = 0; }}
                   {{$k3 = 0; }}
                   {{$k4 = 0; }}
                   {{$k5 = 0; }}
                   {{$k6 = 0; }}
                   {{$k7 = 0; }}

                   {{$pri1 = ''; }}
                   {{$pri2 = ''; }}
                   {{$pri3 = ''; }}
                   {{$pri4 = ''; }}
                   {{$pri5 = ''; }}
                   {{$pri6 = ''; }}
                   {{$pri7 = ''; }}

                   {{$counter = 0;}}
               @endphp 
                                   
<!-- loop report -->
                   @foreach ($data as $report)
                          

                       <!-- check if system is Citrix & not Complete -->

                           @if($report->system == 'Citrix' )
                               @php
                                   {{$i1 += 1; }}
                               @endphp
                                <!-- check the highest priority level -->
                                @if($report->pri_level == 'Outage')
                                   @php {{$pri1 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri1 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri1 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri1 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri1 = 'Operational';}} @endphp
                               @endif
                           @endif

                       <!-- check if system is data center & not operational -->
                       
                           @if($report->system == 'Data Center Server' )
                               @php
                                   {{$i2 += 1; }}
                               @endphp

                               <!-- check the highest priority level -->
                               @if($report->pri_level == 'Outage')
                                   @php {{$pri2 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri2 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri2 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri2 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri2 = 'Operational';}} @endphp
                               @endif

                           @endif

                       <!-- check if system is eClipse & not operational -->

                           @if($report->system == 'eClipse' )
                                @php
                                   {{$i3 += 1; }}
                               @endphp
                               
                               <!-- check the highest priority level -->
                               @if($report->pri_level == 'Outage')
                                   @php {{$pri3 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri3 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri3 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri3 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri3 = 'Operational';}} @endphp
                               @endif

                           @endif

                       <!-- check if system is MITS Server & not operational -->

                           @if($report->system == 'MITS Server' )
                           @php
                                   {{$i4 += 1; }}
                               @endphp

                               <!-- check the highest priority level -->
                               @if($report->pri_level == 'Outage')
                                   @php {{$pri4 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri4 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri4 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri4 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri4 = 'Operational';}} @endphp
                               @endif

                           @endif
                       <!-- check if system is Subic NAS & not operational -->

                           @if($report->system == 'Subic NAS' )
                               @php
                                   {{$i5 += 1; }}
                               @endphp

                               <!-- check the highest priority level -->
                               @if($report->pri_level == 'Outage')
                                   @php {{$pri5 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri5 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri5 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri5 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri5 = 'Operational';}} @endphp
                               @endif

                           @endif

                       <!-- check if system is Subic NAS & not operational -->

                           @if($report->system == 'TSM Mobile')
                                @php
                                   {{$i6 += 1; }}
                                @endphp


                               <!-- check the highest priority level -->
                               @if($report->pri_level == 'Outage')
                                   @php {{$pri6 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri6 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri6 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri6 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri6 = 'Operational';}} @endphp
                               @endif

                           @endif

                       <!-- check if system is TSM Office & not operational -->

                           @if($report->system == 'TSM Office' )
                               @php
                                   {{$i7 += 1; }}
                               @endphp

                               <!-- check the highest priority level -->
                               @if($report->pri_level == 'Outage')
                                   @php {{$pri7 = 'Outage';}} @endphp
                               @elseif($report->pri_level == 'Major Impact')
                                   @php  {{$pri7 = 'Major Impact';}} @endphp
                               @elseif($report->pri_level == 'Minor Impact')
                                   @php    {{$pri7 = 'Minor Impact';}} @endphp
                               @elseif($report->pri_level == 'Low Impact or Request')
                                   @php    {{$pri7 = 'Low Impact or Request';}} @endphp
                               @else
                                   @php    {{$pri7 = 'Operational';}} @endphp
                               @endif


                           @endif
                       @endforeach 





<!-- weeks data for status card -->
                       @foreach ($weeks_data as $report)
                          

                          <!-- check if system is Citrix & not Complete -->
   
                              @if($report->system == 'Citrix' )
                                  @php
                                      {{$k1 += 1; }}
                                  @endphp
                              @endif
   
                          <!-- check if system is data center & not operational -->
                          
                              @if($report->system == 'Data Center Server' )
                                  @php
                                      {{$k2 += 1; }}
                                  @endphp
                              @endif
   
                          <!-- check if system is eClipse & not operational -->
   
                              @if($report->system == 'eClipse' )
                                   @php
                                      {{$k3 += 1; }}
                                    @endphp
                                  
   
                              @endif
   
                          <!-- check if system is MITS Server & not operational -->
   
                              @if($report->system == 'MITS Server' )
                                  @php
                                      {{$k4 += 1; }}
                                  @endphp
   
                              @endif
                          <!-- check if system is Subic NAS & not operational -->
   
                              @if($report->system == 'Subic NAS' )
                                  @php
                                      {{$k5 += 1; }}
                                  @endphp
                              @endif
   
                          <!-- check if system is Subic NAS & not operational -->
   
                              @if($report->system == 'TSM Mobile')
                                   @php
                                      {{$k6 += 1; }}
                                   @endphp
                              @endif
   
                          <!-- check if system is TSM Office & not operational -->
   
                              @if($report->system == 'TSM Office' )
                                  @php
                                      {{$k7 += 1; }}
                                  @endphp
                              @endif
                          @endforeach

                       <!--  -->
<!-- end of condition -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT System Monitoring</title>

    
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
 
    <!-- css hardcode -->
    <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}">
        
    <!-- date picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


</head>
<body >
    <div class="mybody">    
        <header >
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <div class="container-fluid">
                    <div>
                        <img src="{{ asset('asset/image/logod.png') }}" class="logos"> 
                        <span class="melmarkpogi">
                            IT System Monitoring
                        </span>
                    </div>
                    <div class="logout">
                        <a  href="{{ url('/logout')}} " class="btn btn-outline-secondary ">
                            <strong>Admin  </strong>                  
                            <img src="{{ asset('asset/image/logout.png') }}" class="logout-logo"> 
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
                                        
        <!-- main body -->
        <div  class="p-3" >

            <div class="container-fluid">
        
            
            <!-- overview ===================================================================================================================================== -->
                    <div class="hovertext" data-hover="The is the Overview of status,charts sorted by month and button text is sorted by weeks">
                        <div class="card" > 
                    
                        <div class="card-header"> 
                            <h1>Tickets Overview</h1>
                    
                        </div>

                            <div> 
                            
                                    </div>
                                        <div class="chart">
                                            <canvas id="myChart"></canvas>
                                        </div> 
                                    <div >
                                 <!-- chart -->
            
                                              
                            
                                        <ul class="card-title">
                                            <table>
                                                <tbody > 
                                                    <strong>
                                                        <tr >
                                                            <td><h4> Citrix </h4> Last 7 Days<span class="i">({{$k1}})</span></td> 
                                                            <td><h4> eClipse </h4> Last 7 Days<span class="i">({{$k3}})</span></td>
                                                            <td> <h4>TSM Mobile </h4> Last 7 Days <span class="i"> ({{$k6}}) </span></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><h4> Subic NAS </h4> Last 7 Days<span class="i">({{$k5}})</span></td>
                                                            <td> <h4>TSM Office  </h4> Last 7 Days<span class="i"> ({{$k7}}) </span></td>
                                                        </tr>
                                                        
                                                        <tr>  
                                                            <td> <h4>Data Center Server </h4> Last 7 Days<span class="i"> ({{$k2}}) </span></td>
                                                            <td><h4> MITS Serve  </h4> Last 7 Days <span class="i">({{$k4}}) </span></td>
                                                        </tr>
                                                    </tbody>
                                                </strong>
                                            </table>
                                        </ul> 


                                    </div>
                            </div>
                    </div>

            <!-- status======================================================================================================= -->
                <div class="hovertext-status" data-hover="The is the Status Card where all system is listed and being sorted, it indicates the highest priority level of the system, here you can add and see the reports/ticked of employee.">
                    <div class="card" >
                        <div class="card-header"> 
                            <h1>Status</h1>
                            <div class="add">
                                <a data-toggle="modal" data-target="#addmodal"><span class="hover">Add</span>
                                    <img src="{{ asset('asset/image/add.png') }}" class="logos"> 
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-borderedless">
                            <thead>
                                <tr class="card-th">
                                    <th>#</th>
                                    <th>System</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                                <tbody class="table-status">
                                        <!-- system loop -->
                                                @foreach($system as $sys)
                                            
                                                <tr>
                                                        <td>{{$counter = $counter + 1;}}</td>
                                                        <td> 
                                                    
                                                        {{ $sys}}

                                                        </td>
                                                        <td>
                                                            <!-- check if count is 0  -->
                                                            @if($sys == 'Citrix')
                                                                @if($i1 == 0)
                                                                    <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational
                                                                @else
                                                                    @if($pri1 == 'Outage')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                </span>{{$pri1 ;}} ({{$i1}})
                                                                            </a>
                                                                        @elseif($pri1 == 'Major Impact')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                </span>{{$pri1 ;}} ({{$i1}})
                                                                            </a>
                                                                        @elseif($pri1 == 'Minor Impact')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0
                                                                                </span>{{$pri1 ;}} ({{$i1}})
                                                                            </a>
                                                                        @elseif($pri1 == 'Low Impact or Request')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0
                                                                                </span>{{$pri1 ;}} ({{$i1}})
                                                                            </a>
                                                                        @else
                                                                            </span>{{$pri1 ;}} ({{$i1}})
                                                                        @endif
                                                                @endif

                                                                
                                                            @elseif($sys == 'Data Center Server')
                                                            @if($i2 == 0)
                                                                    <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational
                                                                @else
                                                                @if($pri2 == 'Outage')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                    </span>{{$pri2 ;}} ({{$i2}})
                                                                                </a>
                                                                        @elseif($pri2 == 'Major Impact')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                    </span>{{$pri2 ;}} ({{$i2}})
                                                                                </a>
                                                                        @elseif($pri2 == 'Minor Impact')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0
                                                                                    </span>{{$pri2 ;}} ({{$i2}})
                                                                                </a>
                                                                        @elseif($pri2 == 'Low Impact or Request')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0
                                                                                    </span>{{$pri2 ;}} ({{$i2}})
                                                                                </a>
                                                                        @else
                                                                                <span class="badge  bg-success text-success">0</span> Operational
                                                                                </span>{{$pri2 ;}} ({{$i2}})
                                                                        
                                                                        @endif
                                                                @endif

                                                            @elseif($sys == 'eClipse')
                                                                @if($i3 == 0)
                                                                                    <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational
                                                                    @else
                                                                            @if($pri3 == 'Outage')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                    </span>{{$pri3 ;}} ({{$i3}})
                                                                                </a>
                                                                            @elseif($pri3 == 'Major Impact')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                    </span>{{$pri3 ;}} ({{$i3}})
                                                                                </a>
                                                                            @elseif($pri3 == 'Minor Impact')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0
                                                                                    </span>{{$pri3 ;}} ({{$i3}})
                                                                                </a>
                                                                            @elseif($pri3 == 'Low Impact or Request')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0
                                                                                    </span>{{$pri3 ;}} ({{$i3}})
                                                                                </a>
                                                                            @else
                                                                                <span class="badge  bg-success text-success">0</span> Operational

                                                                            
                                                                            @endif
                                                                    @endif

                                                            @elseif($sys == 'MITS Server')
                                                                    @if($i4 == 0)
                                                                                    <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational   
                                                                    @else                                           
                                                                        @if($pri4 == 'Outage')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                </span>{{$pri4 ;}} ({{$i4}})
                                                                            </a>
                                                                        @elseif($pri4 == 'Major Impact')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                </span>{{$pri4 ;}} ({{$i4}})
                                                                            </a>
                                                                        @elseif($pri4 == 'Minor Impact')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;"   >0                                                               </span>{{$pri4 ;}} ({{$i4}})
                                                                                </span>{{$pri4 ;}} ({{$i4}})
                                                                            </a>
                                                                        @elseif($pri4 == 'Low Impact or Request')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;" >0                                                                 </span>{{$pri4 ;}} ({{$i4}})
                                                                                </span>{{$pri4 ;}} ({{$i4}})        
                                                                            </a>
                                                                        @else
                                                                            <span class="badge  bg-success text-success">0</span> Operational
                                                                        
                                                                        @endif
                                                                @endif

                                                            @elseif($sys == 'Subic NAS')
                                                                    @if($i5 == 0)
                                                                                <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational
                                                                    @else
                                                                        @if($pri5 == 'Outage')
                                                                                    <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                        </span>{{$pri5 ;}} ({{$i5}})
                                                                                    </a>
                                                                                @elseif($pri5 == 'Major Impact')
                                                                                    <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                        </span>{{$pri5 ;}} ({{$i5}})
                                                                                    </a>
                                                                                @elseif($pri5 == 'Minor Impact')
                                                                                    <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0
                                                                                        </span>{{$pri5 ;}} ({{$i5}})
                                                                                    </a>
                                                                                @elseif($pri5 == 'Low Impact or Request')
                                                                                        <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0
                                                                                        </span>{{$pri5 ;}} ({{$i5}})
                                                                                    </a>
                                                                                @else
                                                                                    <span class="badge  bg-success text-success">0</span> Operational
                                                                                @endif
                                                                        @endif
                                                            @elseif($sys == 'TSM Mobile')
                                                                @if($i6 == 0)
                                                                                    <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational
                                                                    @else
                                                                            @if($pri6 == 'Outage')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                    </span>{{$pri6 ;}} ({{$i6}})
                                                                                </a>
                                                                            @elseif($pri6 == 'Major Impact')
                                                                            <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                        </span>{{$pri6 ;}} ({{$i6}})
                                                                                    </a>
                                                                            @elseif($pri6 == 'Minor Impact')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0
                                                                                    </span>{{$pri6 ;}} ({{$i6}})
                                                                                </a>
                                                                            @elseif($pri6 == 'Low Impact or Request')
                                                                                    <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0
                                                                                        </span>{{$pri6 ;}} ({{$i6}})
                                                                                    </a>
                                                                            @else
                                                                                        
                                                                            @endif
                                                                    @endif

                                                            @elseif($sys == 'TSM Office')
                                                                @if($i7 == 0)
                                                                    <span class="badge  bg-success text-success" style="font-size:15px;">0</span> Operational
                                                                    @else
                                                                    @if($pri7 == 'Outage')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-dark text-dark" style="font-size:15px;">0
                                                                                </span>{{$pri7 ;}} ({{$i7}})
                                                                                </a>
                                                                            @elseif($pri7 == 'Major Impact' )
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge  bg-danger  text-danger" style="font-size:15px;">0
                                                                                    </span>{{$pri7 ;}} ({{$i7}})
                                                                                </a>
                                                                            @elseif($pri7 == 'Minor Impact')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0
                                                                                    </span>{{$pri7 ;}} ({{$i7}})
                                                                                </a>
                                                                            @elseif($pri7 == 'Low Impact or Request')
                                                                                <a href="#" class="modala" data-item="{{$sys}}" data-toggle="modal" data-target="#myModal2"><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0
                                                                                    </span>{{$pri7 ;}} ({{$i7}})
                                                                                </a>
                                                                            @else
                                                                        
                                                                            @endif
                                                                    @endif
                                                            @endif
                                                        </td>
                                                    </tr>

                                            @endforeach

                                    <!-- modal list-->    
                                        <div class="modal fade"  id="myModal2"  tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" >
                                                <div class="modal-content" >
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModal2Label">Report List</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body"  id="tableData">
                                                        
                                                        <!-- data came from js at the button -->
                                                    </div>
                                                    <div >
                                                        <div id="hidebutton">
                                                                <button class="arrow-down" id="show" > Show yesterday file 
                                                                    <img src="{{ asset('asset/image/docs.png') }}" class="image-chart"> 
                                                                        <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                                                                            <p type="text" id="notif">0</p>
                                                                        </span>
                                                                </button>
                                                        </div>
                                                        
                                                        <div id="myDIV">
                                                            <div class="modal-body"  id="hiddentableData">
                                                                    <!-- data came from js at the button -->
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <!-- end of modal list -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <table class="hidethis">
                        <tr>
                            <td><b>ORIGIN</b></td>
                            <td><span class="badge  bg-success text-success" style="font-size:15px;">0</span>  </td>
                            <td><span class="badge  bg-dark text-dark" style="font-size:15px;">0</span>  </td>
                            <td><span class="badge  bg-danger  text-danger" style="font-size:15px;">0</span> </td>
                        </tr>
                            <td></td>
                            <td></td>
                            <td><span class="badge" style="background-color:rgb(255, 159, 41) ;color:rgb(255, 159, 41);font-size:15px;">0</span> </td>
                            <td><span class="badge" style="background-color:rgb(247, 236, 9) ;color:rgb(247, 236, 9);font-size:15px;">0</span> </td>
                        <tr>
                        </tr>
                    </table>
                </div>
            <!-- end of loop  status-===========================================================================================-->
            <!-- id="download" -->
            <!-- History ======================================================================================================================= -->
                <div  class="hovertext-history" data-hover="History of done tickets">
                    <h1>History 
        
                        <!-- <button id="download"> <img src="{{ asset('asset/image/download.png') }}" class="download"> </button>
                        <button class = "dl">   </button> -->
                    </h1>
                    
                    <div class="filtration">
            
                            @csrf
                    
                            From:
                            <input name="from"  class="from" id="datepicker-from" placeholder="Enter Date" autocomplete="off">

                            To:
                            <input name="to" class="to"  id="datepicker-to" placeholder="Enter Date" autocomplete="off">

                            System:
                            <select class="status" name="system" id="systems">
                                <option value="All">All</option>
                                <option value="Citrix"> Citrix</option>
                                <option value="Data Center Server">Data Center Server</option>
                                <option value="eClipse">eClipse</option>
                                <option value="MITS Server">MITS Server</option>
                                <option value="Subic NAS">Subic NAS</option>
                                <option value="TSM Mobile">TSM Mobile</option>
                                <option value="TSM Office"> TSM Office</option>
                            </select>
                            Status:

                            <select class="status" name="status" id="status">
                                <option value="All">All</option>
                                <option value="Cancel">Cancel</option>
                                <option value="Complete">Complete</option>
                            </select>

                            Personel:
                            <select class="personel" name="personel" id="personel">
                                <option value="All">All</option>
                                <option value="Chris">Chris</option>
                                <option value="Jo Anne">Jo Anne</option>
                                <option value="Paul">Paul</option>
                                <option value="Valter">Valter</option>
                            </select>

                            <button id="search" class="history-button" >Search</button>
                            <a href="{{ url('/admin')}} "> <button class="history-button" > Reset</button> </a>

                            <img src="{{ asset('asset/image/search.png') }}" class="search"> 
                
                    </div>
                
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>System</th>
                            <th>Personel</th>
                            <th>Level</th>
                            <th>Comment</th>
                            <th>Description</th>
                            <th>Job Status</th>
                            <th>Date report</th>
                            <th>Last update</th>
                        </tr>
                    </thead>
                    <tbody id="history-table">
                        @php 
                            {{$i = 0;}}
                        @endphp
                        @foreach($History_reports as $report)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$report->s_description }} </td>
                                <td>{{$report->name }} </td>
                                <td>{{$report->system }} </td>
                                <td>{{$report->ass_personel }} </td>
                                <td>{{$report->pri_level }} </td>
                                <td>{{$report->comment }} </td>
                                <td>{{$report->l_description }} </td>
                                <td>
                                    @if($report->status == 'Cancel')
                                    <a href="#"  id="modal1" onclick="showCancel({{$report->id}})" data-toggle="modal" data-target="#myModal"> <p style="color:red;">Canceled</p> </a>
                                    @else
                                    <p style="color:green;">Complete</p>
                                    @endif
                                </td>
                                <td>{{$report->created_at }} </td>
                                <td>{{$report->updated_at }} </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                <div style="float:right;">
                    {!! $History_reports->links() !!}
                </div>
                </div>
    </div>

                                <!-- modal Cancel resason-->    
                                <div class="modal fade"  id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" >
                                            <div class="modal-content" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Reason of Report Cancelation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <textarea name="reason" id="reason" cols="100" rows="10" readonly></textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- end of cancel-->     
                
            <!-- End history -------------------------------------------------------------------------------------------------------------- -->
            <!-- modal Cancel resason ==========================================================================================-->    
                <div class="modal fade"  id="myModal3"  tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" >
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModal2Label">Reason of Report Cancelation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/cancel')}}" method="POST">
                                                @csrf
                                                <input type="text" id="rep_id" name="rep_id" hidden>
                                                <textarea name="reason" id="reason" cols="100" rows="10" ></textarea>
                                            
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                </div>
            <!-- end of cancel-->     

            <!-- Modal add-->
                <div class="modal fade" id="addmodal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="padding:10px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Add Reports</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                                <form  action="{{ route('addReport') }}"method="POST">
                                    @csrf
                                            <!-- name -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="title" style="width:170px;">Name</span>
                                                </div>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                        
                                            </div>
                                            <br>
                                            <!-- title/short description -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="title" style="width:170px;">TItle</span>
                                                </div>
                                                <input type="text" name="title" id="title" class="form-control" required>
                                        
                                            </div>
                                            <br>
                                            <!-- priority level -->
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01" style="width:170px;">Priority level</label>
                                                </div>
                                                <select class="form-control" id="inputGroupSelect01"  name="pri_level" id="pri_level">
                                                    <option value="Outage">Outage</option>
                                                    <option value="Major Impact">Major Impact</option>
                                                    <option value="Minor Impact">Minor Impact</option>
                                                    <option value="Low Impact or Request">Low Impact or Request</option>
                                                </select>
                                            </div>
                                            <br>

                                            <!-- System -->
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01" style="width:170px;">System</label>
                                                </div>
                                                <select class="form-control" id="inputGroupSelect01" name="system" id="system">
                                                    <option value="Citrix">Citrix</option>
                                                    <option value="Data Center Server">Data Center Server</option>
                                                    <option value="eClipse">eClipse </option>
                                                    <option value="MITS Server">MITS Server </option>
                                                    <option value="Subic NAS">Subic NAS </option>
                                                    <option value="TSM Mobile">TSM Mobile </option>
                                                    <option value="TSM Office">TSM Office</option>
                                                </select>
                                            </div>

                                            <br>

                                            <!-- Personel -->
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01"style="width:170px;">Assigned Personel</label>
                                                </div>
                                                <select class="form-control" id="inputGroupSelect01" name="personel" id="personel">
                                                    <option value="Chris">Chris</option>
                                                    <option value="Jo Anne">Jo Anne</option>
                                                    <option value="Paul">Paul</option>
                                                    <option value="Valter">Valter</option>
                                                </select>
                                            </div>
                                            <br>
                                            
                                            <!-- long description -->
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><B>Description</B></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"   name="desc" id="desc" required></textarea>
                                            </div>
                                            <br>
                                            <!-- Comment -->
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><B>Comment</B></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="comment" id="comment"></textarea>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Report</button>
                                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            <!-- end modal -->

            
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>

<!-- date picker -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>



<script>
    
// get data from eloquent
 const _reports = {!! json_encode($data) !!};

// creating new table inside js because modal has its own table that make it difficult to arrange, cannot build a table inside a table T_T
// global variable
    var table = '';
    var close_option =   ' </tr>' ;
    var table_foot = ' </tbody>' +
                            '</table>';
    var table_th = '<table>'+
                            '<thead > '+
                               ' <tr>'+
                                   ' <th style="padding:5px;border:1px solid black;">Name</th>'+
                                   ' <th style="padding:5px;border:1px solid black;">Short description</th>'+
                                   ' <th style="padding:5px;border:1px solid black;">Priority Level</th>'+
                                    '<th style="padding:5px;border:1px solid black;">Peronel</th>'+
                                   ' <th style="padding:5px;border:1px solid black;">System</th>'+
                                    '<th style="padding:5px;border:1px solid black;">Long description</th>'+
                                    '<th style="padding:5px;border:1px solid black;">Comment</th>'+
                                    '<th style="padding:5px;border:1px solid black;">Date</th>'+
                                    '<th style="padding:5px;border:1px solid black;">Time(AU)</th>'+
                                    '<th style="padding:5px;border:1px solid black;">Action</th>'+
                                '</tr>'+
                             '</thead>' +
                            '<tbody>' ; 
        var option = '';
        var item = 0;
// getting report id for cancel modal
        function mods(id){

            $("#rep_id").val(id);

        }



// yesterday ticket


        $('#show').on('click', function () {

            var item =  $('#show').data('item');

            var x = document.getElementById("myDIV");
            
            if (x.style.display === "none") {
                x.style.display = "block";
                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

                            // table for yesterday 
                            var table_tr = '' ; 
                                
                            if(item == '' || item == undefined)
                            {
                                table_tr += '<tr>' + 
                                                '<td style="border:1px solid black;" colspan="10"> <h3 style="color:red;"><center> NO OLD TICKET </center> </h3> </td>' +
                                            '</tr>';     
                            }
                            
                            for(var i=0;i < _reports.length;i++ )
                            {

                                if(_reports[i].system == item){

                                    // date to see if data is from yesterday
                                      
                                        console.log(JSON.parse(today.getDate())) ;

                                        console.log( _reports[i].created_at.slice(8,10)) ;

                                        if( JSON.parse(JSON.parse(today.getDate()) > _reports[i].created_at.slice(8,10))   )
                                        {
                                          
                            
                                                if(_reports[i].status != 'Complete')
                                                {
                                                    table_tr += '<tr>' + 
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].name + '</td>' +
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].s_description + '</td>' +
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].pri_level + '</td>' +
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].ass_personel + '</td>' +
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].system + '</td>' +
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].l_description + '</td>' +
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].comment + '</td>' +                
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].created_at.slice(0,10) + '</td>' +  
                                                                '<td style="padding:5px;border:1px solid black;">' + _reports[i].created_at.slice(11,19) + '</td>' +
                                                                //   Resolve button 
                                                                '<td style="padding:5px;border:1px solid black;"> ' +
                                                                    '<form action="{{ route("/resolve_report")}}" method="POST">' +
                                                                        '@csrf' +
                                                                        '<input name="id" value="'+ _reports[i].id  +'" hidden>'+
                                                                        '<button type="submit" class="btn btn-success"  style="width:90px;margin:1px;">Resolve</button>' +
                                                                    '</form >' +
                                                                    // cancel button
                                                                        '<button class="btn btn-danger" style="width:90px;margin:1px;" data-toggle="modal" data-target="#myModal3" onclick="mods(' +_reports[i].id +')">Cancel</button> ' +
                                                                    // edit
                                                                    ' <form action="{{ route("edit_report")}}" method="POST">' +
                                                                            '@csrf' +
                                                                            '<input name="id" value="'+ _reports[i].id  +'" hidden>'+
                                                                            '<button type="submit" style="width:90px;margin:1px;" class="btn btn-primary" >edit</button>' +
                                                                    '</form >' +
                                                                '</td>' +

                                                            '</tr>';         
                                                }else{
                                                    


                                                    table_tr += '<tr>' + 
                                                                    '<td style="border:1px solid black;">' + _reports[i].name + '</td>' +
                                                                    '<td style="border:1px solid black;">' + _reports[i].s_description + '</td>' +
                                                                    '<td style="border:1px solid black;">' + _reports[i].pri_level + '</td>' +
                                                                    '<td style="border:1px solid black;">' + _reports[i].ass_personel + '</td>' +
                                                                    '<td style="border:1px solid black;">' + _reports[i].system + '</td>' +
                                                                    '<td style="border:1px solid black;">' + _reports[i].l_description + '</td>' +
                                                                    '<td style="border:1px solid black;">' + _reports[i].comment + '</td>' +                
                                                                    '<td style="border:1px solid black;">' + _reports[i].created_at.slice(0,10) + '</td>' +                
                                                                    '<td style="border:1px solid black;">' + _reports[i].created_at.slice(11,10) + '</td>' +
                                                                    '<td style="border:1px solid black;"> </td>' +
                                                                '</tr>';         
                                                        

                                                }
                                    
                                    }else{
                                        table_tr += '<tr>' + 
                                                '<td style="border:1px solid black;" colspan="10"> <h3 style="color:red;"><center> NO OLD TICKET </center> </h3> </td>' +
                                            '</tr>'; 
                                    }
                            }


                           

                    }
                    table = table_th + table_tr  + table_foot;

                    $("#hiddentableData").html(table);
                    table = '';
            } else {
                table = '';         
                x.style.display = "none";
            }
           
            
        });



// created a modal function in system

        // modal A 
        var ticket = 0;
        var ticket_res = 0;  
        var button_count = 0;

    $(".modala").click(function () {
        document.getElementById("myDIV").style.display = "none";

        var table_tr = '' ; 
        
        var item = $(this).attr('data-item');

       
        $('#show').data('item',item );

       
                                    

        for(var i=0;i < _reports.length;i++ )
        {
        
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            
                    // if(  )
             
                    if( JSON.parse(JSON.parse(today.getDate()) <= _reports[i].created_at.slice(8,10))   && _reports[i].system == item)
                    {
                       
                        ticket == 1;
                            if(_reports[i].status != 'Complete')
                            {
                                    
                                    
                                table_tr += '<tr>' + 
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].name + '</td>' +
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].s_description + '</td>' +
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].pri_level + '</td>' +
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].ass_personel + '</td>' +
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].system + '</td>' +
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].l_description + '</td>' +
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].comment + '</td>' +                
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].created_at.slice(0,10) + '</td>' +  
                                            '<td style="padding:5px;border:1px solid black;">' + _reports[i].created_at.slice(11,19) + '</td>' +
                                            //   Resolve button 
                                            '<td style="padding:5px;border:1px solid black;"> ' +
                                                '<form action="{{ route("/resolve_report")}}" method="POST">' +
                                                    '@csrf' +
                                                    '<input name="id" value="'+ _reports[i].id  +'" hidden>'+
                                                    '<button type="submit" class="btn btn-success"  style="width:90px;margin:1px;">Resolve</button>' +
                                                '</form >' +
                                                // cancel button
                                                    '<button class="btn btn-danger" style="width:90px;margin:1px;" data-toggle="modal" data-target="#myModal3" onclick="mods(' +_reports[i].id +')">Cancel</button> ' +
                                                // edit
                                                ' <form action="{{ route("edit_report")}}" method="POST">' +
                                                        '@csrf' +
                                                        '<input name="id" value="'+ _reports[i].id  +'" hidden>'+
                                                        '<button type="submit" style="width:90px;margin:1px;" class="btn btn-primary" >edit</button>' +
                                                '</form >' +
                                            '</td>' +

                                        '</tr>'
                                        ;         
                                }else{
                                    


                                    table_tr += '<tr>' + 
                                                '<td style="border:1px solid black;">' + _reports[i].name + '</td>' +
                                                '<td style="border:1px solid black;">' + _reports[i].s_description + '</td>' +
                                                '<td style="border:1px solid black;">' + _reports[i].pri_level + '</td>' +
                                                '<td style="border:1px solid black;">' + _reports[i].ass_personel + '</td>' +
                                                '<td style="border:1px solid black;">' + _reports[i].system + '</td>' +
                                                '<td style="border:1px solid black;">' + _reports[i].l_description + '</td>' +
                                                '<td style="border:1px solid black;">' + _reports[i].comment + '</td>' +                
                                                '<td style="border:1px solid black;">' + _reports[i].created_at.slice(0,10) + '</td>' +                
                                                '<td style="border:1px solid black;">' + _reports[i].created_at.slice(11,10) + '</td>' +
                                                '<td style="border:1px solid black;"> </td>' +
                                            '</tr>';         
                                        

                                }
                              
                                
                                ticket_res = 1;
                    }
                    // count the number of unfinised 
                    if( JSON.parse(JSON.parse(today.getDate()) > _reports[i].created_at.slice(8,10)) && _reports[i].system == item)
                    {
                        
                         button_count = button_count + 1;
                    }
                            

        }

        if(ticket_res == 0){

                if(ticket == 0){
                    table_tr += '<tr>' + 
                                '<td style="border:1px solid black;" colspan="10"> <h3 style="color:red;"><center> NO NEW TICKET TODAY</center> </h3> </td>' +
                            '</tr>';  
                    ticket_res = 1;
                    ticket = 1;  
                }
                ticket = 1;  
        }
        table = table_th + table_tr  + table_foot;

        $("#tableData").html(table);
        $("#notif").html(button_count);
        table = '';
        ticket = 0;
        ticket_res = 0;  
        button_count = 0;
   
    });


// history filtration and modal ===============================================000000000000000000000000000000000000000000000000===================================
// cancel modal
    function showCancel(id) {

    const canceled = {!! json_encode($cancel) !!};

    canceled.forEach((cancel) => {

        if(cancel['rep_id'] == id)
        {
            $("#reason").html(cancel['reason']);
            item = '';
        }
    });
    };

// ajax filter


    $('#search').on('click', function(){
      
      let data = {
                  from:$('#datepicker-from').val(),
                  to:$('#datepicker-to').val(),
                  status:$('#status').val(),
                  systems:$('#systems').val(),
                  personel:$('#personel').val()
      };

      var historystatus = '';
      var tablehistory_tr = '';
      $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "POST",
                  url: "/filter",
                  data:  data
              }).done(function(result,request,textStatus) {

                      var result = result.data;
                      for(var i=0;i < result.length;i++ )
                      {
                        item = item + 1;
                            if(result[i].status == 'Cancel'){
                                historystatus = '<a href="#"  id="modal1" onclick="showCancel('+ result[i].id + ')" data-toggle="modal" data-target="#myModal"> <p style="color:red;">Canceled</p> </a>' ;
                            }
                            else{
                                historystatus = ' <p style="color:green;">Complete</p>' ;
                            }

                            tablehistory_tr += '<tr>'+
                                                    '<td>' +  item  +'</td>' + 
                                                    '<td>' + result[i].s_description  +'</td>' + 
                                                   ' <td>' + result[i].name  +'</td>' + 
                                                   ' <td>' + result[i].system  +'</td>' + 
                                                   ' <td>' + result[i].ass_personel + '</td>' + 
                                                   ' <td>' + result[i].pri_level  +'</td>' + 
                                                   ' <td>' + result[i].comment + '</td>' + 
                                                    '<td>' + result[i].l_description  +'</td>' + 
                                                   ' <td>' + 
                                                        historystatus +
                                                    '</td>' +
                                                    ' <td>'+ result[i].created_at.slice(0,10) +  ' ' + result[i].created_at.slice(11,19) + '</td>' +
                                                     '<td>'+ result[i].updated_at.slice(0,10) + ' ' + result[i].updated_at.slice(11,19) +  '</td>' +
                                              '</tr>';
                           
                            
                          }
                     $("#history-table").html(tablehistory_tr);
         });
                     
  });


// date picker
    $(function() {

        // date from
        $('#datepicker-from').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(datetext) {
            var d = new Date(); // for now

            var h = d.getHours();
            h = (h < 10) ? ("0" + h) : h ;

            var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m ;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s ;

            datetext = datetext + " " + h + ":" + m + ":" + s;

            $('#datepicker-from').val(datetext);
        }
        });

        // date to
        $('#datepicker-to').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(datetext) {
            var d = new Date(); // for now

            var h = d.getHours();
            h = (h < 10) ? ("0" + h) : h ;

            var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m ;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s ;

            datetext = datetext + " " + h + ":" + m + ":" + s;

            $('#datepicker-to').val(datetext);
        }
        });

    });

// charts ============================================================================================================================================
  
      const month = {!! json_encode($month) !!};
      const count = {!! json_encode($count) !!};
      const data2 = {!! json_encode($data2) !!};

      var container_mon = '';
      var container_cou = 0;
      var container = 0;
      var month_arr = [];
      var count_arr = [];

      var Citrix = [];
      var DataCenterServer = [];
      var eClipse = [];
      var MITSServer = [];
      var SubicNAS = [];
      var TSMMobile = [];
      var TSMOffice = [];

        var cc =  0;
        var count1 = 0;
        var count2 = 0;
        var count3 = 0;
        var count4 = 0;
        var count5 = 0;
        var count6 = 0;
        var count7 = 0;
        
         // for chart month label   
        for (var i = 0; i< data2.length; i++) {
            
           
            // find duplicate month
                if (i == data2.length-1 || data2[i].created_at.slice(0,7) != data2[i+1].created_at.slice(0,7)) {
         
                    container_mon =  data2[i].created_at.slice(0,7);
                    month_arr.push(container_mon);
                   

            // for chart data 
                    if( data2[i].system == 'Citrix')
                    {
                        count1 =  count1 + 1;
                    }else if(data2[i].system == 'Data Center Server'){
                        count2 =  count2 + 1;

                    }else if(data2[i].system == 'eClipse'){
                        count3 =  count3 + 1;

                    }else if(data2[i].system == 'MITS Server'){
                        count4 =  count4 + 1;

                    }else if(data2[i].system == 'Subic NAS'){
                        count5 =  count5 + 1;

                    }else if(data2[i].system == 'TSM Mobile'){
                        count6 =  count6 + 1;

                    }else if(data2[i].system == 'TSM Office'){
                        count7 =  count7 + 1;

                    }else{

                    }

                    Citrix.push(count1);
                    DataCenterServer.push(count2);
                    eClipse.push(count3);
                    MITSServer.push(count4);
                    SubicNAS.push(count5);
                    TSMMobile.push(count6);
                    TSMOffice.push(count7);
                    count1 =  0;
                    count2 =  0;
                    count3 =  0;
                    count4 =  0;
                    count5 =  0;
                    count6 =  0;
                    count7 =  0;
                }else{

                    // add 1 if month is already exist in array
                 
                    if( data2[i].system == 'Citrix')
                    {
                        count1 =  count1 + 1;
                    }

                    else if( data2[i].system == 'Data Center Server')
                    {
                        count2 =  count2 + 1;
                    } else if( data2[i].system == 'eClipse')
                    {
                        count3 =  count3 + 1;
                    } else if( data2[i].system == 'MITS Server')
                    {
                        count4 =  count4 + 1;
                    } else if( data2[i].system == 'Subic NAS')
                    {
                        count5 =  count5 + 1;
                    } else if( data2[i].system == 'TSM Mobile')
                    {
                        count6 =  count6 + 1;
                    } else if( data2[i].system == 'TSM Office')
                    {
                        count7 =  count7 + 1;
                    }else{

                    }

                  }
            }  

 
              
            // _reports_arr.push(container_mon);
        
       
            

    const data = {
            labels: month_arr,
            datasets: [{
            label: 'No. of report',
            borderColor: 'rgb(36, 47, 155)',
            data: Citrix,
            }],
            datasets: [{
                        label: 'Citrix',
                        borderColor: 'rgb(246, 55, 236)',
                        data: Citrix,
            },{
                    label: 'Data Center Server',
                    borderColor: 'rgb(36, 47, 155)',
                    data: DataCenterServer,
            },{
                    label: 'eClipse',
                    borderColor: 'rgb(251, 180, 84)',
                    data: eClipse,
            },{
                    label: 'MITS Server',
                    borderColor: 'rgb(250, 234, 72)',
                    data: MITSServer,
            },{
                    label: 'Subic NAS',
                    borderColor: 'rgb(20, 195, 142)',
                    data: SubicNAS,
            },{
                    label: 'TSM Mobile',
                    borderColor: 'rgb(161, 73, 250)',
                    data: TSMMobile,
            },{
                    label: 'TSM Office',
                    borderColor: 'rgb(62, 199, 11)',
                    data: TSMOffice,
            }
            ],
            
        };
    
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
 </script>

</html>
                    