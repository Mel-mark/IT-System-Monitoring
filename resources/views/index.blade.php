<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      
        <title>IT System Monitoring</title>
  
       <!-- bootstrap 5 -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

       <!-- font awesome cdn link  -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
       <!-- hard code -->
       <link rel="stylesheet" href="{{ URL::asset('asset/css/front-page.css') }}">

             
    </head>
    <body style="background-image:url({{url('asset/image/DunbraeBG.jpg')}})">
    
              
       <div class="glasscontainer">
              <div class="container">  
                     <center><h1>IT MONITORING SYSTEM</h1></center>
                            <div class="wrapper">
                                   <div class="title"><span>Login</span></div>
                                   <center>
                                   @if(Session::has('failed'))
                                          <script>
                                                 alert('Email or password not match');
                                          </script>
                                   @endif
                                   
                                   </center>
                                   <form action="{{url('admin_login')}}" method="post">
                                          {{ csrf_field() }}
                                          <div class="input-group mb-3">
                                                 <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                                                 <div class="input-group-append">
                                                        <div class="input-group-text">
                                                               <i class="fas fa-user" style="font-size:25px;"></i>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="input-group mb-3">
                                                 <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                                 <div class="input-group-append">
                                                        <div class="input-group-text">
                                                               <span class="fas fa-lock"  style="font-size:25px;"></span>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="row">
                                                 <div>
                                                        <button type="submit"  class="btn btn-primary btn-block" style="float: left;">Log in</button>
                                                        <a href="{{url('guest')}}" type="button" class="btn btn-primary btn-block" style="float:right;"> Log in as guest </a>
                                                 </div>
                                          </div>
                                   </form>

              </div>
       </div>   
     </body>
</html>
