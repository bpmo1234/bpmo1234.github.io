@extends('site_app')

@section('head_title', getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
  @include("pages.home.slider")

 @if(Auth::check() && $recently_watched->count() >0) 
  <!-- Start Recently Watched Video Section -->
<div class="video-shows-section vfx-item-ptb">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="vfx-item-section">
          <h3>{{trans('words.recently_watched')}}</h3>           
        </div>
        <div class="recently-watched-video-carousel owl-carousel">
          @foreach($recently_watched as $i=>$watched_videos)
            <div class="single-video">
              @if($watched_videos->video_type=="Movies")
                <a href="{{ URL::to('movies/details/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}">
                 <div class="video-img">          
                     
                  <span class="video-item-content">{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}</span> 
                  <img src="{{URL::to('/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)}}" alt="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}">         
                 </div>       
                </a>
              @endif
              
 

              @if($watched_videos->video_type=="Episodes")
               <?php $episode_series_id=\App\Episodes::getEpisodesInfo($watched_videos->video_id,'episode_series_id');?>
 
                  <div class="single-video">
                    <a href="{{ URL::to('shows/'.\App\Series::getSeriesInfo($episode_series_id,'series_slug').'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}">
                     <div class="video-img">          
                       
                      <span class="video-item-content">{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}</span> 
                      <img src="{{URL::to('/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)}}" alt="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}">         
                     </div>       
                    </a>
                  </div>

              @endif


              @if($watched_videos->video_type=="Sports")
                 
                <div class="single-video">
                  <a href="{{ URL::to('sports/details/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}">
                   <div class="video-img">          
                     
                    <span class="video-item-content">{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}</span> 
                    <img src="{{URL::to('/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)}}" alt="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_title}}">         
                   </div>       
                  </a>
                </div>  

              @endif

              @if($watched_videos->video_type=="LiveTV")
                 
                  <div class="single-video">
                    <a href="{{ URL::to('livetv/details/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_name}}">
                     <div class="video-img">          
                       
                      <span class="video-item-content">{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_name}}</span> 
                      <img src="{{URL::to('/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_thumb)}}" alt="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_name}}" title="{{recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_name}}">         
                     </div>       
                    </a>
                  </div>

              @endif  

            </div>
          @endforeach        
        
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Recently Watched Video Section -->
@endif

@if(getcong('menu_movies'))
<!-- Start Upcoming Section -->
@if($upcoming_movies->count() >0)
 
<!-- Start Movies Video Carousel -->
<div class="video-carousel-area vfx-item-ptb">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="vfx-item-section">
            <h3>{{trans('words.upcoming_movies')}}</h3>        
          </div>
          <div class="video-carousel owl-carousel">
            
          @foreach($upcoming_movies as $movies_data)
            <div class="single-video">
                <a href="{{ URL::to('movies/details/'.$movies_data->video_slug.'/'.$movies_data->id) }}" title="{{$movies_data->video_title}}">
                  <div class="video-img">  
                  @if($movies_data->video_access=="Paid")       
                  <div class="vid-lab-premium">
                    <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
                  </div> 
                  @endif
                  <span class="video-item-content">{{$movies_data->video_title}}</span> 
                  <img src="{{URL::to('/'.$movies_data->video_image_thumb)}}" alt="{{$movies_data->video_title}}" title="{{$movies_data->video_title}}">         
                  </div>       
              </a>
            </div>
            @endforeach

          
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Latest Movies Video Carousel -->
@endif
<!-- End Upcoming Section -->
@endif

@if(getcong('menu_shows')) 
<!-- Start Upcoming Section -->
@if($upcoming_series->count() >0)

<!-- Start Latest Shows Video Section -->
<div class="video-shows-section vfx-item-ptb">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="vfx-item-section">
                <h3>{{trans('words.upcoming_shows')}}</h3>
                
              </div>
              <div class="video-shows-carousel owl-carousel">
              @foreach($upcoming_series as $series_data)
                <div class="single-video">
                    <a href="{{ URL::to('shows/details/'.$series_data->series_slug.'/'.$series_data->id) }}" title="{{$series_data->series_name}}">
                     <div class="video-img"> 
                      @if($series_data->series_access=="Paid")
                            <div class="vid-lab-premium"><img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="premium" title="premium"></div> 
                      @endif
                      <span class="video-item-content">{{$series_data->series_name}}</span> 
                      <img src="{{URL::to('/'.$series_data->series_poster)}}" alt="{{$series_data->series_name}}" title="{{$series_data->series_name}}">         
                     </div>       
                  </a>
                </div>
                @endforeach
             
            
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Latest Shows Video Section -->
@endif
<!-- End Upcoming Section -->
@endif

  @foreach($home_sections as $sections_data)

      @if(getcong('menu_movies'))

      @if($sections_data->post_type=="Movie")
      <!-- Start Movies Video Carousel -->
      <div class="video-carousel-area vfx-item-ptb">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="vfx-item-section">
                <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="{{$sections_data->section_name}}"><h3>{{$sections_data->section_name}}</h3></a>
            <span class="view-more">
             <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="view-more">{{trans('words.view_all')}}</a>
            </span>
              </div>
              <div class="video-carousel owl-carousel">
                
                @foreach(explode(",",$sections_data->movie_ids) as $movie_data)
                <div class="single-video">
                    <a href="{{ URL::to('movies/details/'.App\Movies::getMoviesInfo($movie_data,'video_slug').'/'.App\Movies::getMoviesInfo($movie_data,'id')) }}" title="{{App\Movies::getMoviesInfo($movie_data,'video_title')}}">
                     <div class="video-img">  
                      @if(App\Movies::getMoviesInfo($movie_data,'video_access')=="Paid")       
                      <div class="vid-lab-premium">
                        <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
                      </div> 
                      @endif
                      <span class="video-item-content">{{App\Movies::getMoviesInfo($movie_data,'video_title')}}</span> 
                      <img src="{{URL::to('/'.App\Movies::getMoviesInfo($movie_data,'video_image_thumb'))}}" alt="{{App\Movies::getMoviesInfo($movie_data,'video_title')}}" title="{{App\Movies::getMoviesInfo($movie_data,'video_title')}}">         
                     </div>       
                  </a>
                </div>
                @endforeach

              
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Latest Movies Video Carousel -->
      @endif

      @endif

      @if(getcong('menu_shows'))

      @if($sections_data->post_type=="Shows")
      <!-- Start Latest Shows Video Section -->
      <div class="video-shows-section vfx-item-ptb">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="vfx-item-section">
                <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="{{$sections_data->section_name}}"><h3>{{$sections_data->section_name}}</h3></a>
                <span class="view-more">
                 <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="view-more">{{trans('words.view_all')}}</a>
                </span>
              </div>
              <div class="video-shows-carousel owl-carousel">
                @foreach(explode(",",$sections_data->show_ids) as $show_data)
                <div class="single-video">
                    <a href="{{ URL::to('shows/details/'.App\Series::getSeriesInfo($show_data,'series_slug').'/'.$show_data) }}" title="{{App\Series::getSeriesInfo($show_data,'series_name')}}">
                     <div class="video-img"> 
                      @if(App\Series::getSeriesInfo($show_data,'series_access')=="Paid")
                            <div class="vid-lab-premium"><img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium"></div> 
                      @endif
                      <span class="video-item-content">{{App\Series::getSeriesInfo($show_data,'series_name')}}</span> 
                      <img src="{{URL::to('/'.App\Series::getSeriesInfo($show_data,'series_poster'))}}" alt="{{App\Series::getSeriesInfo($show_data,'series_name')}}" title="{{App\Series::getSeriesInfo($show_data,'series_name')}}">         
                     </div>       
                  </a>
                </div>
                @endforeach
             
            
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Latest Shows Video Section --> 
      @endif

      @endif


      @if(getcong('menu_sports'))

      @if($sections_data->post_type=="Sports")

        <!-- Start Sports Video Section -->
        <div class="video-shows-section sport-video-block vfx-item-ptb">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="vfx-item-section">
                <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="{{$sections_data->section_name}}"><h3>{{$sections_data->section_name}}</h3></a>
                <span class="view-more">
                 <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="view-more">{{trans('words.view_all')}}</a>
                </span>
              </div>

                <div class="tv-season-video-carousel owl-carousel">
                  @foreach(explode(",",$sections_data->sport_ids) as $sport_data)
                    <div class="single-video">
                      <a href="{{ URL::to('sports/details/'.App\Sports::getSportsInfo($sport_data,'video_slug').'/'.$sport_data) }}" title="{{App\Sports::getSportsInfo($sport_data,'video_title')}}">
                         <div class="video-img">       
                            @if(App\Sports::getSportsInfo($sport_data,'video_access')=="Paid")
                            <div class="vid-lab-premium"><img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium"></div> 
                            @endif   
                          <span class="video-item-content">{{App\Sports::getSportsInfo($sport_data,'video_title')}}</span>
                          <img src="{{URL::to('/'.App\Sports::getSportsInfo($sport_data,'video_image'))}}" alt="{{App\Sports::getSportsInfo($sport_data,'video_title')}}" title="{{App\Sports::getSportsInfo($sport_data,'video_title')}}" />         
                         </div>                          
                      </a>
                    </div>
                  @endforeach
           
                </div>

              </div>
            </div>
          </div>
        </div>
       <!-- End Sports Section --> 

      @endif

      @endif


      @if(getcong('menu_livetv'))

      @if($sections_data->post_type=="LiveTV")

        <!-- Start Live TV Video Section -->
        <div class="video-shows-section live-tv-video-block vfx-item-ptb">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="vfx-item-section">
                <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="{{$sections_data->section_name}}"><h3>{{$sections_data->section_name}}</h3></a>
                <span class="view-more">
                 <a href="{{ URL::to('collections/'.$sections_data->section_slug.'/'.$sections_data->id)}}" title="view-more">{{trans('words.view_all')}}</a>
                </span>
              </div>

                <div class="tv-season-video-carousel owl-carousel">
                  @foreach(explode(",",$sections_data->tv_ids) as $tv_data)
                    <div class="single-video">
                      <a href="{{ URL::to('livetv/details/'.App\LiveTV::getLiveTvInfo($tv_data,'channel_slug').'/'.$tv_data) }}" title="{{App\LiveTV::getLiveTvInfo($tv_data,'channel_name')}}">
                         <div class="video-img">       
                            @if(App\LiveTV::getLiveTvInfo($tv_data,'channel_access')=="Paid")
                            <div class="vid-lab-premium"><img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium"></div> 
                            @endif   
                          <span class="video-item-content">{{App\LiveTV::getLiveTvInfo($tv_data,'channel_name')}}</span>
                          <img src="{{URL::to('/'.App\LiveTV::getLiveTvInfo($tv_data,'channel_thumb'))}}" alt="{{App\LiveTV::getLiveTvInfo($tv_data,'channel_name')}}" title="{{App\LiveTV::getLiveTvInfo($tv_data,'channel_name')}}" />         
                         </div>                          
                      </a>
                    </div>
                  @endforeach
           
                </div>

              </div>
            </div>
          </div>
        </div>
       <!-- End Live TV Section --> 

      @endif

      @endif

  @endforeach
  
 
@endsection