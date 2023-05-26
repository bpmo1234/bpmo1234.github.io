@extends('site_app')

@section('head_title', trans('words.sports_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
@if(count($slider)!=0)
  @include("pages.sports.slider")  
@endif

<!-- Start View All Sports -->
<div class="view-all-video-area vfx-item-ptb">
  <div class="container-fluid">
   <div class="filter-list-area">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title-item">{{trans('words.sports_text')}}</div>       
        <div class="custom_select_filter">
          <select class="selectpicker show-menu-arrow" id="filter_by_lang">
            <option value="">{{trans('words.category')}}</option>
            @foreach(\App\SportsCategory::where('status','1')->orderBy('id')->get() as $cat_data)
              <option value="{{ URL::to('sports/?cat_id='.$cat_data->id) }}" @if(isset($_GET['cat_id']) && $_GET['cat_id']==$cat_data->id ) selected @endif>{{stripslashes($cat_data->category_name)}}</option>
            @endforeach
             
          </select>     
        </div>
         
        <div class="custom_select_filter">
          <select class="selectpicker show-menu-arrow" id="filter_list" required>
            <option value="?filter=new" @if(isset($_GET['filter']) && $_GET['filter']=='new' ) selected @endif>{{trans('words.newest')}}</option>
            <option value="?filter=old" @if(isset($_GET['filter']) && $_GET['filter']=='old' ) selected @endif>{{trans('words.oldest')}}</option>
            <option value="?filter=alpha" @if(isset($_GET['filter']) && $_GET['filter']=='alpha' ) selected @endif>{{trans('words.a_to_z')}}</option>
            <option value="?filter=rand" @if(isset($_GET['filter']) && $_GET['filter']=='rand' ) selected @endif>{{trans('words.random')}}</option>
          </select>     
        </div>    
      </div>
    </div>
   </div>
    
    <div class="row">
     
         
         @foreach($sports_video_list as $sports_video)    
         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-6">
          <div class="single-video">
            <a href="{{ URL::to('sports/details/'.$sports_video->video_slug.'/'.$sports_video->id) }}" title="{{$sports_video->video_title}}">
               <div class="video-img">          
                
                @if($sports_video->video_access=="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="ic-premium" title="ic-premium">
                </div> 
                @endif             

                <img src="{{URL::to('/'.$sports_video->video_image)}}" title="{{$sports_video->video_title}}" alt="{{$sports_video->video_title}}">         
               </div>
               <div class="season-title-item">
                <h3 class="mb-0">{{Str::limit(stripslashes($sports_video->video_title),20)}}</h3>
               </div> 
            </a>
          </div>
             </div>
         @endforeach            
       
    
      </div>    

    <div class="col-xs-12"> 

      @include('_particles.pagination', ['paginator' => $sports_video_list])

     
   </div>
   </div>
</div>
<!-- End View All Sports -->
 
@endsection