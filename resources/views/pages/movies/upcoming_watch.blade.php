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

 @if(get_player_cong('player_style')!="")  
  <link href="{{ URL::asset('site_assets/videojs_player/css/'.get_player_cong('player_style').'.min.css') }}" rel="stylesheet" type="text/css" />    
 @else
  <link href="{{ URL::asset('site_assets/videojs_player/css/videojs_style1.min.css') }}" rel="stylesheet" type="text/css" />
 @endif
   
<!-- Start Page Content Area -->
<div class="page-content-area vfx-item-ptb pt-0">
   <div class="container-fluid bg-dark video-player-base">	
	  <div class="row">
		  <div class="col-lg-12 col-md-12 col-sm-12">
			  <div class="video-posts-video">				  
				  <video id="v_player" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="auto" playsinline width="640" height="450" poster="{{URL::to('/'.$movies_info->video_image)}}" data-setup="{}" @if(get_player_cong('autoplay')=="true")autoplay="true"@endif>					  
					  <!-- video source -->
					  <source src="{{$movies_info->trailer_url}}" type="video/mp4" label='Auto' res='360' default/>   
					  <!-- worning text if needed -->
					  <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
				  </video>				  
			  </div>
		  </div>
	  </div> 	
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <!-- Start Video Post -->
        <div class="video-post-wrapper">       
		  <div class="row mt-30">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="video-posts-data mt-0 mb-0">
					<div class="video-post-info">
					<h2>{{stripslashes($movies_info->video_title)}}</h2>
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
					</div>
				<ul class="actor-video-link">
				  @foreach(explode(',',$movies_info->movie_genre_id) as $genres_ids)
				  <li><a href="{{ URL::to('movies?genre_id='.$genres_ids) }}" title="{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}">{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}</a></li>
				  @endforeach
				  <li><a href="{{ URL::to('movies?lang_id='.$movies_info->movie_lang_id) }}" title="{{App\Language::getLanguageInfo($movies_info->movie_lang_id,'language_name')}}">{{App\Language::getLanguageInfo($movies_info->movie_lang_id,'language_name')}}</a></li>           
				</ul>
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
          
          <!-- Start Social Media Icon Popup -->
          <div id="social-media" class="modal fade centered-modal in" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
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
          
				</div>
			  </div>
			</div>
		  </div>
	   </div>            
       <div class="vfx-tabs-item mt-30">
        <input checked="checked" id="tab1" type="radio" name="pct" />
        <input id="tab2" type="radio" name="pct" />
        <input id="tab3" type="radio" name="pct" />
        <nav>
        <ul>
          <li class="tab1">
          <label for="tab1">{{trans('words.description')}}</label>
          </li>
          <li class="tab2">
          <label for="tab2">{{trans('words.actors')}}</label>
          </li>
          <li class="tab3">
          <label for="tab3">{{trans('words.directors')}}</label>
          </li>
        </ul>
        </nav>
        <section class="tabs_item_block">
        <div class="tab1">
          <div class="description-detail-item">
           
            <p>{!!stripslashes($movies_info->video_description)!!}</p>
          
          </div>
        </div>
        <div class="tab2">
          <div class="row">
          @foreach(explode(',',$movies_info->actor_id) as $i => $actor_ids)
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
            <div class="actors-member-item"> 
              <a href="{{ URL::to('actors/'.App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_slug')) }}/{{$actor_ids}}" title="actors details"> 
                @if(App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_image')) 
                <img src="{{URL::to('/'.App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_image'))}}" alt="{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}" title="{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}">  
                @else
                  <img src="{{URL::to('images/user_icon.png')}}" alt="{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}" title="{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}"> 
                @endif
                
                
                <span>{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}</span> 
              </a>
            </div>
          </div>
          @endforeach
          </div>
          
        </div>
        <div class="tab3">
            
            <div class="row">
          @foreach(explode(',',$movies_info->director_id) as $i => $director_ids)
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
            <div class="actors-member-item"> 
              <a href="{{ URL::to('directors/'.App\ActorDirector::getActorDirectorInfo($director_ids,'ad_slug')) }}/{{$director_ids}}" title="directors details"> 
                @if(App\ActorDirector::getActorDirectorInfo($director_ids,'ad_image')) 
                <img src="{{URL::to('/'.App\ActorDirector::getActorDirectorInfo($director_ids,'ad_image'))}}" alt="{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}" title="{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}"> 
                @else
                  <img src="{{URL::to('images/user_icon.png')}}" alt="{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}" title="{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}"> 
                @endif

                <span>{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}</span> 
              </a>
            </div>
          </div>
          @endforeach
          </div>

        </div>

        </section>
      </div>
        </div>    
      </div>
      <!-- Start Popular Videos --> 
    
    <!-- Start You May Also Like Video Carousel -->
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
    <!-- End You May Also Like Video Carousel -->   
    </div>
  </div>
</div>
<!-- End Page Content Area --> 


@if($movies_info->video_type!="Embed" OR $movies_info->trailer_url!="")

<script src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1"></script>

<script src="{{ URL::asset('site_assets/videojs_player/js/videojs.min.js') }}"></script>

<script src="{{ URL::asset('site_assets/videojs_player/plugins/videojs.pip.js') }}"></script> 

 <!--<script src="https://cdn.jsdelivr.net/npm/@silvermine/videojs-chromecast@1.2.1/dist/silvermine-videojs-chromecast.min.js"></script> -->

 <script src="{{ URL::asset('site_assets/videojs_player/plugins/videojs-chromecast.min.js') }}"></script>
  
 <script>
        var player = videojs('v_player',{techOrder:['chromecast','html5']});
    
        player.viavi({
            shareMenu: false,
            @if(get_player_cong('player_watermark')=="ON")
            logo: "{{ get_player_cong('player_logo')? URL::asset('/'.get_player_cong('player_logo')) : URL::asset('/'.getcong('site_logo')) }}",
            logoposition: '{{get_player_cong('player_logo_position')}}',
            logourl: '{{ get_player_cong('player_url')?get_player_cong('player_url'):URL::to('/') }}',
            @endif

            video_id: 'movie{{$movies_info->id}}',
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
            textTrackSettings: false             
        });

        player.pip();

        
        player.chromecast({ metatitle: '{{stripslashes($movies_info->video_title)}}', metasubtitle: 'Release : {{ isset($movies_info->release_date) ? date('M d Y',$movies_info->release_date) : null }}' });         
      
      @if(get_player_cong('player_ad_on_off')=="ON")           
        player.vroll({src:"{{get_player_cong('ad_video_url')}}",type:"video/mp4",href:"{{get_player_cong('ad_web_url')}}",offset:"{{get_player_cong('ad_offset')}}",skip:"{{get_player_cong('ad_skip')}}",id:1});
        @endif


         player.on('vroll', function(event, data) {
            var ad_id = data.id;
            var action = data.action;

            //alert(ad_id);
            //alert(action);

           });

         player.on('mode',function(event,mode) {
      if(mode=='large'){
        document.querySelector("#left_video_player").style.width='100%';
        document.querySelector("#right_sidebar_hide").style.display='none';
        document.querySelector("#theater_mode_width").style.width='66%';
        
      }else{
        document.querySelector("#left_video_player").style.width='';
        document.querySelector("#right_sidebar_hide").style.display='block';
        document.querySelector("#theater_mode_width").style.width='100%';
      }
    });
      
     player.ready(function(){
     var player_ = this;
     var show_on_start =true;
     var close_delay=5;
     var parent = this.el().parentNode;
     console.log(parent.id);
     var closeBtn = parent.querySelector('.over-close');
     var overlay = parent.querySelector('.div-over');
     var timer;
     function delay() {
      clearTimeout(timer);
      if(parseInt(close_delay)>0) {
        closeBtn.innerHTML=close_delay;
        var timer =window.setTimeout(delay, 1000);
        close_delay--;
      } else {
        closeBtn.innerHTML='';
        closeBtn.className='over-close';
      }
     }
     function showOverlay() {
      console.log('delay:'+close_delay);
      if(parseInt(close_delay)>0) {
        delay();
      } else {
        closeBtn.className = 'over-close';
      }
      overlay.style.display='block';
     }

     closeBtn.addEventListener('click',function(e) {
      overlay.style.display='none';
      player_.play();
     }, false);

     this.on("pause", function(){
      if (!this.seeking() && this.paused()) {
        // Show overlay
        showOverlay();
      }
     });

     this.on('play', function(e) {
      // Hide overlay
      overlay.style.display='none';
     });
     if(show_on_start) {
      this.pause(); showOverlay();
     } else {
      overlay.style.display='none';
     }
  });
         
    </script>

        
    <!-- hotkeys -->
    <script src="{{ URL::asset('site_assets/videojs_player/plugins/hotkeys/videojs.hotkeys.min.js') }}"></script>
    <script>    
      player.ready(function() {
        this.hotkeys({
            volumeStep: 0.1,
      seekStep: 5,
      alwaysCaptureHotkeys: true
        });
      });
    </script>
    <!-- End hotkeys --> 

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