<!-- Start Slider Area -->
<div class="slider-area pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="splide">
    <div class="splide__track">
      <ul class="splide__list">
        @foreach($slider as $slider_data)

        @if($slider_data->slider_type=="Movies")

        <?php $slider_url= URL::to('movies/details/'.App\Movies::getMoviesInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id);?>
         
        @elseif($slider_data->slider_type=="Shows")
        
        <?php $slider_url= URL::to('shows/details/'.App\Series::getSeriesInfo($slider_data->slider_post_id,'series_slug').'/'.$slider_data->slider_post_id);?>
         
        @elseif($slider_data->slider_type=="Sports")

        <?php $slider_url= URL::to('sports/details/'.App\Sports::getSportsInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id);?>
        
        @elseif($slider_data->slider_type=="LiveTV")

        <?php $slider_url= URL::to('livetv/details/'.App\LiveTV::getLiveTvInfo($slider_data->slider_post_id,'channel_slug').'/'.$slider_data->slider_post_id);?>
 
        @else
          <?php $slider_url='#';?>
        @endif

        <li class="splide__slide">
          <a href="{{$slider_url}}" title="{{stripslashes($slider_data->slider_title)}}">
            <div class="splide-slider-details-area">
              <h1>{{stripslashes($slider_data->slider_title)}}</h1>
              <a href="{{$slider_url}}" class="btn-watch" title="{{stripslashes($slider_data->slider_title)}}"><img src="{{ URL::asset('site_assets/images/ic-play.png') }}" alt="ic-play" title="ic-play">{{trans('words.watch')}}</a>
              <a href="{{ URL::to('membership_plan') }}" class="btn-buy-plan" title="buy-plan"><img src="{{ URL::asset('site_assets/images/ic-subscribe.png') }}" alt="ic-subscribe" title="ic-subscribe">{{trans('words.buy_plan')}}</a>
            </div>
            <img src="{{URL::to('/'.$slider_data->slider_image)}}" title="{{stripslashes($slider_data->slider_title)}}" alt="{{stripslashes($slider_data->slider_title)}}">
          </a>
        </li>
        @endforeach         
        
      </ul>
    </div>
    </div>
    </div>
  </div>
</div>
<!-- End Slider Area --> 