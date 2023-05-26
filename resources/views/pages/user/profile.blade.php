@extends('site_app')

@section('head_title', trans('words.profile').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url('{{ URL::asset('site_assets/images/breadcrum-bg.jpg') }}')">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12"> 
          <h2>{{trans('words.edit_profile')}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ URL::to('/') }}" title="{{trans('words.home')}}">{{trans('words.home')}}</a></li>
              <li><a href="{{ URL::to('/dashboard') }}" title="{{trans('words.dashboard_text')}}">{{trans('words.dashboard_text')}}</a></li>
              <li>{{trans('words.edit_profile')}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
<!-- End Breadcrumb --> 

<!-- Start Edit Profile -->
<div class="edit-profile-area vfx-item-ptb vfx-item-info">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 offset-lg-2 offset-md-0">
        <div class="edit-profile-form">

           @if (count($errors) > 0)
                <div class="alert alert-danger">                      
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('flash_message'))
                      <div class="alert alert-success">                      
                          {{ Session::get('flash_message') }}
                      </div>
                @endif

           {!! Form::open(array('url' => 'profile','class'=>'row','name'=>'profile_form','id'=>'profile_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
        <label>{{trans('words.name')}}</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
        <label>{{trans('words.email')}}</label>
                <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control"  required>
              </div>
            </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
        <label>{{trans('words.password')}}</label>
                <input type="password" class="form-control" name="password" id="password" value="">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
        <label>{{trans('words.phone')}}</label>
                <input type="number" name="phone" id="phone" value="{{$user->phone}}" class="form-control" >
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
        <label>{{trans('words.address')}}</label>
                <textarea name="user_address" id="user_address" class="form-control" cols="30" rows="4" >{{$user->user_address}}</textarea>
              </div>
            </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="form-group mb-3">
            <label>{{trans('words.profile_image')}}</label>  
            <label class="browse_pic_file">
            <input type="file" id="user_image" name="user_image" aria-label="Profile picture browse" onchange="readURL(this);">
            <span class="browse_file_custom"></span>
            </label>
            <div class="user_pic_view">          
              <div class="fileupload_img">
                @if(Auth::User()->user_image)
                  <img class="fileupload_img" src="{{ URL::asset('upload/'.Auth::User()->user_image) }}"  alt="profile pic" title="profile pic">
                @else  
                <img class="fileupload_img" src="{{ URL::asset('site_assets/images/user-avatar.png') }}" alt="profile pic" title="profile pic">
                @endif
              </div>           
            </div>
          </div>
        </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="form-group d-flex align-items-end flex-column mt-30">
          <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.update')}}</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Edit Profile -->  
 
@endsection