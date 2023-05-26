@extends("admin.admin_app")

@section("content")

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                  <div class="col-sm-3">
                     <select class="form-control select2" name="tv_cat_id" id="tv_cat_id">
                        <option value="">{{trans('words.filter_by_cat')}}</option>
                        @foreach($cat_list as $cat_data)
                          <option value="?cat_id={{$cat_data->id}}">{{$cat_data->category_name}}</option>
                        @endforeach
                    </select>
                  </div>  
                  <div class="col-md-3">
                     {!! Form::open(array('url' => 'admin/live_tv','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')) !!}   
                      <input type="text" name="s" placeholder="{{trans('words.search_by_title')}}" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                  </div>             
                <div class="col-md-3">
                  <a href="{{URL::to('admin/live_tv/add_live_tv')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20 mt-2" data-toggle="tooltip" title="{{trans('words.live_tv_add')}}"><i class="fa fa-plus"></i> {{trans('words.live_tv_add')}}</a>
                </div>
              </div>

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>{{trans('words.live_tv_name')}}</th>
                      <th>{{trans('words.live_tv_logo')}}</th>
                      <th>{{trans('words.video_access')}}</th>
                      <th>{{trans('words.status')}}</th>                       
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($live_tv_list as $i => $live_tv_data)
                    <tr>
                      <td>{{ stripslashes($live_tv_data->channel_name) }}</td>
                      <td>@if(isset($live_tv_data->channel_thumb)) <img src="{{URL::to('/'.$live_tv_data->channel_thumb)}}" alt="video image" class="thumb-xl bdr_radius"> @endif</td>
                      <td>{{ $live_tv_data->channel_access }}</td>
                      <td>@if($live_tv_data->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</td>                     
                      <td>
                      <a href="{{ url('admin/live_tv/edit_live_tv/'.$live_tv_data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/live_tv/delete/'.$live_tv_data->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $live_tv_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection