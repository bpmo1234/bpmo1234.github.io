@extends("admin.admin_app")

@section("content")

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
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
                

                 {!! Form::open(array('url' => array('admin/sub_admin/add_edit_user'),'class'=>'form-horizontal','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : null }}">
 
                   
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.name')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="name" value="{{ isset($user->name) ? $user->name : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.email')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.password')}}*</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" value="" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.phone')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="phone" value="{{ isset($user->phone) ? $user->phone : null }}" class="form-control">
                    </div>
                  </div>
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.image')}}</label>
                    <div class="col-sm-8">
                      <input type="file" name="user_image" class="form-control">                     
                    </div>
                  </div>

                  @if(isset($user->user_image) AND file_exists(public_path('upload/'.$user->user_image))) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="{{URL::to('upload/'.$user->user_image)}}" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  @endif                  
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.admin_type')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="usertype" id="admin_usertype">                               
                                <option value="Sub_Admin" @if(isset($user->usertype) AND $user->usertype=="Sub_Admin") selected @endif>Sub Admin</option>
                                <option value="Admin" @if(isset($user->usertype) AND $user->usertype=="Admin") selected @endif>Master Admin</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">&nbsp;</label>
                      <div class="col-sm-8">
                        <p id="sub_admin_id" @if(isset($user->usertype) AND $user->usertype!="Sub_Admin") style="display:none;" @endif> Permission for Sub Admin<small id="emailHelp" class="form-text text-muted">({{trans('words.language_text')}}, {{trans('words.genres_text')}}, {{trans('words.movies_text')}}, {{trans('words.tv_shows_text')}}, {{trans('words.seasons_text')}}, {{trans('words.episodes_text')}}, {{trans('words.sports_cat_text')}}, {{trans('words.sports_video_text')}}, {{trans('words.slider')}}, {{trans('words.home_section')}})</small></p>

                        <p id="master_admin_id" @if(isset($user->usertype) AND $user->usertype!="Admin") style="display:none;" @endif @if(!isset($user->id)) style="display:none;" @endif> Permission for Master Admin<small id="emailHelp" class="form-text text-muted">(All Permission)</small></p>
                      </div>  
                  </div>  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($user->status) AND $user->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($user->status) AND $user->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>

                  <div class="form-group row">
                     
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