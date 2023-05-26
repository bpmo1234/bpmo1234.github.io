@extends('site_app')

@section('head_title', trans('words.shows_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

@if(count($slider)!=0)
  @include("pages.shows.slider")  
@endif

<!-- Start View All Shows -->
<div class="view-all-video-area view-shows-list-item vfx-item-ptb">
  <div class="container-fluid">
   <div class="filter-list-area">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title-item">{{trans('words.shows_text')}}</div>       
        <div class="custom_select_filter">
          <select class="selectpicker show-menu-arrow" id="filter_by_lang">
            <option value="">{{trans('words.languages')}}</option>
            @foreach(\App\Language::where('status','1')->orderBy('id')->get() as $lang_data)
              <option value="{{ URL::to('shows/?lang_id='.$lang_data->id) }}" @if(isset($_GET['lang_id']) && $_GET['lang_id']==$lang_data->id ) selected @endif>{{stripslashes($lang_data->language_name)}}</option>
            @endforeach
             
          </select>     
        </div>
        <div class="custom_select_filter">
          <select class="selectpicker show-menu-arrow" id="filter_by_genre">
            <option value="">{{trans('words.genres_text')}}</option>
            @foreach(\App\Genres::where('status','1')->orderBy('id')->get() as $genres_data)
            <option value="{{ URL::to('shows/?genre_id='.$genres_data->id) }}" @if(isset($_GET['genre_id']) && $_GET['genre_id']==$genres_data->id ) selected @endif>{{stripslashes($genres_data->genre_name)}}</option>
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
         @foreach($series_list as $series_data)    
         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="single-video">
            <a href="{{ URL::to('shows/details/'.$series_data->series_slug.'/'.$series_data->id) }}" title="{{$series_data->series_name}}">
               <div class="video-img">          
                
                @if($series_data->series_access=="Paid")       
                <div class="vid-lab-premium">
                  <img src="{{ URL::asset('site_assets/images/ic-premium.png') }}" alt="premium" title="premium">
                </div> 
                @endif             

                <img src="{{URL::to('/'.$series_data->series_poster)}}" alt="{{$series_data->series_name}}" title="{{$series_data->series_name}}">         
               </div>
               <div class="season-title-item">
                <h3>{{Str::limit(stripslashes($series_data->series_name),30)}}</h3>
               </div> 
            </a>
          </div>
             </div>
         @endforeach                       
      </div>    
    <div class="col-xs-12"> 
      @include('_particles.pagination', ['paginator' => $series_list])    
    </div>
   </div>
</div>
<!-- End View All Shows -->
 
@endsection