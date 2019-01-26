<!DOCTYPE html>
<html>
  <head>
    <title>Profiles {{ config('app.name') }}</title>
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
            <h1>VIEW USER / GROUP</h1>
            <div class="collapsed">
              <a href="#" id="submenutoggle"><h1>Target Emails <i class="fa fa-bars"></i></h1></a>
              
            </div>
            
          <!-- /submenu -->


          
          




          <!-- content main container -->
          <div class="main">
            
            


            <!-- row -->
            <div class="row">




              <!-- col 6 -->
              <div class="col-md-8">
                @include('includes.messages')

                
                <!-- tile -->
                <section class="tile">


                  <!-- tile header -->
                  <div class="tile-header">
                    <h1><strong>{{ $user->name }} </strong> ({{ number_format(count($user->emails)) }}) email addresses <a href="" data-toggle="modal" data-target="#addEmailModall" class="btn btn-info">ADD EMAIL ADDRESS</a> 
                    <a href="" data-toggle="modal" data-target="#addCSVModall" class="btn btn-info">IMPORT CSV</a>
                    </h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>email address</th>
                          <th>added</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>
                        @if(count($user->emails))
                          @foreach($user->emails as $email)
                            <tr>
                              <td>{{ $email->email_address }}</td>
                              <td>{{ $email->created_at->format('D m Y') }}</td>
                              <td><a href="" data-toggle="modal" data-target="#emailModall{{ $email->id }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a></td>
                              <td>
                                <a href="{{ route('email.delete',['id'=>$email->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                    

                  </div>
                  <!-- /tile body -->
                

                  

               





                


                </section>
                <!-- /tile -->



              </div>
              <!-- /col 6 -->

              <div class="col-md-4">
                <div class="tile">
                  <div class="tile-header">
                    <h1>EDIT USER / GROUP</h1>
                  </div>
                  <div class="tile-body text-center">
                    
                    <h4>{{ $user->name }} <br></h4>
                    <h4>{{ $user->industry }} <br></h4>

                    <p><a href="#" data-toggle="modal" data-target="#updateCompanyModal" class="btn btn-info">EDIT COMPANY <i class="fa fa-edit"></i></a> <br></p>
                    <p><a href="{{ route('user.delete', ['id'=>$user->id]) }}" class="btn btn-danger">DELETE COMPANY <i class="fa fa-trash"></i></a> <br></p>
                    
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

    @include('includes.admin.compose-email')


    @if(count($user->emails))
          @foreach($user->emails as $email)
              <!-- Modal -->
              <div class="modal fade" id="emailModall{{ $email->id }}" tabindex="-1" role="dialog" aria-labelledby="composeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id=""><strong>EDIT</strong> {{ $email->email_address }}</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                          <form class="form-horizontal" method = "POST" action = "{{ route('email.edit',['id'=>$email->id]) }}" enctype="multipart/form-data" role="form">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Email</label>
                              <div class="col-sm-8">
                                <input type="email" name = "email_address" value = "{{ $email->email_address }}" class="form-control" placeholder="email address">
                              </div>
                            </div>

                            <div class="form-group form-footer">
                              <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                            </div>

                          </form>
                        </div>  
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          @endforeach
        @endif

        <!-- Modal -->
              <div class="modal fade" id="addEmailModall" tabindex="-1" role="dialog" aria-labelledby="composeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="">ADD EMAIL ADDRESS</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                          <form class="form-horizontal" method = "POST" action = "{{ route('email.add',['id'=>$user->id]) }}" enctype="multipart/form-data" role="form">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Email</label>
                              <div class="col-sm-8">
                                <input type="email" name = "email_address" class="form-control" placeholder="email address">
                                
                              </div>
                            </div>

                            
                        </div>

                            <div class="form-group form-footer">
                              <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                            </div>

                          </form>
                        </div>  
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->


              <!-- Modal -->
              <div class="modal fade" id="addCSVModall" tabindex="-1" role="dialog" aria-labelledby="composeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="">ADD CSV FILE</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                          <form class="form-horizontal" method = "POST" action = "{{ route('user.csv.add',['id'=>$user->id]) }}" enctype="multipart/form-data" role="form">
                            {{ csrf_field() }}
                            

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

                            <div class="form-group form-footer">
                              <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Import</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                            </div>

                          </form>
                        </div>  
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              <!-- Modal -->
              <div class="modal fade" id="updateCompanyModal" tabindex="-1" role="dialog" aria-labelledby="composeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="">UPDATE USER / GROUP</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                          <form class="form-horizontal" method = "POST" action = "{{ route('user.update',['id'=>$user->id]) }}" enctype="multipart/form-data" role="form">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Company Name</label>
                              <div class="col-sm-8">
                                <input type="text" name = "name" value = "{{ $user->name }}" class="form-control" placeholder="name">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="" class="col-sm-4 control-label">Select Industry</label>
                              <div class="col-sm-8">
                                <select class="form-control" name = "industry" id="">
                                  <option{{ $user->industry == 'Insurance Companies' ? ' selecetd' : '' }}>Insurance Companies</option>
                                  <option{{ $user->industry == 'IT Companies' ? ' selecetd' : '' }}>IT Companies</option>
                                  <option{{ $user->industry == 'Government Agencies' ? ' selecetd' : '' }}>Government Agencies</option>
                                  <option{{ $user->industry == 'Health institutions' ? ' selecetd' : '' }}>Health institutions</option>
                                  <option{{ $user->industry == 'Educational Institutions' ? ' selecetd' : '' }}>Educational Institutions</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group form-footer">
                              <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                            </div>

                          </form>
                        </div>  
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

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