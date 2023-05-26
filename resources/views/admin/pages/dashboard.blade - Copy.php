@extends("admin.admin_app")

@section("content")

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["{{trans('words.this_year')}}", @foreach($plan_list as $plan_data) '{{$plan_data->plan_name}}', @endforeach],
          
          <?php for ($i = 1; $i <= 12; $i++)
            {
                //$month_name =date("M", strtotime("$i/12/10"));
                $month_name_full =date("F", strtotime("$i/12/10"));
                ?>
            
            ['<?php echo $month_name_full;?>', @foreach($plan_list as $plan_data_obj) <?php echo plan_count_by_month($plan_data_obj->id,$month_name_full);?>,@endforeach],
            
            <?php  }?>
                     
        ]);

        var options = {
          chart: {
            title: "{{trans('words.users_plan_statastics')}}",
            subtitle: "{{trans('words.current_year')}}",
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    

<div class="content-page">
      <div class="content">
        <div class="container-fluid">
          
          @if(Auth::User()->usertype=="Admin")  
                <div class="row">
                    
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/language')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup">{{$language}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.language_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/genres')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup">{{$genres}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.genres_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>


                    @if(getcong('menu_movies'))
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/movies')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup">{{$movies}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.movies_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(getcong('menu_shows'))
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/series')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-dark" data-plugin="counterup">{{$series}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.shows_text')}}</h5>
                            </div>
                        </div>
                         </a>
                    </div>
                    @endif

                    @if(getcong('menu_sports'))
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/sports')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup">{{$sports}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.sports_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(getcong('menu_livetv'))
                     <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/live_tv')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-danger" data-plugin="counterup">{{$livetv}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.live_tv')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/users')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-purple" data-plugin="counterup">{{$users}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.users')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
 

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/transactions')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-primary" data-plugin="counterup">{{$transactions}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.transactions')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>    

                <div class="row">    

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup">{{$daily_amount}}</h2>
                                <h5>{{trans('words.daily_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup">{{$weekly_amount}}</h2>
                                <h5>{{trans('words.weekly_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup">{{$monthly_amount}}</h2>
                                <h5>{{trans('words.monthly_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup">{{$yearly_amount}}</h2>
                                <h5>{{trans('words.yearly_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    
                </div>
          <div class="card-box table-responsive">
                 <div class="row">
                    <div class="col-xl-12" id="columnchart_material" style="height: 400px;"></div>
                </div> 
            </div>    
                <div class="col-xl-12">
                    <div class="card-box">

                    <h4 class="header-title m-t-0 m-b-30">{{trans('words.users_plan_statastics')}}</h4>
                    <p>{{trans('words.current_year')}}</p>

                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            
                            @foreach($plan_list as $plan_data) 
                            
                            <li class="list-inline-item">
                                <h5 style="color: #ff8acc;"><i class="fa fa-circle m-r-5"></i>{{$plan_data->plan_name}}</h5>
                            </li>

                            @endforeach

                            <!-- <li class="list-inline-item">
                                <h5 style="color: #ff8acc;"><i class="fa fa-circle m-r-5"></i>Series A</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #5b69bc;"><i class="fa fa-circle m-r-5"></i>Series B</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #35b8e0;"><i class="fa fa-circle m-r-5"></i>Series C</h5>
                            </li> -->
                        </ul>
                    </div>
                    
                        <div id="morris-bar-example" style="height: 300px;"></div>

                    </div>
                </div>
          
          @else

                <div class="row">
                    
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/language')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup">{{$language}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.language_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/genres')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup">{{$genres}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.genres_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>

                    @if(getcong('menu_movies'))
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/movies')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup">{{$movies}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.movies_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(getcong('menu_shows'))
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/series')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-dark" data-plugin="counterup">{{$series}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.shows_text')}}</h5>
                            </div>
                        </div>
                         </a>
                    </div>
                    @endif

                    @if(getcong('menu_sports'))
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/sports')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup">{{$sports}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.sports_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(getcong('menu_livetv'))
                     <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/live_tv')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-danger" data-plugin="counterup">{{$livetv}}</h2>
                                <h5 style="color: #343a40;">{{trans('words.live_tv')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                </div>    
          @endif 
        
        </div>

        
      </div>
      @include("admin.copyright") 
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
             
<!--Morris Chart-->
    <script src="{{ URL::asset('admin_assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/raphael/raphael-min.js') }}"></script>
<!--     <script src="{{ URL::asset('admin_assets/pages/jquery.morris.init.js') }}"></script>
 -->

 <script type="text/javascript">
    !function($) {
    "use strict";
 
      var MorrisCharts = function() {};

      MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.4,
            barColors: lineColors
        });
    },

    MorrisCharts.prototype.init = function() {

            //creating bar chart
        var $barData  = [
            { y: '2009', a: 100, b: 90 , c: 40 },
            { y: '2010', a: 75,  b: 65 , c: 20 },
            { y: '2011', a: 50,  b: 40 , c: 50 },
            { y: '2012', a: 75,  b: 65 , c: 95 },
            { y: '2013', a: 50,  b: 40 , c: 22 },
            { y: '2014', a: 75,  b: 65 , c: 56 },
            { y: '2015', a: 100, b: 90 , c: 60 }
        ];

            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ['Series A', 'Series B', 'Series C'], ['#ff8acc', '#5b69bc', "#35b8e0"]);

        },
        //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);


 </script>      


@endsection