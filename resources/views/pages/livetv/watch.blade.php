@extends('site_app')
 

@if($tv_info->seo_title)
  @section('head_title', stripslashes($tv_info->seo_title).' | '.getcong('site_name'))
@else
  @section('head_title', stripslashes($tv_info->channel_name).' | '.getcong('site_name') )
@endif

@if($tv_info->seo_description)
  @section('head_description', stripslashes($tv_info->seo_description))
@else
  @section('head_description', Str::limit(stripslashes($tv_info->channel_description),160))
@endif

@if($tv_info->seo_keyword)
  @section('head_keywords', stripslashes($tv_info->seo_keyword)) 
@endif


@section('head_image', URL::to('/'.$tv_info->channel_thumb) )

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
          @if($tv_info->channel_url_type=="embed")

              @include("pages.livetv.player.embed")

          @elseif($tv_info->channel_url_type=="hls")

              @include("pages.livetv.player.hls")

          @elseif($tv_info->channel_url_type=="dash")
              
              @include("pages.livetv.player.dash")
          
          @else
              
              <?php 
            parse_str( parse_url( $tv_info->channel_url, PHP_URL_QUERY ), $my_array_of_vars );

            $youtube_id=$my_array_of_vars['v'];
            ?>
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$youtube_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

          @endif       
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
            <h2>{{stripslashes($tv_info->channel_name)}}</h2>
            <div class="video-post-date">
                <span class="video-posts-author"><i class="fa fa-eye"></i>{{number_format_short($tv_info->views)}} {{trans('words.video_views')}}</span>
                
            </div>
        <ul class="actor-video-link">           
          <li><a href="{{ URL::to('livetv/?cat_id='.$tv_info->channel_cat_id) }}" title="{{App\TvCategory::getTvCategoryInfo($tv_info->channel_cat_id,'category_name')}}">{{App\TvCategory::getTvCategoryInfo($tv_info->channel_cat_id,'category_name')}}</a></li>           
        </ul>
        
        @if($tv_info->channel_url2!='' OR $tv_info->channel_url3!='')
        <div class="video-watch-share-item server-btn-list">
                @if($tv_info->channel_url2!='' OR $tv_info->channel_url3!='')
                <div class="server-btn-item">
                  <a href="{{ URL::to('livetv/watch/'.$tv_info->channel_slug.'/'.$tv_info->id) }}" title="server"><i class="fa fa-tv"></i> {{trans('words.server_1')}}</a>
                </div>
                @endif
                 
              @if($tv_info->channel_url2)

               <div class="server-btn-item">
                  <a href="{{ URL::to('livetv/watch/'.$tv_info->channel_slug.'/'.$tv_info->id) }}?server=2" title="server"><i class="fa fa-tv"></i> {{trans('words.server_2')}}</a>
                </div>
 
              @endif
              @if($tv_info->channel_url3)
              <div class="server-btn-item">
                  <a href="{{ URL::to('livetv/watch/'.$tv_info->channel_slug.'/'.$tv_info->id) }}?server=3" title="server"><i class="fa fa-tv"></i> {{trans('words.server_3')}}</a>
                </div>
              
              @endif
        </div> 
        @endif
        <div class="video-watch-share-item">
          @if(Auth::check()) 
             
             @if(check_watchlist(Auth::user()->id,$tv_info->id,'LiveTV'))
              <span class="btn-watchlist"><a href="{{URL::to('watchlist/remove')}}?post_id={{$tv_info->id}}&post_type=LiveTV" title="watchlist"><i class="fa fa-check"></i>{{trans('words.remove_from_watchlist')}}</a></span>
             @else               
              <span class="btn-watchlist"><a href="{{URL::to('watchlist/add')}}?post_id={{$tv_info->id}}&post_type=LiveTV" title="watchlist"><i class="fa fa-plus"></i>{{trans('words.add_to_watchlist')}}</a></span>
             @endif  
          @else
             <span class="btn-watchlist"><a href="{{URL::to('watchlist/add')}}?post_id={{$tv_info->id}}&post_type=LiveTV" title="watchlist"><i class="fa fa-plus"></i>{{trans('words.add_to_watchlist')}}</a></span>
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
                  <li><a title="Sharing" href="https://www.facebook.com/sharer/sharer.php?u={{share_url_get('livetv',$tv_info->channel_slug,$tv_info->id)}}" class="facebook-icon" target="_blank"><i class="ion-social-facebook"></i></a></li>
                  <li><a title="Sharing" href="https://twitter.com/intent/tweet?text={{$tv_info->channel_name}}&amp;url={{share_url_get('livetv',$tv_info->channel_slug,$tv_info->id)}}" class="twitter-icon" target="_blank"><i class="ion-social-twitter"></i></a></li>
                  <li><a title="Sharing" href="https://www.instagram.com/?url={{share_url_get('livetv',$tv_info->channel_slug,$tv_info->id)}}" class="instagram-icon" target="_blank"><i class="ion-social-instagram"></i></a></li>
                   <li><a title="Sharing" href="https://wa.me?text={{share_url_get('livetv',$tv_info->channel_slug,$tv_info->id)}}" class="whatsapp-icon" target="_blank"><i class="ion-social-whatsapp"></i></a></li>
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
        </ul>
        </nav>
        <section class="tabs_item_block">
        <div class="tab1">
          <div class="description-detail-item">
           
            <p>{!!stripslashes($tv_info->channel_description)!!}</p>
          
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
        <div class="tv-season-video-carousel owl-carousel">
           
           @foreach($related_livetv_list as $related_data) 
          <div class="single-video">
          <a href="{{ URL::to('livetv/details/'.$related_data->channel_slug.'/'.$related_data->id) }}" title="{{stripslashes($related_data->channel_name)}}">
             <div class="video-img">          
               
              @if($related_data->channel_access =="Paid")       
              <div class="vid-lab-premium">
                <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
              </div> 
              @endif  

              <span class="video-item-content">{{stripslashes($related_data->channel_name)}}</span> 
              <img src="{{URL::to('/'.$related_data->channel_thumb)}}" alt="{{stripslashes($related_data->channel_name)}}" title="{{stripslashes($related_data->channel_name)}}">         
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


@if($tv_info->channel_url_type!="Embed")

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

            video_id: 'livetv{{$tv_info->id}}',
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

        
        player.chromecast({ metatitle: '{{stripslashes($tv_info->video_title)}}', metasubtitle: 'Release : {{ isset($tv_info->date) ? date('M d Y',$tv_info->date) : null }}' });         
      
      @if(get_player_cong('player_ad_on_off')=="ON")           
        player.vroll({src:"{{URL::to('/'.get_player_cong('ad_video_url'))}}",type:"video/mp4",href:"{{get_player_cong('ad_web_url')}}",offset:"{{get_player_cong('ad_offset')}}",skip:"{{get_player_cong('ad_skip')}}",id:1});
        @endif


         player.on('vroll', function(event, data) {
            var ad_id = data.id;
            var action = data.action;

            //alert(ad_id);
            //alert(action);

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
 

 @endif

@endsection