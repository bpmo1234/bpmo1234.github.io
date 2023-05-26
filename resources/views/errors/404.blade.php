@extends('site_app')

@section('head_title', 'Page Not Found | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
  
<div class="main-wrap">
  <div class="section">
    <div class="container">
      <div class="row section-padding" style="text-align:center;padding:80px 0;">
        <span><img src="{{ URL::asset('site_assets/images/404.png') }}"></span>
        <h5 class="mb-4">The Page you are Looking for Not Avaible!</h5>
        <a href="{{ URL::to('/') }}" class="vfx-item-btn-danger page-note-found text-uppercase">Go to Home</a>
      </div>      
    </div>
  </div>
</div>

@endsection