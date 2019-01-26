<!DOCTYPE html>
<html>
  <head>
    <title>Tyrion - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="{{ asset('images/favicon.ico') }}" />
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/snackbar.min.css') }}">

    <link href="{{ asset('css/minoral.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="brownish-scheme">

    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">

      


      <!-- Make page fluid -->
      <div class="row">         
        




        
        <!-- Page content -->
        <div id="content" class="col-md-12 full-page login">


          <div class="welcome">
            <img src="{{ asset('images/logo-big.png') }}" alt class="logo">
            <h1><strong>Welcome</strong> to Tyrion</h1>
            <h5>Covert Administration Tool</h5>

            <form id="form-signin" method = "POST" action = "{{ route('login') }}" class="form-signin">
              {{ csrf_field() }}

              @include('includes.messages')
              <section>
                <div class="input-group">
                  <input type="text" class="form-control" name="email" placeholder="Email">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <div class="input-group-addon"><i class="fa fa-key"></i></div>
                </div>

                

                <section class="new-acc">
                  <div class="checkbox check-transparent">
                    <input type="checkbox" id="remember" checked>
                    <label for="remember">Remember me</label>
                  </div>
                  <button type="submit" class="btn btn-greensea">   Login </button>
                  <br>
                  <a href = "{{ route('register') }}" class="btn btn-info">   Register </a>
                </section> 

                



                
              </section> 

               <!-- <section class="controls">
                
              </section> -->
            
                 
            </form>

           

          </div>

        </div>
        <!-- Page content end -->






      </div>
      <!-- Make page fluid-->




    </div>
    <!-- Wrap all page content end -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script src="{{ asset('js/plugins/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/plugins/blockui/jquery.blockUI.js') }}"></script>


    <script src="{{ asset('js/minoral.min.js') }}"></script>
    <script src="{{ asset('js/snackbar.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
    $(function(){
      
      $('.welcome').addClass('animated bounceIn');

    })
      
    </script>
  </body>
</html>