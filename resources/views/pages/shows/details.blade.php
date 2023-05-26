@extends('site_app')
  

@if($series_info->seo_title)
  @section('head_title', stripslashes($series_info->seo_title).' | '.getcong('site_name'))
@else
  @section('head_title', stripslashes($series_info->series_name).' | '.getcong('site_name'))
@endif

@if($series_info->seo_description)
  @section('head_description', stripslashes($series_info->seo_description))
@else
  @section('head_description', Str::limit(stripslashes($series_info->series_info),160))
@endif

@if($series_info->seo_keyword)
  @section('head_keywords', stripslashes($series_info->seo_keyword)) 
@endif


@section('head_image', URL::to('/'.$series_info->series_poster))

@section('head_url', Request::url())

@section('content')

 <!-- Start Page Content Area -->
<div class="page-content-area vfx-item-ptb pt-3">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mb-4"> 
    <div class="detail-poster-area">

    <div class="play-icon-item">

       @if($series_latest_episode!='')  
        <a class="icon" href="{{ URL::to('shows/'.$series_info->series_slug.'/'.$series_latest_episode->video_slug.'/'.$series_latest_episode->id) }}" title="{{$series_info->series_name}}" title="play">
          <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a> 
       @else
       <a class="icon" href="#" title="{{$series_info->series_name}}" title="play">
          <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a> 
       @endif
 
			</div>

      <div class="video-post-date">

        <div class="video-watch-share-item">
          
          @if($series_info->imdb_rating)           
           <span class="video-imdb-view"><img src="{{URL::to('site_assets/images/imdb-logo.png')}}" alt="imdb-logo" title="imdb-logo" />{{$series_info->imdb_rating}}</span> 
          @endif 
           &nbsp;
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
                  <li><a title="Sharing" href="https://www.facebook.com/sharer/sharer.php?u={{share_url_get('shows',$series_info->series_slug,$series_info->id)}}" class="facebook-icon" target="_blank"><i class="ion-social-facebook"></i></a></li>
                  <li><a title="Sharing" href="https://twitter.com/intent/tweet?text={{$series_info->video_title}}&amp;url={{share_url_get('shows',$series_info->series_slug,$series_info->id)}}" class="twitter-icon" target="_blank"><i class="ion-social-twitter"></i></a></li>
                  <li><a title="Sharing" href="https://www.instagram.com/?url={{share_url_get('shows',$series_info->series_slug,$series_info->id)}}" class="instagram-icon" target="_blank"><i class="ion-social-instagram"></i></a></li>
                   <li><a title="Sharing" href="https://wa.me?text={{share_url_get('shows',$series_info->series_slug,$series_info->id)}}" class="whatsapp-icon" target="_blank"><i class="ion-social-whatsapp"></i></a></li>
                </ul>
              </div>        
              </div>
            </div>
            </div>
          </div>
          <!-- End Social Media Icon Popup -->

      <div class="dtl-poster-img">
        <img src="{{URL::to('/'.$series_info->series_poster)}}" alt="tv-series-poster-1" title="{{$series_info->series_name}}" />
      </div>
    </div>
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-4"> 
      <div class="poster-dtl-item">
      
      @if($series_latest_episode!='')  
      <h2><a href="{{ URL::to('shows/'.$series_info->series_slug.'/'.$series_latest_episode->video_slug.'/'.$series_latest_episode->id) }}" title="{{$series_info->series_name}}">{{$series_info->series_name}}</a></h2>
      @else
      <h2><a href="#" title="{{$series_info->series_name}}">{{$series_info->series_name}}</a></h2>
      @endif

      <ul class="dtl-list-link dtl-link-col">
        <li><a href="#" title="Seasons">{{\App\Series::getSeriesTotalSeason($series_info->id)}} Seasons</a></li>
        <li><a href="#" title="Episodes">{{\App\Series::getSeriesTotalEpisodes($series_info->id)}} Episodes</a></li>       
      </ul>
      <ul class="dtl-list-link">
        @foreach(explode(',',$series_info->series_genres) as $genres_ids)
          <li><a href="{{ URL::to('shows?genre_id='.$genres_ids) }}" title="{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}">{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}</a></li>
        @endforeach
         
        <li><a href="{{ URL::to('shows?lang_id='.$series_info->series_lang_id) }}" title="{{\App\Language::getLanguageInfo($series_info->series_lang_id,'language_name')}}">{{\App\Language::getLanguageInfo($series_info->series_lang_id,'language_name')}}</a></li>

        @if($series_info->content_rating) 
                        
        <li><span class="channel_info_count">{{$series_info->content_rating}}</span></li>
               
        @endif

      </ul>
      @if(!is_null($series_info->actor_id)>0)
          
        <span class="des-bold-text"><strong>{{trans('words.actors')}}:</strong> 
          <?php $a = ''; $n = count(explode(',',$series_info->actor_id));?>
          @foreach(explode(',',$series_info->actor_id) as $i => $actor_ids)
          <a href="{{ URL::to('actors/'.App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_slug')) }}/{{$actor_ids}}" title="actors">{{App\ActorDirector::getActorDirectorInfo($actor_ids,'ad_name')}}</a><?php if (($i+1) != $n) echo $a = ',';?>

          @endforeach

        </span>
          
      @endif

      @if(!is_null($series_info->director_id)>0)
      <span class="des-bold-text"><strong>{{trans('words.directors')}}:</strong> 

              <?php $a = ''; $n = count(explode(',',$series_info->director_id));?>
              @foreach(explode(',',$series_info->director_id) as $i =>$director_ids)
              <a href="{{ URL::to('directors/'.App\ActorDirector::getActorDirectorInfo($director_ids,'ad_slug')) }}/{{$director_ids}}" title="directors">{{App\ActorDirector::getActorDirectorInfo($director_ids,'ad_name')}}</a><?php if (($i+1) != $n) echo $a = ',';?>

              @endforeach

      </span>
      @endif
      <h3>{!!strip_tags(Str::limit(stripslashes($series_info->series_info),350))!!}</h3>
      </div>
    </div>
    </div>
    <!-- Start Popular Videos --> 
    
    <!-- Start Season Video Carousel -->
    <div class="row">
     <div class="video-shows-section vfx-item-ptb tv-season-related-block">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
        <div class="vfx-item-section">
          <h3>{{trans('words.seasons_text')}}</h3>           
        </div>
        <div class="tv-season-video-carousel owl-carousel">
          @foreach($season_list as $season_data)
          <div class="single-video">
          <a href="{{ URL::to('shows/'.$series_info->series_slug.'/seasons/'.$season_data->season_slug.'/'.$season_data->id) }}" title="{{stripslashes($season_data->season_name)}}">
             <div class="video-img">  
              <img src="{{URL::to('/'.$season_data->season_poster)}}" alt="{{$season_data->season_name}}" alt="{{stripslashes($season_data->season_name)}}" title="{{stripslashes($season_data->season_name)}}">         
             </div>
             <div class="season-title-item">
              <h3>{{stripslashes($season_data->season_name)}}</h3>
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
<!-- End Page Content Area --> 
 
@endsection