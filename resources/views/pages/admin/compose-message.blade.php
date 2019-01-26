<!DOCTYPE html>
<html>
  <head>
    <title>Send Campaign {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="{{ asset('images/favicon.ico') }}" />
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/snackbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/froala_editor.pkgd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/froala_style.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fine-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fine-uploader-gallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fine-uploader-new.min.css') }}">

    <link href="{{ asset('css/minoral.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="red-scheme">
        

        @include('includes.admin.nav')
        
        
        <!-- Page content -->
        <div id="content" class="col-md-12">
          



          <!-- submenu -->
          <div class="submenu">
            <h1>SEND CAMPAIGN</h1>
            <div class="collapsed">
              <a href="#" id="submenutoggle"><h1>Target Emails <i class="fa fa-bars"></i></h1></a>
              
            </div>
            
          <!-- /submenu -->


          
          




          <!-- content main container -->
          <div class="main">
            
            


            <!-- row -->
            <div class="row">




              <!-- col 6 -->
              <div class="col-md-12">
              

                
                <!-- tile -->
                <section class="tile">


                  <!-- tile header -->
                  <div class="tile-header">
                    <h1><strong>COMPOSE </strong> MESSAGE </h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">
                    <div class="row">
                      <div class="col-xs-10 col-xs-offset-2">@include('includes.messages')</div>
                    </div>
                    


                    <form action="{{ route('email.send') }}" enctype="multipart/form-data" method = "POST" class="compose-email-form form-horizontal">
                      {{ csrf_field() }}
                      
                      <div class="form-group">
                        <label for="profile_id" class="control-label col-xs-2">Profile</label>
                        <div class="col-xs-10">
                          <select name="profile_id" id="profile_id" class="form-control" required>
                            <?php $profiles = Auth::user()->profiles()->orderBy('name', 'asc')->get(); ?>
                            <option value="" selected>-- Select profile --</option>
                            @if(count($profiles))
                              @foreach($profiles as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                              @endforeach
                            @endif
                            
                          </select>  
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="to_id" class="control-label col-xs-2">Recepient(s)</label>
                        <div class="col-xs-10">
                          
                          <select multiple name="to_id[]" id="to_id" class="form-control chosen-select" required>
                            <?php $users = \App\Company::orderBy('name', 'asc')->get(); ?>
                            @if(count($users))
                              @foreach($users as $usr)
                                @if(count($usr->emails))
                                  <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                @endif
                                
                              @endforeach
                            @endif
                            
                          </select>  
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="email-subject" class="control-label col-xs-2">Subject</label>
                        <div class="col-xs-10">
                          <input type = "text" name="subject" id="email-subject" required class="form-control">  
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email-content" class="control-label col-xs-2">Message</label>
                        <div class="col-xs-10">
                          <textarea name="content" id="email-content" class="form-control"></textarea>  
                        </div>
                      </div>
                      
                      <!--
                      <div class="form-group">
                        <label for="attachments" class="control-label col-xs-2">Attachments</label>
                        <div class="col-xs-10">
                          <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                              Browse… <input multiple="" name = "attachments[]" type="file">
                            </span>
                          </span>
                        </div>
                      </div>
                      -->

                      <div class="form-group">
                        <div class="col-xs-10 col-xs-offset-2">
                          <button class = "btn btn-info" type = "submit">Send mail <i class="fa fa-envelope"></i></button>  
                        </div>
                        
                      </div>  

                    </form>
                    

                  </div>
                  <!-- /tile body -->
                

                  

               





                


                </section>
                <!-- /tile -->



              </div>
              <!-- /col 6 -->
             
              
            </div>
            <!-- /row -->



          </div>
          <!-- /content container -->






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

    <script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>

    <script src="{{ asset('js/plugins/chosen/chosen.jquery.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ asset('js/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

    <script src="{{ asset('js/minoral.min.js') }}"></script>

    <script src="{{ asset('js/snackbar.min.js') }}"></script>

    <script src="{{ asset('js/dnd.min.js') }}"></script>

    <script src="{{ asset('js/jquery.fine-uploader.min.js') }}"></script>

    <script src="{{ asset('js/froala_editor.pkgd.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

    <script>

    //initialize file upload button function
    $(document)
      .on('change', '.btn-file :file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(function(){
      
      //load wysiwyg editor
      $('#input06').summernote({
        height: 130   //set editable area's height
      });

      //chosen select input
      $(".chosen-select").chosen({disable_search_threshold: 10});

      //initialize datepicker
      $('#datepicker').datepicker({
        todayHighlight: true
      });

      //initialize colorpicker
      $('#colorpicker').colorpicker();

      //initialize colorpicker RGB
      $('#colorpicker-rgb').colorpicker({
        format: 'rgb'
      });

      //initialize file upload button
      $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
          input.val(log);
        } else {
          if( log ) alert(log);
        }
        
      });

    })
      
    </script>
  </body>
</html>