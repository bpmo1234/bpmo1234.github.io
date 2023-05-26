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
                     <select class="form-control select2" name="episodes_series_id" id="episodes_series_id">
                        <option value="">{{trans('words.filter_by_show')}}</option>
                        @foreach($series_list as $series_data)
                          <option value="?series_id={{$series_data->id}}">{{stripslashes($series_data->series_name)}}</option>
                        @endforeach
                    </select>
                  </div>   
                  <div class="col-md-3">
                     {!! Form::open(array('url' => 'admin/episodes','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')) !!}   
                      <input type="text" name="s" placeholder="{{trans('words.search_by_title')}}" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                  </div>             
                <div class="col-md-3">
                  <a href="{{URL::to('admin/episodes/add_episode')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20 mt-2" data-toggle="tooltip" title="{{trans('words.add_episode')}}"><i class="fa fa-plus"></i> {{trans('words.add_episode')}}</a>
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
                      <th>{{trans('words.shows_text')}}</th>
                      <th>{{trans('words.episode_title')}}</th>
                      <th>{{trans('words.episode_poster')}}</th>
                      <th>{{trans('words.episode_access')}}</th>
                      <th>{{trans('words.status')}}</th>                       
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($episodes_list as $i => $episodes)
                    <tr>
                      <td>{{ stripslashes($episodes->series_name) }}</td>
                      <td>{{ stripslashes($episodes->video_title) }}</td>
                      <td>@if(isset($episodes->video_image)) <img src="{{URL::to('/'.$episodes->video_image)}}" alt="video image" class="thumb-xl bdr_radius"> @endif</td>
                      <td>{{ $episodes->video_access }}</td>
                      <td>@if($episodes->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</td>                     
                      <td>
                      <a href="{{ url('admin/episodes/edit_episode/'.$episodes->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/episodes/delete/'.$episodes->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $episodes_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection