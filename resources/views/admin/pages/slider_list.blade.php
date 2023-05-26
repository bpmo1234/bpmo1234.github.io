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
                  <a href="{{URL::to('admin/slider/add_slider')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="{{trans('words.add_slider')}}"><i class="fa fa-plus"></i> {{trans('words.add_slider')}}</a>
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
                      <th>{{trans('words.slider_title')}}</th>
                      <th>{{trans('words.slider_image')}}</th>
                      <th>{{trans('words.status')}}</th>                        
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($slider_list as $i => $slider)
                    <tr>
                      <td>{{ stripslashes($slider->slider_title) }}</td>
                       <td>@if(isset($slider->slider_image)) <img src="{{URL::to('/'.$slider->slider_image)}}" alt="image" class="bdr_radius" style="object-fit: cover;" width="220" height="90"> @endif</td>
                       <td>@if($slider->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</td>

                      <td>
                      <a href="{{ url('admin/slider/edit_slider/'.$slider->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/slider/delete/'.$slider->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>

                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $slider_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection