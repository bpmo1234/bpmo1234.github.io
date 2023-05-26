@extends('site_app')

@section('head_title', $home_section->section_name.' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url({{ URL::asset('site_assets/images/breadcrum-bg.jpg') }})">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12"> 
          <h2>{{stripslashes($home_section->section_name)}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ URL::to('/') }}" title="{{trans('words.home')}}">{{trans('words.home')}}</a></li>
              <li>{{stripslashes($home_section->section_name)}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
<!-- End Breadcrumb --> 

<!-- Start Sports -->
<div class="view-all-video-area vfx-item-ptb">
  <div class="container-fluid">
      
     <div class="row">
        @foreach(explode(",",$home_section->sport_ids) as $sport_data)
         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="single-video">
             <a href="{{ URL::to('sports/details/'.App\Sports::getSportsInfo($sport_data,'video_slug').'/'.$sport_data) }}" title="{{App\Sports::getSportsInfo($sport_data,'video_title')}}">
                <div class="video-img">       
                   @if(App\Sports::getSportsInfo($sport_data,'video_access')=="Paid")
                   <div class="vid-lab-premium"><img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium"></div> 
                   @endif   
                 <span class="video-item-content">{{App\Sports::getSportsInfo($sport_data,'video_title')}}</span>
                 <img src="{{URL::to('/'.App\Sports::getSportsInfo($sport_data,'video_image'))}}" alt="{{App\Sports::getSportsInfo($sport_data,'video_title')}}" title="{{App\Sports::getSportsInfo($sport_data,'video_title')}}" />         
                </div>                          
             </a>
           </div>
         </div>
        @endforeach 
      </div>   
 
   </div>
</div>
<!-- End Sports --> 

   
@endsection