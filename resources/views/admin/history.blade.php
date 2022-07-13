<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSyMo</title>
    
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- css hardcode -->
    <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}">
</head>
<body>


<div class="container">
    
<header >
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
                <div class="collapse navbar-collapse"   >
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Tools
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a  class="dropdown-item" href="{{ url('/admin')}} "> Dashboard</a> <br>
                            <a class="dropdown-item" href="{{ url('/logout')}} "> Log out </a>
                        </div>
                    </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>
	<br>
	<br>
	<br>
    <div class="container">
            <div>
                <h1>History</h1>
                
                <div class="filtration">
                    <form action="{{ url('/Filter')}} " method="POST">
                        @csrf
                        From:
                        <input name="from" id="datepicker-from" placeholder="Default Date" autocomplete="off">
                        To:
                        <input name="to" id="datepicker-to" placeholder="Default Date" autocomplete="off">
                        Status:
                        <select name="status" id="status">
                            <option value="All">All</option>
                            <option value="Cancel">Cancel</option>
                            <option value="Complete">Complete</option>
                        </select>
                        Personel
                        <select name="personel" id="personel">
                            <option value="All">All</option>
                            <option value="Chris">Chris</option>
                            <option value="Jo Anne">Jo Anne</option>
                            <option value="Paul">Paul</option>
                            <option value="Valter">Valter</option>
                        </select>
                            <button >Reset</button>
                            <button >Seacrh</button>
                            <img src="{{ asset('asset/image/search.png') }}" class="search"> 
                    </form>
                </div>
            </div>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>system</th>
                        <th>Personel</th>
                        <th>Level</th>
                        <th>Comment</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date report</th>
                        <th>Last update</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        {{$i = 0;}}
                    @endphp
                    @foreach($data as $report)
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
                {!! $data->links() !!}
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

</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- date picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
  
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>

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
    
</script>
</html>