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


<!-- Start Page Content Area -->
<div class="page-content-area vfx-item-ptb pt-3">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mb-4"> 
    <div class="detail-poster-area">

      <div class="play-icon-item">
				<a class="icon" href="{{ URL::to('livetv/watch/'.$tv_info->channel_slug.'/'.$tv_info->id) }}" title="play">
					<i class="icon fa fa-play"></i><span class="ripple"></span>
				</a> 
			</div>

      <div class="video-post-date">
        <span class="video-posts-author"><i class="fa fa-eye"></i>{{number_format_short($tv_info->views)}} {{trans('words.video_views')}}</span>
         
 
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

      <div class="dtl-poster-img">
        <img src="{{URL::to('/'.$tv_info->channel_thumb)}}" alt="{{stripslashes($tv_info->channel_name)}}" title="{{stripslashes($tv_info->channel_name)}}" />
      </div>
    </div>
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-4"> 
      <div class="poster-dtl-item">
      <h2><a href="{{ URL::to('livetv/watch/'.$tv_info->channel_slug.'/'.$tv_info->id) }}" title="{{stripslashes($tv_info->channel_name)}}">{{stripslashes($tv_info->channel_name)}}</a></h2>
      <ul class="dtl-list-link">
         
        <li><a href="{{ URL::to('livetv/?cat_id='.$tv_info->channel_cat_id) }}" title="{{App\TvCategory::getTvCategoryInfo($tv_info->channel_cat_id,'category_name')}}">{{App\TvCategory::getTvCategoryInfo($tv_info->channel_cat_id,'category_name')}}</a></li>
           
      </ul>
      
 
       
      <h3>{!!strip_tags(Str::limit(stripslashes($tv_info->channel_description),350))!!}</h3>
       
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
        <div class="tv-season-video-carousel owl-carousel">
          @foreach($related_livetv_list as $related_data) 
          <div class="single-video">
          <a href="{{ URL::to('livetv/details/'.$related_data->channel_slug.'/'.$related_data->id) }}" title="{{stripslashes($related_data->channel_name)}}">
             <div class="video-img">
              @if($related_data->video_access =="Paid")       
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
    </div>  
    <!-- End You May Also Like Video Carousel -->       
  </div>
</div>
<!-- End Page Content Area --> 

@endsection