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
            <h1>SMTP</h1>
            <div class="collapsed">
              <a href="#" id="submenutoggle"><h1>Target Emails <i class="fa fa-bars"></i></h1></a>
              
            </div>
            
          <!-- /submenu -->


          
          




          <!-- content main container -->
          <div class="main">
            
            


            <!-- row -->
            <div class="row">




              <!-- col 6 -->
              <div class="col-md-6">
              

                
                <!-- tile -->
                <section class="tile">


                  <!-- tile header -->
                  <div class="tile-header">
                    <h1><strong>ADD </strong> SMTP PROFILE </h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">

                    @include('includes.messages')
                    
                    <form class="form-horizontal" method = "POST" action = "{{ route('profile.add') }}" enctype="multipart/form-data" role="form">
                      {{ csrf_field() }}
                      
                      <div class="form-group">
                        <label for="input0100" class="col-sm-4 control-label">Profile Name</label>
                        <div class="col-sm-8">
                          <input type="text" name = "name" value = "{{ old('name') }}" class="form-control" id="input0100" placeholder="profile name">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                          <br><p>Sender Info</p>   
                        </div>
                      </div>

                      
                      
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Sender Name</label>
                        <div class="col-sm-8">
                          <input type="text" name = "mail_from_name" value = "{{ old('mail_from_name') }}" class="form-control" id="input01" placeholder="From name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input02" class="col-sm-4 control-label">Sender Email</label>
                        <div class="col-sm-8">
                          <input type="text" name = "mail_from_email" value = "{{ old('mail_from_email') }}" class="form-control" id="input02" placeholder="from email address">
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                          <br><p>Server Settings</p>
                        </div>
                      </div>           
                      
                      <div class="form-group">
                        <label for="input03" class="col-sm-4 control-label">Email address / Username</label>
                        <div class="col-sm-8">
                          <input type="text" name = "mail_username" value = "{{ old('mail_username') }}" class="form-control" id="input03" placeholder="email address / username">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input04" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                          <input type="password" name = "mail_password" value = "{{ old('mail_password') }}" class="form-control" id="input04" placeholder="This is placeholder...">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input05" class="col-sm-4 control-label">Host</label>
                        <div class="col-sm-8">
                          <input type="text" name = "mail_host" value = "{{ old('mail_host') }}" class="form-control" id="input05" placeholder="mail host">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input065" class="col-sm-4 control-label">Port</label>
                        <div class="col-sm-8">
                          <input type="number" name = "mail_port" value = "{{ old('mail_port') }}" class="form-control" id="input065" placeholder="mail port">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input07" class="col-sm-4 control-label">Encryption Type</label>
                        <div class="col-sm-8">
                          <select name="mail_encryption" class = "form-control" id="input07">
                            <option value="tls"{{ old('mail_encryption') == 'tls' ? ' selected' : '' }}>TLS</option>
                            <option value="ssl"{{ old('mail_encryption') == 'ssl' ? ' selected' : '' }}>SSL</option>
                            <option value="none"{{ old('mail_encryption') == 'none' ? ' selected' : '' }}>None</option>
                          </select>
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
                  <!-- /tile body -->
                

                  

               





                


                </section>
                <!-- /tile -->



              </div>
              <!-- /col 6 -->

              <div class="col-md-6">
                <div class="tile">
                  <div class="tile-header">
                    <h1>MY PROFILES ({{ number_format(count($profiles)) }})</h1>
                  </div>
                  <div class="tile-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Profile</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>
                        @if(count($profiles))
                          @foreach($profiles as $profile)
                            <tr>
                              <td>{{ $profile->name }}</td>
                              <td><a href="" data-toggle = "modal" data-target = "#profileModal{{ $profile->id }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td>
                              <td>
                                <a href="{{ route('profile.delete',['id'=>$profile->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="profileModal{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="composeModal" aria-hidden="true">
                                      <div class="modal-dialog wide">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="">{{ $profile->name }}</h4>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-xs-10 col-xs-offset-1">
                                                <form class="form-horizontal" method = "POST" action = "{{ route('profile.update', ['id' => $profile->id]) }}" enctype="multipart/form-data" role="form">
                                                  {{ csrf_field() }}
                                                  
                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Profile Name</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" name = "name" value = "{{ $profile->name }}" class="form-control" placeholder="profile name">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label"></label>
                                                    <div class="col-sm-8">
                                                      <br><p>Sender Info</p>   
                                                    </div>
                                                  </div>

                                                  
                                                  
                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Sender Name</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" name = "mail_from_name" value = "{{ $profile->mail_from_name }}" class="form-control" placeholder="From name">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Sender Email</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" name = "mail_from_email" value = "{{ $profile->mail_from_email }}" class="form-control" id="input02" placeholder="from email address">
                                                    </div>
                                                  </div>
                                                  

                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label"></label>
                                                    <div class="col-sm-8">
                                                      <br><p>Server Settings</p>
                                                    </div>
                                                  </div>           
                                                  
                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Email address / Username</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" name = "mail_username" value = "{{ $profile->mail_username }}" class="form-control" placeholder="email address / username">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Password</label>
                                                    <div class="col-sm-8">
                                                      <input type="password" name = "mail_password" value = "{{ $profile->mail_password }}" class="form-control"  placeholder="mail password">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Host</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" name = "mail_host" value = "{{ $profile->mail_host }}" class="form-control" placeholder="mail host">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Port</label>
                                                    <div class="col-sm-8">
                                                      <input type="number" name = "mail_port" value = "{{ $profile->mail_port }}" class="form-control"  placeholder="mail port">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="col-sm-4 control-label">Encryption Type</label>
                                                    <div class="col-sm-8">
                                                      <select name="mail_encryption" class = "form-control" id="input07">
                                                        <option value="tls"{{ $profile->mail_encryption == 'tls' ? ' selected' : '' }}>TLS</option>
                                                        <option value="ssl"{{ $profile->mail_encryption == 'ssl' ? ' selected' : '' }}>SSL</option>
                                                        <option value="none"{{ is_null($profile->mail_encryption) ? ' selected' : '' }}>None</option>
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


                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
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