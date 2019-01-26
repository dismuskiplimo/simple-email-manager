<!DOCTYPE html>
<html>
  <head>
    <title>Tyrion - Users and Groups </title>
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
            <h1>USERS & GROUPS</h1>
            <div class="collapsed">
              <a href="#" id="submenutoggle"><h1>Target Emails <i class="fa fa-bars"></i></h1></a>
              
            </div>
            
          <!-- /submenu -->


          
          




          <!-- content main container -->
          <div class="main">
            
            


            <!-- row -->
            <div class="row">




              <!-- col 6 -->
              <div class="col-md-5">
              

                
                <!-- tile -->
                <section class="tile">


                  <!-- tile header -->
                  <div class="tile-header">
                    <h1><strong>ADD </strong> USER / GROUP </h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">
                    @include('includes.messages')
                    
                    <form enctype="multipart/form-data" class="form-horizontal" action = "{{ route('user.add') }}" method = "POST" role="form">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="input07" class="col-sm-4 control-label">Select Industry</label>
                        <div class="col-sm-8">
                          <select class="chosen-select form-control" name = "industry" id="input07">
                            <option{{ old('industry') == 'Insurance Companies' ? ' selecetd' : '' }}>Insurance Companies</option>
                            <option{{ old('industry') == 'IT Companies' ? ' selecetd' : '' }}>IT Companies</option>
                            <option{{ old('industry') == 'Government Agencies' ? ' selecetd' : '' }}>Government Agencies</option>
                            <option{{ old('industry') == 'Health institutions' ? ' selecetd' : '' }}>Health institutions</option>
                            <option{{ old('industry') == 'Educational Institutions' ? ' selecetd' : '' }}>Educational Institutions</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Name of Company </label>
                        <div class="col-sm-8">
                          <input type="text" name = "name" value = "{{ old('name') }}" class="form-control" id="input01">
                        </div>
                      </div>


                      

                      

                      <div class="form-group">
                        <label for="input04" class="col-sm-4 control-label">Add Emails</label>
                        <div class="col-sm-8">
                          <input type="text" name = "emails" value = "{{ old('emails') }}" class="form-control" id="input04" placeholder="This is placeholder...">

                          <span class="help-block">Use a comma to separate email addresses</span>
                        </div>
                      </div>

                    <div class="form-group">
                        <label for="colorpicker-rgb" class="col-sm-4 control-label">Email List Upload field</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                          <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                              Browse… <input name = "file" type="file" id = "colorpicker-rgb"  accept=".csv">
                            </span>
                          </span>
                          <input type="text" class="form-control" readonly="">
                        </div>

                        <span class="help-block">Strictly csv file</span>
                        </div>
                    </div>

                    <div class="form-group">
                      @include('includes.admin.fineupload-template')
                     

                    </div>


                      
                      <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>

                    </form>

                  </div>
                  <!-- /tile body -->
                

                  

               





                


                </section>
                <!-- /tile -->



              </div>
              <!-- /col 6 -->


              <div class="col-md-7">
                <div class="tile">
                  <div class="tile-header">
                    <h1><strong>REGISTERED</strong> USERS / GROUPS ({{ number_format(count($users)) }})</h1>
                  </div>
                  <div class="tile-body">
                    @if(count($users))
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Industry</th>
                            <th>Registered</th>
                            <th>Related emails</th>
                            <th></th>
                          </tr>
                          
                        </thead>

                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->industry }}</td>
                              <td>{{ $user->created_at->format('Y') }}</td>
                              <td>{{ count($user->emails) }}</td>
                              <th><a href="{{ route('user.view',['id'=>$user->id]) }}" title = "View {{ $user->name }}" class="pull-right"> <i class="fa fa-eye text-info"></i> </a></th>
                            </tr>
                          @endforeach
                        </tbody>

                      </table>

                    @endif
                  </div>
                </div>
              </div>
        









               
              
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