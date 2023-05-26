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

<!-- Start Shows -->
<div class="view-all-video-area vfx-item-ptb">
  <div class="container-fluid">
     
     <div class="row">
        @foreach(explode(",",$home_section->show_ids) as $show_data)
         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="single-video">
                    <a href="{{ URL::to('shows/details/'.App\Series::getSeriesInfo($show_data,'series_slug').'/'.$show_data) }}" title="{{App\Series::getSeriesInfo($show_data,'series_name')}}">
                     <div class="video-img"> 
                             
                      <div class="vid-lab-premium"><img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium"></div> 
                       
                      <span class="video-item-content">{{App\Series::getSeriesInfo($show_data,'series_name')}}</span> 
                      <img src="{{URL::to('/'.App\Series::getSeriesInfo($show_data,'series_poster'))}}" alt="{{App\Series::getSeriesInfo($show_data,'series_name')}}" title="{{App\Series::getSeriesInfo($show_data,'series_name')}}">         
                     </div>       
                  </a>
                </div>
         </div>
        @endforeach 
      </div>   
 
   </div>
</div>
<!-- End Shows --> 

   
@endsection