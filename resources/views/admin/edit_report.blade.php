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
        <br>
        <br>
        <br>
         <div class="container"> 
            <div class="container-edit">
                <br>
                <center>
                    <h2>Edit Data</h2>
                </center><hr>
                <br>
                
                <br>
        
                <form  action="{{ route('update_report') }}"method="POST">
                            @csrf
                                    <!-- name -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="title" style="width:170px;">Name</span>
                                        </div>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$reports->name}} " readonly>
                                        <input type="text" name="id" id="id" class="form-control" value="{{$reports->id}} " hidden>
                                
                                    </div>
                                    <br>
                                    <!-- title/short description -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="title" style="width:170px;">Short Description</span>
                                        </div>
                                        <input type="text" name="title" id="title" class="form-control" value="{{$reports->s_description}} " readonly>
                                    </div>
                                    <br>
                                    <!-- priority level -->
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="width:170px;">Priority level</label>
                                        </div>
                                        <input class="form-control"  name="pri_level" id="pri_level"  value=" {{$reports->pri_level}}" readonly>
                                        
                                    </div>
                                    <br>

                                    <!-- System -->
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="width:170px;">System</label>
                                        </div>
                                        <input class="form-control" id="inputGroupSelect01"  value="{{$reports->system}} " name="system" id="system" readonly>
                                           
                                    </div>

                                    <br>

                                    <!-- Personel -->
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" style="width:170px;">Assigned Personel</label>
                                        </div>
                                        <input class="form-control" value="{{$reports->ass_personel}} " name="personel" id="personel" readonly>
                                          
                                    </div>
                                    <br>
                                    	
	
                                    <!-- long description -->
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"><B>Description</B></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="desc" id="desc" readonly>{{$reports->l_description}} </textarea>
                                    </div>
                                    <br>

                                    <!-- Comment -->
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"><B>Comment</B></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" id="comment">{{$reports->comment}} </textarea>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                       

                                        <button type="submit" class="btn btn-success">Save Change</button>
                                        </form>
                                        <a href="{{ url('/admin')}} "style="float:right;"><input type="button" class="btn btn-danger" value="Cancel">   </a>
                                    </div>
         
                   
                </div>
            </div>  
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
