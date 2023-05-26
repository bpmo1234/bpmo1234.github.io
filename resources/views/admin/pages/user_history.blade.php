@extends("admin.admin_app")

@section("content")

 
 
  <div class="content-page">
      <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="bg-picture card-box">

                                    <div class="p-t-10 pull-right">@if($user->status==1)<span class="badge badge-success">{{trans('words.active')}}</span> @else<span class="badge badge-danger">{{trans('words.inactive')}}</span>@endif</div>

                                    <div class="profile-info-name">
                                        
                                        @if($user->user_image)
                                          <img src="{{ URL::asset('upload/'.$user->user_image) }}" class="img-thumbnail" alt="profile_img" style="width: 155px">
                                        @else  
                                          <img src="{{ URL::asset('upload/profile.jpg') }}" class="img-thumbnail" alt="profile_img" style="width: 155px">
                                        @endif


                                        <div class="profile-info-detail">
                                            <h4 class="m-0">{{$user->name}}</h4>
                                             <p class="text-muted m-b-20"><b>{{trans('words.email')}}:</b> {{$user->email}} <br/><b>{{trans('words.phone')}}:</b> {{$user->phone}}</p>
                                              
                                            <p class="text-muted m-b-20"><b>{{trans('words.address')}}:</b> {{$user->user_address}}</p>

                                            
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!--/ meta -->

                                 
                            </div>

                            <div class="col-sm-4">
                                <div class="card-box">
                                     

                                    <h4 class="header-title m-t-0 m-b-30">{{trans('words.subscription_plan')}}</h4>

                                    <ul class="list-group m-b-0 user-list">
                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="avatar">
                                                    <i class="mdi mdi-circle text-primary"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name">{{\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')}}</span>
                                                    <span class="desc">{{trans('words.current_plan')}}</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="avatar">
                                                    <i class="mdi mdi-circle text-success"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name">@if($user->exp_date){{date('F,  d, Y',$user->exp_date)}}@endif</span>
                                                    <span class="desc">{{trans('words.subscription_expires_on')}}</span>
                                                </div>
                                            </a>
                                        </li>
 
                                    </ul>
                                </div>


                                 

                            </div>


                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                               
                            <div class="card-box">

                              <h4 class="header-title m-t-0 m-b-30">{{trans('words.user_transactions')}}</h4>
                              <div class="table-responsive">
                               <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>{{trans('words.email')}}</th>
                                      <th>{{trans('words.plan')}}</th>
                                      <th>{{trans('words.amount')}}</th>
                                      <th>{{trans('words.payment_gateway')}}</th>
                                      <th>{{trans('words.payment_id')}}</th>
                                      <th>{{trans('words.payment_date')}}</th>                      
                                       
                                    </tr>
                                  </thead>
                                  <tbody>
                                   @foreach($transactions_list as $i => $transaction_data)
                                    <tr>
                                      <td>{{ $transaction_data->email }}</td>
                                      <td>{{\App\SubscriptionPlan::getSubscriptionPlanInfo($transaction_data->plan_id,'plan_name')}}</td>
                                      <td>{{html_entity_decode(getCurrencySymbols(getcong('currency_code')))}} {{ $transaction_data->payment_amount }}</td>
                                      <td>{{ $transaction_data->gateway }}</td>
                                      <td>{{ $transaction_data->payment_id }}</td>
                                      <td>{{ date('M d Y h:i A',$transaction_data->date) }}</td>                                              
                                       
                                    </tr>
                                   @endforeach
                                     
                                     
                                     
                                  </tbody>
                                </table>
                              </div>  
                                <nav class="paging_simple_numbers">
                                @include('admin.pagination', ['paginator' => $transactions_list]) 
                                </nav>          
                            </div>
                          </div> 
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->
      @include("admin.copyright") 
    </div> 
  

@endsection