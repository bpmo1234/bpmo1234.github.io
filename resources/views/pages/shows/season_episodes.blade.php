@extends('site_app')
 

@if($season_info->seo_title)
  @section('head_title', stripslashes($season_info->seo_title).' | '.getcong('site_name'))
@else
  @section('head_title', $series_name.' '.stripslashes($season_info->season_name).' | '.getcong('site_name'))
@endif

@if($season_info->seo_description)
  @section('head_description', stripslashes($season_info->seo_description)) 
@endif

@if($season_info->seo_keyword)
  @section('head_keywords', stripslashes($season_info->seo_keyword)) 
@endif


@section('head_url', Request::url())

@section('content')

<!-- Start View All Movies -->
<div class="view-all-video-area vfx-item-ptb">
  <div class="container-fluid">
    
     <!-- Start Season Video Carousel -->
    <div class="row">
     <div class="video-shows-section vfx-item-ptb tv-season-related-block">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
        <div class="vfx-item-section">
          <h3><a href="{{ URL::to('shows/details/'.$series_slug.'/'.$season_info->series_id) }}" title="{{$series_name}}">{{$series_name}}</a> - {{$season_info->season_name}}</h3>           
        </div>
        <div class="tv-season-video-carousel owl-carousel">
          @foreach($episode_list as $episode_data)
          <div class="single-video">
          <a href="{{ URL::to('shows/'.$series_slug.'/'.$episode_data->video_slug.'/'.$episode_data->id) }}" title="{{stripslashes($episode_data->video_title)}}">
             <div class="video-img"> 

               @if($episode_data->video_access=="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="premium" title="premium">
                </div> 
                @endif

              <img src="{{URL::to('/'.$episode_data->video_image)}}" alt="{{stripslashes($episode_data->video_title)}}" title="{{stripslashes($episode_data->video_title)}}">         
             </div>
             <div class="season-title-item">
              <h3>{{Str::limit(stripslashes($episode_data->video_title),25)}}</h3>
             </div> 
          </a>
          </div>
          @endforeach
           
           
        </div>
        </div>
      </div>
      </div>
    </div>    
    </div>  
    <!-- End Season Video Carousel -->
    
   </div>
</div>
<!-- End View All Movies -->
 
@endsection