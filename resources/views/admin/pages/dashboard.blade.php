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
                                <h5 style="color: #f9f9f9;">{{trans('words.language_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/genres')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup">{{$genres}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.genres_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.movies_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.shows_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.sports_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.live_tv')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.users')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
 

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/transactions')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-primary" data-plugin="counterup">{{$transactions}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.transactions')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.daily_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup">{{$weekly_amount}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.weekly_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup">{{$monthly_amount}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.monthly_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup">{{$yearly_amount}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.yearly_revenue')}}</h5>
                            </div>
                        </div>
                    </div>

                    
                </div>
           
            <div class="row">   
                <div class="col-xl-12">
                    <div class="card-box">

                    <h4 class="header-title m-t-0 m-b-0">{{trans('words.users_plan_statastics')}}</h4>
                    <p>{{trans('words.current_year')}}</p>

                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            
                            @foreach($plan_list as $p_key=>$plan_data) 
                            
                            <li class="list-inline-item">
                                <h5 style="color: {{getStatisticsColors($p_key+1)}};"><i class="fa fa-circle m-r-5"></i>{{$plan_data->plan_name}}</h5>
                            </li>

                            @endforeach
 
                        </ul>
                    </div>
                    
                        <div id="morris-bar-example" style="height: 300px;"></div>

                    </div>
                </div>
            </div>    
          
          @else

                <div class="row">
                    
                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/language')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup">{{$language}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.language_text')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/genres')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup">{{$genres}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.genres_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.movies_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.shows_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.sports_text')}}</h5>
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
                                <h5 style="color: #f9f9f9;">{{trans('words.live_tv')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    <div class="col-xl-3 col-md-6">
                        <a href="{{URL::to('admin/transactions')}}">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-primary" data-plugin="counterup">{{$transactions}}</h2>
                                <h5 style="color: #f9f9f9;">{{trans('words.transactions')}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>

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

            <?php for ($i = 1; $i <= 12; $i++)
            {
                //$month_name =date("M", strtotime("$i/12/10"));
                $month_name_full =date("F", strtotime("$i/12/10"));

                $month_name_short =date("M", strtotime("$i/12/10"));

                ?>
            { y: '<?php echo $month_name_short;?>', @foreach($plan_list as $plan_data_obj) pid<?php echo $plan_data_obj->id;?>:<?php echo plan_count_by_month($plan_data_obj->id,$month_name_full);?>,@endforeach },

            <?php  }?>
             
        ];

            this.createBarChart('morris-bar-example', $barData, 'y', [@foreach($plan_list as $plan_data_obj)'pid{{$plan_data_obj->id}}',@endforeach], [@foreach($plan_list as $plan_data) '{{$plan_data->plan_name}}', @endforeach], [@foreach($plan_list as $p_key=>$plan_data_obj) '{{getStatisticsColors($p_key+1)}}',  @endforeach]);

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