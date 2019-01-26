<!-- Modal -->
<div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-labelledby="composeModal" aria-hidden="true">
  <div class="modal-dialog wide">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="cardCode01">COMPOSE EMAIL</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-10 col-xs-offset-1">
            <form action="{{ route('email.send') }}" enctype="multipart/form-data" method = "POST" class="compose-email-form form-horizontal">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label for="profile_id" class="control-label col-xs-2">Profile</label>
                <div class="col-xs-10">
                  <select name="profile_id" id="profile_id" class="form-control" required>
                    <?php $profiles = \App\Profile::orderBy('name', 'asc')->get(); ?>
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
                  
                  <select multiple style = "width:200px" name="to_id" id="to_id" class="form-control chosen-select" required>
                    <?php $users = \App\Company::orderBy('name', 'asc')->get(); ?>
                    <option value="" selected>-- Select recepient --</option>
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
                  <textarea name="content" id="email-content" rows = "10" class="form-control"></textarea>  
                </div>
              </div>

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

              <div class="form-group">
                <div class="col-xs-10 col-xs-offset-2">
                  <button class = "btn btn-info" type = "submit">Send mail <i class="fa fa-envelope"></i></button>  
                </div>
                
              </div>  

            </form>
          </div>  
        </div>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->