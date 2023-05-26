@extends("admin.admin_app")

@section("content")

<style type="text/css">
  .iframe-container {
  overflow: hidden;
  padding-top: 56.25% !important;
  position: relative;
}
 
.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>

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

                 {!! Form::open(array('url' => array('admin/language/add_edit_language'),'class'=>'form-horizontal','name'=>'category_form','id'=>'category_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($lang->id) ? $lang->id : null }}">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.language_name')}}</label>
                    <div class="col-sm-9">
                      <input type="text" name="language_name" value="{{ isset($lang->language_name) ? stripslashes($lang->language_name) : null }}" class="form-control">
                    </div>
                  </div>                   
 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-9">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($lang->status) AND $lang->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($lang->status) AND $lang->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="offset-sm-2 col-sm-9 pl-1">
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