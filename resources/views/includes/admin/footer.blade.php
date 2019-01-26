    </div>
    <!-- Wrap all page content end -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script src="js/plugins/jquery.nicescroll.min.js"></script>
    <script src="js/plugins/blockui/jquery.blockUI.js"></script>

    <script src="js/plugins/summernote/summernote.min.js"></script>

    <script src="js/plugins/chosen/chosen.jquery.min.js"></script>

    <script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>

    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <script src="js/minoral.min.js"></script>

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