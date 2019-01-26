<!DOCTYPE html>
<html>
  <head>
    <title>Tyrion - Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="{{ asset('images/favicon.ico') }}" />
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rickshaw.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/tabdrop/css/tabdrop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/minoral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/snackbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fine-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fine-uploader-gallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fine-uploader-new.min.css') }}">

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
            <h1>Dashboard</h1>
            <div class="collapsed">
              <a href="#"><h1>Dashboard <i class="fa fa-bars"></i></h1></a>
            </div>
            
          </div>
          <!-- /submenu -->

          <!-- content main container -->
          <div class="main">
            <div class="row">
              <div class="col-lg-12">
                @include('includes.messages')
              </div>
            </div>

            <!-- cards -->

            <div class="row cards">
              
              <div class="card-container col-lg-3 col-md-6 col-sm-12">
                <div class="card card-red hover">
                  <div class="front">        
                    <h1>Users</h1>
                    <p id="users-count">0</p>
                    <span class="fa-stack fa-2x pull-right">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-user fa-stack-1x"></i>
                      <span class="easypiechart" data-percent="100" data-line-width="4" data-size="80" data-line-cap="butt" data-animate="2000" data-target="#users-count" data-update="3000" data-bar-color="white" data-scale-color="false" data-track-color="rgba(0, 0, 0, 0.15)"></span>
                    </span>
                  </div>
                  <div class="back">
                    <ul class="inline divided">
                      <li>
                        <h1>Total Users</h1>
                        <p>3541</p>
                      </li>
                      <li>
                        <h1>Last Month</h1>
                        <p>698</p>
                      </li>
                    </ul>
                    
                  </div>
                </div>
              </div>

              <div class="card-container col-lg-3 col-md-6 col-sm-12">
                <div class="card card-cyan hover">
                  <div class="front">        
                    <h1>Email Addresses</h1>
                    <p id="orders-count">0</p>
                    <span class="fa-stack fa-2x pull-right">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-envelope fa-stack-1x"></i>
                      <span class="easypiechart" data-percent="55" data-line-width="4" data-size="80" data-line-cap="butt" data-animate="2000" data-target="#orders-count" data-update="3000" data-bar-color="white" data-scale-color="false" data-track-color="rgba(0, 0, 0, 0.15)"></span>
                    </span>
                  </div>
                  <div class="back">
                    <ul class="inline divided">
                      <li>
                        <h1>Registered Today</h1>
                        <p>842</p>
                      </li>
                      <li>
                        <h1>Last Month</h1>
                        <p>151</p>
                      </li>
                    </ul>
                    
                  </div>
                </div>
              </div>

              <div class="card-container col-lg-3 col-md-6 col-sm-12">
                <div class="card card-green hover">
                  <div class="front">        
                    <h1>Emails Sent</h1>
                    <p id="sales-count">0</p>
                    <span class="fa-stack fa-2x pull-right">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-send fa-stack-1x"></i>
                      <span class="easypiechart" data-percent="30" data-line-width="4" data-size="80" data-line-cap="butt" data-animate="2000" data-target="#sales-count" data-update="3000" data-bar-color="white" data-scale-color="false" data-track-color="rgba(0, 0, 0, 0.15)"></span>
                    </span>
                  </div>
                  <div class="back">
                    <ul class="inline divided">
                      <li>
                        <h1>Sent Today</h1>
                        <p>25,165</p>
                      </li>
                      <li>
                        <h1>Last Month</h1>
                        <p>3,154</p>
                      </li>
                    </ul>
                    
                  </div>
                </div>
              </div>


              <div class="card-container col-lg-3 col-md-6 col-sm-12">
                <div class="card card-orange hover">
                  <div class="front">        
                    <h1>Templates</h1>
                    <p id="visits-count">0</p>
                    <span class="fa-stack fa-2x pull-right">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-list fa-stack-1x"></i>
                      <span class="easypiechart" data-percent="90" data-line-width="4" data-size="80" data-line-cap="butt" data-animate="2000" data-target="#visits-count" data-update="3000" data-bar-color="white" data-scale-color="false" data-track-color="rgba(0, 0, 0, 0.15)"></span>
                    </span>
                  </div>
                  <div class="back">
                    <ul class="inline divided">
                      <li>
                        <h1>Templates Today</h1>
                        <p>48,694</p>
                      </li>
                      <li>
                        <h1>Last Month</h1>
                        <p>9,514</p>
                      </li>
                    </ul>
                    
                  </div>
                </div>
              </div>

            </div>
            <!-- /cards -->

            <!-- row -->
            <div class="row">

              <!-- col 8 -->
              <div class="col-lg-8 col-md-12">

                <!-- tile -->
                <section class="tile cornered">




                  <!-- tile header -->
                  <div class="tile-header color greensea">
                    <h1 class="big-thin">Statistics</h1>
                    <div class="controls">
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->


                  <!-- tile widget -->
                  <div class="tile-widget color greensea">
                    <div id="statistics-chart" class="chart statistics" style="height: 250px;"></div>
                  </div>
                  <!-- /tile widget -->


                  <!-- tile body -->
                  <div class="tile-body">
                    <div class="row">
                      <ul class="inline">
                        <li class="col-md-8 col-sm-12 col-xs-12 text-center">
                          <h5 class="underline text-left">Actual Statistics</h5>
                          
                          <div class="inner-container inline">
                            <div data-percent="100" data-size="140" class="pie-chart inline" data-scale-color="false" data-track-color="#ffffff" data-bar-color="#a2d200" data-line-width="5">
                              <div class="text-center">
                                <i class="fa fa-usd fa-5x green-text"></i>
                              </div>
                            </div>
                            <p class="chart-overall text-center medium-thin uppercase nomargin"><span class="green-text big-thin animate-number" data-value="6175" data-animation-duration="2500">0</span> Sales</p>
                            <p class="chart-overall text-center little-thin uppercase"><span class="green-text">18% <i class="fa fa-arrow-up "></i></span> this month</p>
                          </div>


                          <div class="inner-container inline">
                            <div data-percent="85" data-size="140" class="pie-chart inline" data-scale-color="false" data-track-color="#ffffff" data-bar-color="#ffc100" data-line-width="5">
                              <div class="text-center">
                                <span><i class="fa fa-eye fa-5x orange-text"></i></span>
                              </div>
                            </div>
                            <p class="chart-overall text-center medium-thin uppercase nomargin"><span class="orange-text big-thin animate-number" data-value="8213" data-animation-duration="2500">0</span> Visits</p>
                            <p class="chart-overall text-center little-thin uppercase"><span class="red-text">2% <i class="fa fa-arrow-down"></i></span> this month</p>
                          </div>

                        </li>
                        <li class="col-md-4 col-sm-12 col-xs-12">
                          <h5 class="underline">Visitors Statistics</h5>
                          <ul class="progress-list">
                            <li>
                              <div class="details">
                                <div class="title">America</div>
                                <div class="description">Visitors from America</div>
                              </div>
                              <div class="status pull-right">
                                <span class="animate-number" data-value="40" data-animation-duration="1500">0</span>%
                              </div>
                              <div class="clearfix"></div>
                              <div class="progress progress-little no-radius">
                                <div class="progress-bar progress-bar-green animate-progress-bar" data-percentage="40%" style="width: 0%;"></div>
                              </div>
                            </li>
                            <li>
                              <div class="details">
                                <div class="title">Europe</div>
                                <div class="description">Visitors from Europe</div>
                              </div>
                              <div class="status pull-right">
                                 <span class="animate-number" data-value="38" data-animation-duration="1000">0</span>%
                              </div>
                              <div class="clearfix"></div>
                              <div class="progress progress-little no-radius">
                                <div class="progress-bar progress-bar-cyan animate-progress-bar" data-percentage="35%" style="width: 0%;"></div>
                              </div>
                            </li>
                            <li>
                              <div class="details">
                                <div class="title">Asia</div>
                                <div class="description">Visitors from Asia</div>
                              </div>
                              <div class="status pull-right">
                                <span class="animate-number" data-value="12" data-animation-duration="800">0</span>%
                              </div>
                              <div class="clearfix"></div>
                              <div class="progress progress-little no-radius">
                                <div class="progress-bar progress-bar-amethyst animate-progress-bar" data-percentage="12%" style="width: 0%;"></div>
                              </div>
                            </li>
                            <li>
                              <div class="details">
                                <div class="title">Africa</div>
                                <div class="description">Visitors from Africa</div>
                              </div>
                              <div class="status pull-right">
                                <span class="animate-number" data-value="7" data-animation-duration="600">0</span>%
                              </div>
                              <div class="clearfix"></div>
                              <div class="progress progress-little no-radius">
                                <div class="progress-bar progress-bar-orange animate-progress-bar" data-percentage="7%" style="width: 0%;"></div>
                              </div>
                            </li>
                            <li>
                              <div class="details">
                                <div class="title">Other</div>
                              </div>
                              <div class="status pull-right">
                                <span class="animate-number" data-value="6" data-animation-duration="400">0</span>%
                              </div>
                              <div class="clearfix"></div>
                              <div class="progress progress-little no-radius">
                                <div class="progress-bar progress-bar-red animate-progress-bar" data-percentage="6%" style="width: 0%;"></div>
                              </div>
                            </li>       
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /tile body -->


                  <!-- show code btn -->
                  <button class="btn show-code" data-toggle="modal" data-target="#codeModal05">
                    show code
                  </button>
                  <!-- /show code btn -->



                  <!-- Modal -->
                  


                </section>
                <!-- /tile -->


                <!-- tile -->
               

              </div>
              <!-- /col 8-->

              


              <!-- col 4 -->
              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                



                <!-- tile -->
                <section class="tile color grey">




                  <!-- tile header -->
                  <div class="tile-header">
                    <h1 class="big-thin">Server Load</h1>
                    <div class="controls">
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->

                  <!-- tile widget -->
                  <div class="tile-widget">
                    <h2><span class="animate-number" data-value="394" data-animation-duration="1600">0</span> GB</h2>
                    <div class="progress progress-little no-radius nomargin">
                      <div class="progress-bar progress-bar-dutch animate-progress-bar" data-percentage="39%" style="width: 0%;"></div>
                    </div>
                    <p class="description"><strong class="white-text">394GB</strong> used of <strong class="white-text">2,048GB</strong> on File Server</p>
                  </div>
                  <!-- /tile widget -->


                  <!-- tile body -->
                  <div class="tile-body paddingtop">
                    <div id="serverload-chart"></div>
                  </div>
                  <!-- /tile body -->

                </section>
                <!-- /tile -->



                <!-- tile -->
                <section class="tile color drank">




                  <!-- tile header -->
                  <div class="tile-header">
                    <h1 class="small-uppercase">Weather</h1>
                    <div class="controls">
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body nopadding">
                    <div class="row">
                      <ul class="inline divided skycons">
                        <li class="col-xs-6">
                          <h3 class="text-center small-thin uppercase">Today</h3>
                          <div class="text-center">
                            <canvas id="clear-day" width="100" height="100"></canvas>
                          </div>
                          <p class="text-center large-thin"><span class="animate-number" data-value="26" data-animation-duration="800">0</span>°C</p>
                        </li>
                        <li class="col-xs-6">
                          <h3 class="text-center small-thin uppercase">Tomorrow</h3>
                          <div class="text-center">
                            <canvas id="partly-cloudy-day" width="100" height="100"></canvas>
                          </div>
                          <p class="text-center large-thin"><span class="animate-number" data-value="22" data-animation-duration="1000">0</span>°C</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /tile body -->



                  <!-- tile footer -->
                  <div class="tile-footer nopadding">
                    <div class="row">
                      <ul class="inline divided">
                        <li class="col-xs-4">
                          <h3 class="text-center little-regular bottommargin">Wind</h3>
                          <div class="text-center">
                            <canvas id="wind" width="36" height="36"></canvas>
                          </div>
                          <p class="text-center little-regular"><span class="animate-number" data-value="10" data-animation-duration="800">0</span> mph</p>
                        </li>
                        <li class="col-xs-4">
                          <h3 class="text-center little-regular bottommargin">Humidity</h3>
                          <div class="text-center">
                            <canvas id="rain" width="36" height="36"></canvas>
                          </div>
                          <p class="text-center little-regular"><span class="animate-number" data-value="50" data-animation-duration="1000">0</span> %</p>
                        </li>
                        <li class="col-xs-4">
                          <h3 class="text-center little-regular bottommargin">Night time</h3>
                          <div class="text-center">
                            <canvas id="clear-night" width="36" height="36"></canvas>
                          </div>
                          <p class="text-center little-regular">09:52 PM</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /tile footer -->

                </section>
                <!-- /tile -->

              </div>
              <!-- /col 4 -->

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
    <script src="js/bootstrap.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian') }}"></script>

    <script src="{{ asset('js/plugins/jquery.nicescroll.min.js') }}"></script>

    <script src="{{ asset('js/plugins/blockui/jquery.blockUI.js') }}"></script>

    <script src="{{ asset('js/plugins/jquery.easypiechart.min.js') }}"></script>

    <script src="{{ asset('js/plugins/jquery.animateNumbers.js') }}"></script>

    <script src="{{ asset('js/plugins/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.selection.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.animator.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.orderBars.js') }}"></script>

    <script src="{{ asset('js/plugins/rickshaw/raphael-min.js') }}"></script> 
    <script src="{{ asset('js/plugins/rickshaw/d3.v2.js') }}"></script>
    <script src="{{ asset('js/plugins/rickshaw/rickshaw.min.js') }}"></script>

    <script src="{{ asset('js/plugins/skycons/skycons.js') }}"></script>

    <script src="{{ asset('js/plugins/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>

    <script src="{{ asset('js/plugins/chosen/chosen.jquery.min.js') }}"></script>

    <script src="{{ asset('js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/plugins/tabdrop/bootstrap-tabdrop.min.js') }}"></script>

    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/minoral.min.js') }}"></script>
    <script src="{{ asset('js/snackbar.min.js') }}"></script>
    <script src="{{ asset('js/dnd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fine-uploader.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
    $(function(){

      // Initialize card flip
      $('.card.hover').hover(function(){
        $(this).addClass('flip');
      },function(){
        $(this).removeClass('flip');
      });

      // Make card front & back side same

      $('.card').each(function() {
        var front = $('.card .front');
        var back = $('.card .back');
        var frontH = front.height();
        var backH = back.height();

        

        if (backH > frontH) {
          front.height(backH - 8);
        }
      });

      // Initialize tabDrop
      $('.tabdrop').tabdrop({text: '<i class="fa fa-th-list"></i>'});
      
      //generate pie charts
      $('.easypiechart').easyPieChart();

      //generate actual pie charts
      $('.pie-chart').easyPieChart();

      //animate numbers on cards
      $("#users-count").animateNumbers({{ count($users) }});
      $("#orders-count").animateNumbers({{ count($email_addresses) }});
      $("#sales-count").animateNumbers({{ count($emails_sent) }});
      $("#visits-count").animateNumbers({{ count($templates) }});

      //animate numbers with class .animate-number with data-value attribute
      $(".animate-number").each(function() {
        var value = $(this).data('value');
        var duration = $(this).data('animation-duration');

        $(this).animateNumbers(value, true, duration, "linear");
      });

      //animate progress bars
      $('.animate-progress-bar').each(function(){
        var progress =  $(this).data('percentage');

        $(this).css('width', progress);
      })

      
      
      //server load rickshaw chart
      var graph;

      var seriesData = [ [], []];
      var random = new Rickshaw.Fixtures.RandomData(50);

      for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
      }

      graph = new Rickshaw.Graph( {
        element: document.querySelector("#serverload-chart"),
        height: 150,
        renderer: 'area',
        series: [
          {
            data: seriesData[0],
            color: '#1693A5',
            name:'File Server'
          },{
            data: seriesData[1],
            color: '#e2e2e2',
            name:'Mail Server'
          }
        ]
      } );

      var hoverDetail = new Rickshaw.Graph.HoverDetail( {
        graph: graph,
      });

      setInterval( function() {
        random.removeData(seriesData);
        random.addData(seriesData);
        graph.update();

      },1000);

      // weather icons
      var icons = new Skycons({"color": "white"});
      icons.set("partly-cloudy-day", Skycons.PARTLY_CLOUDY_DAY);
      icons.set("clear-day", Skycons.CLEAR_DAY);
      icons.set("cloudy", Skycons.CLOUDY);
      icons.set("wind", Skycons.WIND);
      icons.set("rain", Skycons.RAIN);
      icons.set("clear-night", Skycons.CLEAR_NIGHT);
      icons.play();

      //sparkline charts
      $('#projectbar1').sparkline('html', {type: 'bar', barColor: '#22beef', barWidth: 4, height: 20});
      $('#projectbar2').sparkline('html', {type: 'bar', barColor: '#cd97eb', barWidth: 4, height: 20});
      $('#projectbar3').sparkline('html', {type: 'bar', barColor: '#a2d200', barWidth: 4, height: 20});
      $('#projectbar4').sparkline('html', {type: 'bar', barColor: '#ffc100', barWidth: 4, height: 20});
      $('#projectbar5').sparkline('html', {type: 'bar', barColor: '#ff4a43', barWidth: 4, height: 20});
      $('#projectbar6').sparkline('html', {type: 'bar', barColor: '#a2d200', barWidth: 4, height: 20});

      //todo's
       $('#todolist li label').click(function() {
        $(this).toggleClass('done');
      });

      //load wysiwyg editor
      $('#quick-message-content').summernote({
        height: 158   //set editable area's height
      });

      //multiselect input
      $(".chosen-select").chosen({disable_search_threshold: 10});

      //owl carousel
      $("#owl-example").owlCarousel({
        singleItem: true,
        autoPlay: true,
        navigation: true,
        slideSpeed: 400,
        paginationSpeed: 500,
        navigationText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
      });

      //sparkline pie chart
      $("#pie-chart").sparkline([10,20,15,40], {
        type: 'pie',
        width: '135',
        height: '135',
        sliceColors: ['#22beef', '#cd97eb', '#a2d200', '#ff4a43']
      });

      //social feed active class auto-scrolling
      setInterval( function() {
        var active = $('.social-feed .active')
        
        active.removeClass('active');

        active.next().addClass('active');

        if (active.is(':last-child')) {
          $('.social-feed li:first-child').addClass('active');
        };

      },8000);

      //social feed hover function
      $( ".social-feed li" ).on({
        mouseenter: function() {
          $('.social-feed .active').removeClass('active');
        }, mouseleave: function() {
          $(this).addClass('active');
        }
      });

    })
      
    </script>
  </body>
</html>