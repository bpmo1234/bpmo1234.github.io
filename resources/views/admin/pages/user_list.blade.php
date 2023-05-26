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
                     <select class="form-control" name="plan_select" id="plan_select">
                        <option value="">{{trans('words.filter_by_plan')}}</option>
                         @foreach(\App\SubscriptionPlan::orderBy('id')->get() as $plan_data)
                          <option value="?plan_id={{$plan_data->id}}">{{$plan_data->plan_name}}</option>
                         @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
                     {!! Form::open(array('url' => 'admin/users','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')) !!}   
                      <input type="text" name="s" placeholder="{{trans('words.search_by_name_email')}}" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                  </div>             
                <div class="col-md-3">
                  <a href="{{URL::to('admin/users/add_user')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20 mt-2" data-toggle="tooltip" title="{{trans('words.add_user')}}"><i class="fa fa-plus"></i> {{trans('words.add_user')}}</a>
                </div>
                <div class="col-md-3">
                  <a href="{{URL::to('admin/users/export')}}" class="btn btn-info btn-md waves-effect waves-light m-b-20 mt-2 pull-right" data-toggle="tooltip" title="{{trans('words.export_user')}}"><i class="fa fa-file-excel-o"></i> {{trans('words.export_user')}}</a>
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
                      <th>{{trans('words.name')}}</th>
                      <th>{{trans('words.email')}}</th>
                      <th>{{trans('words.phone')}}</th>
                      <th>{{trans('words.status')}}</th>                        
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($user_list as $i => $user_data)
                    <tr>
                      <td>{{ $user_data->name }}</td>
                      <td>{{ $user_data->email }}</td>
                      <td>{{ $user_data->phone }}</td>
                      <td>@if($user_data->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</td>
                                             
                      <td>
                      <a href="{{ url('admin/users/history/'.$user_data->id) }}" class="btn btn-icon waves-effect waves-light btn-primary m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.user_history')}}"> <i class="fa fa-eye"></i> </a>
                      <a href="{{ url('admin/users/edit_user/'.$user_data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/users/delete/'.$user_data->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $user_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection