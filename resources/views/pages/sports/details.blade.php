@extends('site_app')
 

@if($sports_info->seo_title)
  @section('head_title', stripslashes($sports_info->seo_title).' | '.getcong('site_name'))
@else
  @section('head_title', stripslashes($sports_info->video_title).' | '.getcong('site_name') )
@endif

@if($sports_info->seo_description)
  @section('head_description', stripslashes($sports_info->seo_description))
@else
  @section('head_description', Str::limit(stripslashes($sports_info->video_description),160))
@endif

@if($sports_info->seo_keyword)
  @section('head_keywords', stripslashes($sports_info->seo_keyword)) 
@endif


@section('head_image', URL::to('/'.$sports_info->video_image) )

@section('head_url', Request::url())

@section('content')
 

<!-- Start Page Content Area -->
<div class="page-content-area vfx-item-ptb pt-3">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mb-4"> 
    <div class="detail-poster-area">

     <div class="play-icon-item">
				<a class="icon" href="{{ URL::to('sports/watch/'.$sports_info->video_slug.'/'.$sports_info->id) }}" title="play">
					<i class="icon fa fa-play"></i><span class="ripple"></span>
				</a> 
			</div>

      <div class="video-post-date">
        <span class="video-posts-author"><i class="fa fa-eye"></i>{{number_format_short($sports_info->views)}} {{trans('words.video_views')}}</span>
        
        @if($sports_info->date)           
          <span class="video-posts-author"><i class="fa fa-calendar-alt"></i>{{ isset($sports_info->date) ? date('M d Y',$sports_info->date) : null }}</span>
        @endif 

        @if($sports_info->duration)          
         <span class="video-posts-author"><i class="fa fa-clock"></i>{{$sports_info->duration}}</span>
        @endif
 
        <div class="video-watch-share-item">
          
          @if(Auth::check()) 
             
             @if(check_watchlist(Auth::user()->id,$sports_info->id,'Sports'))
              <span class="btn-watchlist"><a href="{{URL::to('watchlist/remove')}}?post_id={{$sports_info->id}}&post_type=Sports" title="watchlist"><i class="fa fa-check"></i>{{trans('words.remove_from_watchlist')}}</a></span>
             @else               
              <span class="btn-watchlist"><a href="{{URL::to('watchlist/add')}}?post_id={{$sports_info->id}}&post_type=Sports" title="watchlist"><i class="fa fa-plus"></i>{{trans('words.add_to_watchlist')}}</a></span>
             @endif  
          @else
             <span class="btn-watchlist"><a href="{{URL::to('watchlist/add')}}?post_id={{$sports_info->id}}&post_type=Sports" title="watchlist"><i class="fa fa-plus"></i>{{trans('words.add_to_watchlist')}}</a></span>
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
                  <li><a title="Sharing" href="https://www.facebook.com/sharer/sharer.php?u={{share_url_get('sports',$sports_info->video_slug,$sports_info->id)}}" class="facebook-icon" target="_blank"><i class="ion-social-facebook"></i></a></li>
                  <li><a title="Sharing" href="https://twitter.com/intent/tweet?text={{$sports_info->video_title}}&amp;url={{share_url_get('sports',$sports_info->video_slug,$sports_info->id)}}" class="twitter-icon" target="_blank"><i class="ion-social-twitter"></i></a></li>
                  <li><a title="Sharing" href="https://www.instagram.com/?url={{share_url_get('sports',$sports_info->video_slug,$sports_info->id)}}" class="instagram-icon" target="_blank"><i class="ion-social-instagram"></i></a></li>
                   <li><a title="Sharing" href="https://wa.me?text={{share_url_get('sports',$sports_info->video_slug,$sports_info->id)}}" class="whatsapp-icon" target="_blank"><i class="ion-social-whatsapp"></i></a></li>
                </ul>
              </div>        
              </div>
            </div>
            </div>
          </div>
          <!-- End Social Media Icon Popup -->

      <div class="dtl-poster-img">
        <img src="{{URL::to('/'.$sports_info->video_image)}}" alt="{{stripslashes($sports_info->video_title)}}" title="{{stripslashes($sports_info->video_title)}}" />
      </div>
    </div>
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-4"> 
      <div class="poster-dtl-item">
      <h2><a href="{{ URL::to('sports/watch/'.$sports_info->video_slug.'/'.$sports_info->id) }}" title="{{stripslashes($sports_info->video_title)}}">{{stripslashes($sports_info->video_title)}}</a></h2>
      <ul class="dtl-list-link">
         
        <li><a href="{{ URL::to('sports/?cat_id='.$sports_info->sports_cat_id) }}" title="{{App\SportsCategory::getSportsCategoryInfo($sports_info->sports_cat_id,'category_name')}}">{{App\SportsCategory::getSportsCategoryInfo($sports_info->sports_cat_id,'category_name')}}</a></li>
           
      </ul>
      
 
       
      <h3>{!!strip_tags(Str::limit(stripslashes($sports_info->video_description),350))!!}</h3>
       
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
          @foreach($related_sports_list as $sports_data) 
          <div class="single-video">
          <a href="{{ URL::to('sports/details/'.$sports_data->video_slug.'/'.$sports_data->id) }}" title="{{stripslashes($sports_data->video_title)}}">
             <div class="video-img">
              @if($sports_data->video_access =="Paid")       
              <div class="vid-lab-premium">
                <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
              </div> 
              @endif
              <span class="video-item-content">{{stripslashes($sports_data->video_title)}}</span> 
              <img src="{{URL::to('/'.$sports_data->video_image)}}" alt="{{stripslashes($sports_data->video_title)}}" title="{{stripslashes($sports_data->video_title)}}">         
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