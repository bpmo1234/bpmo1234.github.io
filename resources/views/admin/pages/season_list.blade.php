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
                     <select class="form-control select2" name="season_series_id" id="series_language_id">
                        <option value="">{{trans('words.filter_by_show')}}</option>
                        @foreach($series_list as $series_data)
                          <option value="?series_id={{$series_data->id}}">{{stripslashes($series_data->series_name)}}</option>
                        @endforeach
                    </select>
                  </div>  
                  <div class="col-md-3">
                     {!! Form::open(array('url' => 'admin/season','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')) !!}   
                      <input type="text" name="s" placeholder="{{trans('words.search_by_title')}}" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                  </div>             
                <div class="col-md-3">
                  <a href="{{URL::to('admin/season/add_season')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20 mt-2" data-toggle="tooltip" title="{{trans('words.add_season')}}"><i class="fa fa-plus"></i> {{trans('words.add_season')}}</a>
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
                      <th>{{trans('words.show_name')}}</th>
                      <th>{{trans('words.season_title')}}</th>
                      <th>{{trans('words.season_poster')}}</th>
                      <th>{{trans('words.status')}}</th>                       
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($season_list as $i => $season)
                    <tr>
                      <td>{{ stripslashes($season->series_name) }}</td>
                      <td>{{ stripslashes($season->season_name) }}</td>
                      <td>@if(isset($season->season_poster)) <img src="{{URL::to('/'.$season->season_poster)}}" alt="image" class="thumb-xl bdr_radius"> @endif</td>
                      <td>@if($season->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</td>                       
                      <td>
                      <a href="{{ url('admin/season/edit_season/'.$season->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/season/delete/'.$season->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $season_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection