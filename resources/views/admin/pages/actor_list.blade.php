@extends("admin.admin_app")

@section("content")

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">             
                <div class="col-md-3">
                  <a href="{{URL::to('admin/actor/add')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="{{trans('words.add_actor')}}"><i class="fa fa-plus"></i> {{trans('words.add_actor')}}</a>
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
                      <th>{{trans('words.actor_name')}}</th>
                      <th>{{trans('words.image')}}</th>
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($list as $i => $data)
                    <tr>
                      <td>{{ stripslashes($data->ad_name) }}</td>
                      <td>
                          @if(isset($data->ad_image)) 
                          <img src="{{URL::to('/'.$data->ad_image)}}" alt="video image" class="thumb-md bdr_radius"> 
                          @else
                            <img src="{{URL::to('images/user_icon.png')}}" alt="video image" class="thumb-md bdr_radius"> 
                          @endif
                      </td>                                            
                      <td>
                      <a href="{{ url('admin/actor/edit/'.$data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/actor/delete/'.$data->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection