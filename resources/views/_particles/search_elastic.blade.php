   
  @if(count($s_movies_list) > 0)
  <div class="section section-padding bg-image tv_show gray_bg mb-3">
    <div class="container-fluid">
      <div class="vfx-item-section">
            <h3>{{trans('words.movies_text')}}</h3>             
      </div>
      <div class="row">
          <div class="video-carousel owl-carousel">
            @foreach($s_movies_list as $movies_data)
            <div class="single-video">
            <a href="{{ URL::to('movies/details/'.$movies_data->video_slug.'/'.$movies_data->id) }}">
               <div class="video-img">
                @if($movies_data->video_access =="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="premium" title="premium">
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
  @endif

  @if(count($s_series_list) > 0)
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container-fluid">
      <div class="vfx-item-section">
        <h3>{{trans('words.tv_shows_text')}}</h3>         
      </div>
      <div class="row">
        <div class="video-shows-carousel owl-carousel">

          @foreach($s_series_list as $series_data)
          
          <div class="single-video">
          <a href="{{ URL::to('series/'.$series_data->series_slug.'/'.$series_data->id) }}">
             <div class="video-img">          
              @if($series_data->series_access=="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
                </div> 
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
  @endif

  @if(count($s_sports_list) > 0)
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container-fluid">
      <div class="vfx-item-section">
        <h3>{{trans('words.sports_text')}}</h3>         
      </div>
      <div class="row">
        <div class="tv-season-video-carousel owl-carousel">

          @foreach($s_sports_list as $sports_video)
          
          <div class="single-video">
          <a href="{{ URL::to('sports/details/'.$sports_video->video_slug.'/'.$sports_video->id) }}">
             <div class="video-img">          
              @if($sports_video->series_access=="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="premium" title="premium">
                </div> 
              @endif 
              <span class="video-item-content">{{$sports_video->video_title}}</span> 
              <img src="{{URL::to('/'.$sports_video->video_image)}}" alt="{{$sports_video->video_title}}" title="{{$sports_video->video_title}}">         
             </div>       
          </a>
          </div>
          @endforeach

        </div>
      </div>  

    </div>
  </div>    
  @endif

  @if(count($live_tv_list) > 0)
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container-fluid">
      <div class="vfx-item-section">
        <h3>{{trans('words.live_tv')}}</h3>         
      </div>
      <div class="row">
        <div class="tv-season-video-carousel owl-carousel">

          @foreach($live_tv_list as $live_tv_data)
          
          <div class="single-video">
          <a href="{{ URL::to('livetv/details/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id) }}">
             <div class="video-img">          
              @if($live_tv_data->channel_access=="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="premium" title="premium">
                </div> 
              @endif 
              <span class="video-item-content">{{$live_tv_data->channel_name}}</span> 
              <img src="{{URL::to('/'.$live_tv_data->channel_thumb)}}" alt="{{$live_tv_data->channel_name}}" title="{{$live_tv_data->channel_name}}">         
             </div>       
          </a>
          </div>
          @endforeach

        </div>
      </div>  

    </div>
  </div>    
  @endif
 
  @if(count($s_series_list) == 0 AND count($s_movies_list) == 0 AND count($s_sports_list) == 0 AND count($live_tv_list) == 0)
  <div class="section section-padding bg-image tv_show gray_bg">
  <div class="container-fluid">
    <div class="vfx-item-section">
        <h3>No Result</h3>         
      </div>    
  </div>
  </div>
  @endif
      
 <script type="text/javascript">
// Video Carousel
   $(".video-carousel").owlCarousel({
    nav: true,
    margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 2,
      slideBy: 2,     
         },
         480: {
            items: 3,
      slideBy: 3
         },
         768: {
            items: 4,
      slideBy: 4
         },
     991: {
            items: 5,
      slideBy: 5
         },
         1198: {
            items: 7,
      slideBy: 7
         }     
      }
   });
   
   // Video Shows Carousel
   $(".video-shows-carousel").owlCarousel({
    nav: true,
    margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 1,
      slideBy: 1
         },
         640: {
            items: 2,
      slideBy: 2
         },
         768: {
            items: 2,
      slideBy: 2
         },
     991: {
            items: 2,
      slideBy: 2
         },
         1198: {
            items: 3,
      slideBy: 3
         }     
      }
   });
   
   // TV Season Video Carousel
   $(".tv-season-video-carousel").owlCarousel({
    nav: true,
    margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 1,
      slideBy: 1
         },
         640: {
            items: 2,
      slideBy: 2
         },
         768: {
            items: 3,
      slideBy: 3
         },
     991: {
            items: 4,
      slideBy: 4
         },
         1198: {
            items: 5,
      slideBy: 5
         }     
      }
   });
     
</script>