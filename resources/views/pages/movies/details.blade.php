@extends('site_app')

@if($movies_info->seo_title)
  @section('head_title', stripslashes($movies_info->seo_title).' | '.getcong('site_name'))
@else
  @section('head_title', stripslashes($movies_info->video_title).' | '.getcong('site_name'))
@endif

@if($movies_info->seo_description)
  @section('head_description', stripslashes($movies_info->seo_description))
@else
  @section('head_description', Str::limit(stripslashes($movies_info->video_description),160))
@endif

@if($movies_info->seo_keyword)
  @section('head_keywords', stripslashes($movies_info->seo_keyword)) 
@endif


@section('head_image', URL::to('/'.$movies_info->video_image))

@section('head_url', Request::url())

@section('content')


@if($movies_info->trailer_url!="")

 @if(get_player_cong('player_style')!="")  
  <link href="{{ URL::asset('site_assets/videojs_player/css/'.get_player_cong('player_style').'.min.css') }}" rel="stylesheet" type="text/css" />    
 @else
  <link href="{{ URL::asset('site_assets/videojs_player/css/videojs_style1.min.css') }}" rel="stylesheet" type="text/css" />
 @endif

<div class="modal fade stripe-payment-block" id="trailerModel" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
       <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{trans('words.trailer')}}</h4>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_trailer_pop"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
          <p><main>
            
      <div id="container">                   
            <video id="v_player_trailer" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="auto" playsinline width="640" height="450" poster="{{URL::to('/'.$movies_info->video_image)}}" data-setup="{}">
                
                <!-- video source -->
                <source src="{{$movies_info->trailer_url}}" type="video/mp4" label='Auto' res='360' default/>  
           
              <!-- worning text if needed -->
              <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
            </video>          
            </div>       
            
      </main></p>
        </div>
         
      </div>      
    </div>
  </div>
@endif 

 
<!-- Start Page Content Area -->
<div class="page-content-area vfx-item-ptb pt-3">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mb-4"> 
    <div class="detail-poster-area">

     <div class="play-icon-item">
		<a class="icon" href="{{ URL::to('movies/watch/'.$movies_info->video_slug.'/'.$movies_info->id) }}" title="play">
			<i class="icon fa fa-play"></i><span class="ripple"></span>
		</a> 
	 </div>

      <div class="video-post-date">
        <span class="video-posts-author"><i class="fa fa-eye"></i>{{number_format_short($movies_info->views)}} {{trans('words.video_views')}}</span>
        
        @if($movies_info->release_date)           
          <span class="video-posts-author"><i class="fa fa-calendar-alt"></i>{{ isset($movies_info->release_date) ? date('M d Y',$movies_info->release_date) : null }}</span>
        @endif 

        @if($movies_info->duration)          
         <span class="video-posts-author"><i class="fa fa-clock"></i>{{$movies_info->duration}}</span>
        @endif

        @if($movies_info->imdb_rating)           
         <span class="video-imdb-view"><img src="{{URL::to('site_assets/images/imdb-logo.png')}}" alt="imdb-logo" title="imdb-logo" />{{$movies_info->imdb_rating}}</span> 
        @endif        
         
        <div class="video-watch-share-item">
          
          @if(Auth::check()) 
             
             @if(check_watchlist(Auth::user()->id,$movies_info->id,'Movies'))
              <span class="btn-watchlist"><a href="{{URL::to('watchlist/remove')}}?post_id={{$movies_info->id}}&post_type=Movies" title="watchlist"><i class="fa fa-check"></i>{{trans('words.remove_from_watchlist')}}</a></span>
             @else               
              <span class="btn-watchlist"><a href="{{URL::to('watchlist/add')}}?post_id={{$movies_info->id}}&post_type=Movies" title="watchlist"><i class="fa fa-plus"></i>{{trans('words.add_to_watchlist')}}</a></span>
             @endif  
          @else
             <span class="btn-watchlist"><a href="{{URL::to('watchlist/add')}}?post_id={{$movies_info->id}}&post_type=Movies" title="watchlist"><i class="fa fa-plus"></i>{{trans('words.add_to_watchlist')}}</a></span>
          @endif 

          <span class="btn-share"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#social-media"><i class="fas fa-share-alt mr-5"></i>{{trans('words.share_text')}}</a></span>
           
        </div>        
      </div>

      <!-- Start Social Media Icon Popup -->
          <div id="social-media" class="modal fade centered-modal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content bg-dark-2 text-light">
              <div class="modal-header">
              <h4 class="modal-title text-white">{{trans('words.share_text')}}</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-4">
              <div class="social-media-modal">
                <ul>
                  <li><a title="Sharing" href="https://www.facebook.com/sharer/sharer.php?u={{share_url_get('movies',$movies_info->video_slug,$movies_info->id)}}" class="facebook-icon" target="_blank"><i class="ion-social-facebook"></i></a></li>
                  <li><a title="Sharing" href="https://twitter.com/intent/tweet?text={{$movies_info->video_title}}&amp;url={{share_url_get('movies',$movies_info->video_slug,$movies_info->id)}}" class="twitter-icon" target="_blank"><i class="ion-social-twitter"></i></a></li>
                  <li><a title="Sharing" href="https://www.instagram.com/?url={{share_url_get('movies',$movies_info->video_slug,$movies_info->id)}}" class="instagram-icon" target="_blank"><i class="ion-social-instagram"></i></a></li>
                   <li><a title="Sharing" href="https://wa.me?text={{share_url_get('movies',$movies_info->video_slug,$movies_info->id)}}" class="whatsapp-icon" target="_blank"><i class="ion-social-whatsapp"></i></a></li>
                </ul>
              </div>        
              </div>
            </div>
            </div>
          </div>
          <!-- End Social Media Icon Popup -->
      
      <div class="dtl-poster-img">
        <img src="{{URL::to('/'.$movies_info->video_image)}}" alt="{{stripslashes($movies_info->video_title)}}" title="{{stripslashes($movies_info->video_title)}}" />
      </div>
    </div>
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-4"> 
      <div class="poster-dtl-item">
      <h2><a href="{{ URL::to('movies/watch/'.$movies_info->video_slug.'/'.$movies_info->id) }}" title="{{stripslashes($movies_info->video_title)}}">{{stripslashes($movies_info->video_title)}}</a></h2>
      <ul class="dtl-list-link">
        @foreach(explode(',',$movies_info->movie_genre_id) as $genres_ids)
        <li><a href="{{ URL::to('movies?genre_id='.$genres_ids) }}" title="{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}">{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}</a></li>
        @endforeach  
        <li>
          <a href="{{ URL::to('movies?lang_id='.$movies_info->movie_lang_id) }}" title="{{App\Language::getLanguageInfo($movies_info->movie_lang_id,'language_name')}}">{{App\Language::getLanguageInfo($movies_info->movie_lang_id,'language_name')}}</a>
        </li>
          
        @if($movies_info->content_rating) 
                        
        <li><span class="channel_info_count">{{$movies_info->content_rating}}</span></li>
               
        @endif 

        
      </ul>
 
       @if($movies_info->trailer_url!="")
          <div class="video-watch-share-item mb-3">          
            <div class="subscribe-btn-item" style="margin-left:0px !important">
                <a href="Javascript::void()" data-bs-toggle="modal" data-bs-target="#trailerModel" title="{{trans('words.watch_triler')}}"><i class="fa fa-play-circle"></i> {{trans('words.watch_triler')}}</a>
            </div>                
          </div>
       @endif

      
      @if(!is_null($movies_info->actor_id)>0)
          
        <span class="des-bold-text"><strong>{{trans('words.actors')}}:</strong> 
          <?php $a = ''; $n = count(explode(',',$movies_info->actor_id));?>
          @foreach(explode(',',$movies_info->actor_id) as $i => $actor_ids)
          <a href="{{ URL::to('actors/'.App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_slug')) }}/{{$actor_ids}}" title="actors">{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}</a><?php if (($i+1) != $n) echo $a = ',';?>

          @endforeach

        </span>
          
      @endif

      @if(!is_null($movies_info->director_id)>0)
      <span class="des-bold-text"><strong>{{trans('words.directors')}}:</strong> 

              <?php $a = ''; $n = count(explode(',',$movies_info->director_id));?>
              @foreach(explode(',',$movies_info->director_id) as $i =>$director_ids)
              <a href="{{ URL::to('directors/'.App\ActorDirector::getActorDirectorInfo($director_ids,'ad_slug')) }}/{{$director_ids}}" title="directors">{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}</a><?php if (($i+1) != $n) echo $a = ',';?>

              @endforeach

      </span>
      @endif
       
      <h3>{!!strip_tags(Str::limit(stripslashes($movies_info->video_description),350))!!}</h3>
       
      </div>
    </div>
    </div>
    <!-- Start Popular Videos --> 
    
    <!-- Start You May Also Like Video Carousel -->
    <div class="row">
    <div class="video-carousel-area vfx-item-ptb related-video-item">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
        <div class="vfx-item-section">
          <h3>{{trans('words.you_may_like')}}</h3>
            
        </div>
        <div class="video-carousel owl-carousel">
          @foreach($related_movies_list as $movies_data) 
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
    </div>  
    <!-- End You May Also Like Video Carousel -->       
  </div>
</div>
<!-- End Page Content Area --> 

@if($movies_info->trailer_url!="")

<script src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1"></script>

<script src="{{ URL::asset('site_assets/videojs_player/js/videojs.min.js') }}"></script>

<script src="{{ URL::asset('site_assets/videojs_player/plugins/videojs.pip.js') }}"></script> 

 <!--<script src="https://cdn.jsdelivr.net/npm/@silvermine/videojs-chromecast@1.2.1/dist/silvermine-videojs-chromecast.min.js"></script> -->

 <script src="{{ URL::asset('site_assets/videojs_player/plugins/videojs-chromecast.min.js') }}"></script>

<!-- Trailer -->
<script type="text/javascript">
  var player_trailer = videojs('v_player_trailer',{techOrder:['chromecast','html5']});
    
        player_trailer.viavi({
            shareMenu: false,
            @if(get_player_cong('player_watermark')=="ON")
            logo: "{{ get_player_cong('player_logo')? URL::asset('/'.get_player_cong('player_logo')) : URL::asset('/'.getcong('site_logo')) }}",
            logoposition: '{{get_player_cong('player_logo_position')}}',
            logourl: '{{ get_player_cong('player_url')?get_player_cong('player_url'):URL::to('/') }}',
            @endif

            video_id: 'trailer{{$movies_info->id}}',
            resume: true,
            contextMenu: false,
            @if(get_player_cong('rewind_forward')=="ON")
            buttonRewind: true,
            buttonForward: true,            
          @else
          buttonRewind: false,
          buttonForward: false,
          @endif            
            mousedisplay:true,
            textTrackSettings: false,             
          theaterButton: false
           
        }); 

 
</script>
<!-- End Trailer --> 
@endif

@endsection