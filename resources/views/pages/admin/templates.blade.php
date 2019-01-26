<!DOCTYPE html>
<html>
  <head>
    <title>Templates {{ config('app.name') }}</title>
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
            <h1>TEMPLATES</h1>
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
                    <h1><strong>ADD </strong> TEMPLATE </h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">

                    @include('includes.messages')
                    
                    <form class="form-horizontal" method = "POST" action = "{{ route('template.add') }}" enctype="multipart/form-data" role="form">
                      {{ csrf_field() }}
                      

                      <div class="form-group">
                        <label for="input04" class="col-sm-4 control-label">Name of Document</label>
                        <div class="col-sm-8">
                          <input type="text" name = "name" value = "{{ old('name') }}" class="form-control" id="input04" placeholder="This is placeholder...">
                        </div>
                      </div>

                    <div class="form-group">
                        <label for="colorpicker-rgb" class="col-sm-4 control-label">Template Document Upload</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                          <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                              Browse… <input name = "file" type="file">
                            </span>
                          </span>
                          <input type="text" class="form-control" readonly="">
                        </div>
                        </div>
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
                    <h1><strong>MY</strong> TEMPLATES ({{ number_format(count($templates)) }})</h1>
                  </div>
                  
                  <div class="tile-body">
                    <div class="row">
                      @if(count($templates))
                        @foreach($templates as $template)
                          <div class="col-sm-4" style = "margin-bottom:10px">
                            <div class="thick-border">
                              <span class="delete-button" title = "Delete {{ $template->name }}"> <a href="{{ route('template.delete', ['id'=> $template->id]) }}"><i class="fa fa-close"></i></span></a>
                              <h5>{{ $template->filetype }}</h5>
                              <a href="{{ route('template.download', ['id' => $template->id]) }}" title = "Download {{ $template->name }}"><span>{{ \Illuminate\Support\Str::words($template->name,1) }}</span> <i class="fa fa-download"></i></a>
                              <h6><small>{{ calculateSize($template->filesize) }}</small></h6>
                            </div>
                            
                            
                          </div>
                        @endforeach
                      @endif
                    </div>
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