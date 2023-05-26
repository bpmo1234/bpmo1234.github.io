@extends("admin.admin_app")

@section("content")

  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12">
              <div class="card-box">
                
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_message') }}
                      </div>
                @endif

                {!! Form::open(array('url' => 'admin/profile','class'=>'form-horizontal','name'=>'profile_form','id'=>'profile_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                  
                  <div class="form-group row pl-2 mb-4">
                         
                        @if(file_exists(public_path('upload/'.Auth::user()->user_image)))                                 
 
                        <img src="{{URL::to('upload/'.Auth::user()->user_image)}}" alt="person" class="img-thumbnail" width="150" />
                        
                        @else
                            
                        <img src="{{ URL::asset('admin_assets/images/users/avatar-10.jpg') }}" alt="person" class="img-thumbnail" width="150"/>
                        
                        @endif               
                                     
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.profile_image')}}</label>
                    <div class="col-sm-8">
                      <input type="file" name="user_image" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.name')}} *</label>
                    <div class="col-sm-8">
                       <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                  </div>                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.email')}} *</label>
                    <div class="col-sm-8">
                       <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.phone')}} </label>
                    <div class="col-sm-8">
                       <input type="text" name="phone" value="{{ isset(Auth::user()->phone) ? Auth::user()->phone : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hori-pass1" class="col-sm-3 col-form-label">{{trans('words.password')}}*</label>
                    <div class="col-sm-8">
                      <input id="hori-pass1" type="password" name="password" class="form-control">
                    </div>
                  </div>                  
                   
                   
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9 pl-1">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> {{trans('words.save')}} </button>                      
                    </div>
                  </div>
                {!! Form::close() !!} 
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

@endsection