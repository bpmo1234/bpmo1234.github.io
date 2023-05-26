@extends("admin.admin_app")

@section("content")

  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-8">
              <div class="card-box">
                 
                <div class="alert alert-danger">
                       
                          License activation not recognized or is inactive, please contact support!
                </div>

                <img src="{{URL::to('site_assets/support_policy.png')}}" alt="support" class="img-thumbnail">       
                
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

@endsection