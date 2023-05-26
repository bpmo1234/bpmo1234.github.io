@extends('site_app')

@section('head_title', $ad_info->ad_name.' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

 

<!-- Start Page Content Area -->
<div class="page-content-area vfx-item-ptb pt-3">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <!-- Start Actors Detail Wrapper -->
          <div class="actors-detail-wrapper media align-items-center" style="background-image: url('{{ URL::asset('site_assets/images/breadcrum-bg.jpg') }}')">
            <div class="actors-profile">
            @if($ad_info->ad_image) 
                <img src="{{URL::to('/'.$ad_info->ad_image)}}" alt="{{$ad_info->ad_name}}" title="{{$ad_info->ad_name}}"> 
              @else
                <img src="{{URL::to('images/user_icon.png')}}" alt="{{$ad_info->ad_name}}" title="{{$ad_info->ad_name}}"> 
              @endif
            <div class="actors-info-details">
              <h4>{{$ad_info->ad_name}}</h4>			
            </div>			 
        </div>		   
        </div>		
      </div>
      <!-- Start Actors Detail Wrapper --> 	  	 
    </div>

  
  @if(getcong('menu_movies') and count($movies_list)>0)  
  <!-- Start Movies Carousel -->
    <div class="row">
     <div class="video-carousel-area vfx-item-ptb related-video-item">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
        <div class="vfx-item-section">
          <h3>{{trans('words.movies_text')}}</h3>           
        </div>
        <div class="video-carousel owl-carousel">
          @foreach($movies_list as $movies_data) 
          <div class="single-video">
          <a href="{{ URL::to('movies/details/'.$movies_data->video_slug.'/'.$movies_data->id) }}" title="{{stripslashes($movies_data->video_title)}}">
             <div class="video-img">          
              
              @if($movies_data->video_access =="Paid")       
              <div class="vid-lab-premium">
                <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
              </div> 
              @endif  

              <span class="video-item-content">{{stripslashes($movies_data->video_title)}}</span> 
              <img src="{{URL::to('/'.$movies_data->video_image_thumb)}}" alt="{{stripslashes($movies_data->video_title)}}" title="{{stripslashes($movies_data->video_title)}}">         
             </div>       
          </a>
          </div>
          @endforeach
                    
        </div>
        </div>
      </div>
      </div>
     </div>
  @endif

  @if(getcong('menu_shows') and count($series_list)>0)  
     <div class="video-shows-section vfx-item-ptb tv-season-related-block">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
        <div class="vfx-item-section">
          <h3>{{trans('words.tv_shows_text')}}</h3>
           
        </div>
        <div class="tv-season-video-carousel owl-carousel">
          @foreach($series_list as $series_data)
          <div class="single-video">
          <a href="{{ URL::to('shows/details/'.$series_data->series_slug.'/'.$series_data->id) }}" title="">
             <div class="video-img">    
             @if($series_data->series_access =="Paid")          
              <div class="vid-lab-premium">                 
                  <div class="vid-lab-premium">
                    <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
                  </div>
              </div> 
              @endif
              <img src="{{URL::to('/'.$series_data->series_poster)}}" alt="{{stripslashes($series_data->series_name)}}" title="{{stripslashes($series_data->series_name)}}">         
             </div>
             <div class="season-title-item">
              <h3>{{Str::limit(stripslashes($series_data->series_name),25)}}</h3>               
             </div> 
          </a>
          </div>
          @endforeach
                      
        </div>
        </div>
      </div>
      </div>
    </div>  
  @endif  
      
    </div>  
    <!-- End Shows Video Carousel -->
  </div>
</div>
<!-- End Page Content Area --> 

@endsection