@extends('site_app')

@section('head_title', trans('words.my_watchlist').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

 
<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url('{{ URL::asset('site_assets/images/breadcrum-bg.jpg') }}')">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12"> 
          <h2>{{trans('words.my_watchlist')}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ URL::to('/') }}" title="{{trans('words.home')}}">{{trans('words.home')}}</a></li>
              <li><a href="{{ URL::to('/dashboard') }}" title="{{trans('words.dashboard_text')}}">{{trans('words.dashboard_text')}}</a></li>
              <li>{{trans('words.my_watchlist')}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
<!-- End Breadcrumb --> 

 
 
<!-- Start Movies Watchlist -->
<div class="vfx-item-ptb vfx-item-info">
  <div class="container-fluid">
     <div class="row">
    <div class="col-md-12">

      @if(Session::has('flash_message'))
              <div class="alert alert-success">               
                  {{ Session::get('flash_message') }}
              </div>
        @endif

      <div class="vfx-item-section">
        <h3>{{trans('words.movies_text')}}</h3>        
      </div>
      <div class="video-carousel owl-carousel">
        @foreach($movies_watchlist as $movies_data)  
          <div class="single-video">
            <div class="watchlist-item"><a href="{{URL::to('watchlist/remove')}}?post_id={{$movies_data->post_id}}&post_type=Movies" title="Remove"><i class="fa fa-times"></i>{{trans('words.remove')}}</a></div>
            <a href="{{ URL::to('movies/details/'.App\Movies::getMoviesInfo($movies_data->post_id,'video_slug').'/'.App\Movies::getMoviesInfo($movies_data->post_id,'id')) }}" title="{{App\Movies::getMoviesInfo($movies_data->post_id,'video_title')}}">
               <div class="video-img">    
                <span class="video-item-content">{{ Str::limit(stripslashes(App\Movies::getMoviesInfo($movies_data->post_id,'video_title')),25)}}</span> 
                <img src="{{URL::to('/'.App\Movies::getMoviesInfo($movies_data->post_id,'video_image_thumb'))}}" alt="{{App\Movies::getMoviesInfo($movies_data->post_id,'video_title')}}" title="{{App\Movies::getMoviesInfo($movies_data->post_id,'video_title')}}">         
               </div>       
            </a>
          </div>
        @endforeach           
      </div>
     </div>   
     </div>  
  </div>
</div>
<!-- End Movies Watchlist --> 


<!-- Start Shows Watchlist -->
<div class="video-shows-section vfx-item-ptb">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="vfx-item-section">
      <h3>{{trans('words.shows_text')}}</h3>      
    </div>
    <div class="tv-season-video-carousel owl-carousel">
      @foreach($shows_watchlist as $episode_data)
 
      <div class="single-video">
      <div class="watchlist-item"><a href="{{URL::to('watchlist/remove')}}?post_id={{$episode_data->post_id}}&post_type=Shows" title="Remove"><i class="fa fa-times"></i>{{trans('words.remove')}}</a></div>
      <a href="{{ URL::to('shows/'.App\Episodes::getEpisodesShowName($episode_data->post_id,'series_slug').'/'.App\Episodes::getEpisodesInfo($episode_data->post_id,'video_slug').'/'.$episode_data->post_id) }}" title="{{stripslashes(App\Episodes::getEpisodesInfo($episode_data->post_id,'video_title'))}}">
         <div class="video-img">          
          <img src="{{URL::to('/'.App\Episodes::getEpisodesInfo($episode_data->post_id,'video_image'))}}" alt="{{stripslashes(App\Episodes::getEpisodesInfo($episode_data->post_id,'video_title'))}}" title="{{stripslashes(App\Episodes::getEpisodesInfo($episode_data->post_id,'video_title'))}}">         
         </div>
         <div class="season-title-item">
          <h3>{{stripslashes(App\Episodes::getEpisodesShowName($episode_data->post_id,'series_name'))}}</h3>
          <span>{{Str::limit(stripslashes(App\Episodes::getEpisodesInfo($episode_data->post_id,'video_title')),25)}}</span>
         </div> 
      </a>
      </div>
      @endforeach     
      
    </div>
    </div>
  </div>
  </div>
</div>
<!-- End Shows Watchlist -->    

<!-- Start Sports Watchlist -->
<div class="video-shows-section sport-video-block vfx-item-ptb">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="vfx-item-section">
      <h3>{{trans('words.sports_text')}}</h3>      
    </div>
    <div class="tv-season-video-carousel owl-carousel">
      
      @foreach($sports_watchlist as $sport_data)
      <div class="single-video">
        <div class="watchlist-item"><a href="{{URL::to('watchlist/remove')}}?post_id={{$sport_data->post_id}}&post_type=Sports" title="Remove"><i class="fa fa-times"></i>{{trans('words.remove')}}</a></div>

        <a href="{{ URL::to('sports/details/'.App\Sports::getSportsInfo($sport_data->post_id,'video_slug').'/'.$sport_data->post_id) }}" title="{{App\Sports::getSportsInfo($sport_data->post_id,'video_title')}}">
           <div class="video-img">
            <span class="video-item-content">{{App\Sports::getSportsInfo($sport_data->post_id,'video_title')}}</span>
            <img src="{{URL::to('/'.App\Sports::getSportsInfo($sport_data->post_id,'video_image'))}}" alt="{{App\Sports::getSportsInfo($sport_data->post_id,'video_title')}}" title="{{App\Sports::getSportsInfo($sport_data->post_id,'video_title')}}" />         
           </div>                          
        </a>
      </div>
      @endforeach
 
    </div>
    </div>
  </div>
  </div>
</div>
<!-- End Sports Watchlist -->

<!-- Start Live TV Watchlist -->
<div class="video-shows-section live-tv-video-block vfx-item-ptb">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="vfx-item-section">
      <h3>{{trans('words.live_tv')}}</h3>      
    </div>
    <div class="tv-season-video-carousel owl-carousel">
      
      @foreach($livetv_watchlist as $livetv_data)
      <div class="single-video">
        <div class="watchlist-item"><a href="{{URL::to('watchlist/remove')}}?post_id={{$livetv_data->post_id}}&post_type=LiveTV" title="Remove"><i class="fa fa-times"></i>{{trans('words.remove')}}</a></div>

          <a href="{{ URL::to('livetv/details/'.App\LiveTV::getLiveTvInfo($livetv_data->post_id,'channel_slug').'/'.$livetv_data->post_id) }}" title="{{App\LiveTV::getLiveTvInfo($livetv_data->post_id,'channel_name')}}">
           <div class="video-img">       
               
            <span class="video-item-content">{{App\LiveTV::getLiveTvInfo($livetv_data->post_id,'channel_name')}}</span>
            <img src="{{URL::to('/'.App\LiveTV::getLiveTvInfo($livetv_data->post_id,'channel_thumb'))}}" alt="{{App\LiveTV::getLiveTvInfo($livetv_data->post_id,'channel_name')}}" title="{{App\LiveTV::getLiveTvInfo($livetv_data->post_id,'channel_name')}}" />         
           </div>                          
        </a>
         
      </div>
      @endforeach
 
    </div>
    </div>
  </div>
  </div>
</div>
<!-- End Live TV Watchlist -->
    
@endsection