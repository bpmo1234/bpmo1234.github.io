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
                  <a href="{{URL::to('admin/subscription_plan/add_plan')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="{{trans('words.add_plan')}}"><i class="fa fa-plus"></i> {{trans('words.add_plan')}}</a>
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
                      <th>{{trans('words.plan_name')}}</th>
                      <th>{{trans('words.duration')}}</th>
                      <th>{{trans('words.price')}}</th>
                      <th>{{trans('words.status')}}</th>                       
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($plan_list as $i => $plan_data)
                    <tr>
                      <td>{{ $plan_data->plan_name }}</td>
                      <td>{{ App\SubscriptionPlan::getPlanDuration($plan_data->id) }}</td>
                      <td>{{html_entity_decode(getCurrencySymbols(getcong('currency_code')))}} {{ $plan_data->plan_price }}</td>
                      <td>@if($plan_data->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</td>                       
                      <td>
                      <a href="{{ url('admin/subscription_plan/edit_plan/'.$plan_data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                      <a href="{{ url('admin/subscription_plan/delete/'.$plan_data->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $plan_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection