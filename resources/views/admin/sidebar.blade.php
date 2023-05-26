<div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
          
          @if(Auth::User()->usertype =="Admin")
          <ul>
            <li><a href="{{ URL::to('admin/dashboard') }}" class="waves-effect {{classActivePath('dashboard')}}"><i class="fa fa-dashboard"></i><span>{{trans('words.dashboard_text')}}</span></a></li>
            <li><a href="{{ URL::to('admin/language') }}" class="waves-effect {{classActivePath('language')}}"><i class="fa fa-language"></i><span>{{trans('words.language_text')}}</span></a></li>
            <li><a href="{{ URL::to('admin/genres') }}" class="waves-effect {{classActivePath('genres')}}"><i class="fa fa-list"></i><span>{{trans('words.genres_text')}}</span></a></li>
            
            @if(getcong('menu_movies'))
            <li><a href="{{ URL::to('admin/movies') }}" class="waves-effect {{classActivePath('movies')}}"><i class="fa fa-video-camera"></i><span>{{trans('words.movies_text')}}</span></a></li>
            @endif
            
            @if(getcong('menu_shows'))
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-film"></i><span>{{trans('words.tv_shows_text')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('series')}}"><a href="{{ URL::to('admin/series') }}" class="{{classActivePath('series')}}"><i class="fa fa-image"></i><span>{{trans('words.shows_text')}}</span></a></li>
                <li class="{{classActivePath('season')}}"><a href="{{ URL::to('admin/season') }}" class="{{classActivePath('season')}}"><i class="fa fa-tree"></i><span>{{trans('words.seasons_text')}}</span></a></li>
                <li class="{{classActivePath('episodes')}}"><a href="{{ URL::to('admin/episodes') }}" class="{{classActivePath('episodes')}}"><i class="fa fa-list"></i><span>{{trans('words.episodes_text')}}</span></a></li>
              </ul>
            </li>
            @endif

            @if(getcong('menu_sports'))
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-futbol-o"></i><span>{{trans('words.sports_text')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('sports_category')}}"><a href="{{ URL::to('admin/sports_category') }}" class="{{classActivePath('sports_category')}}"><i class="fa fa-list"></i><span>{{trans('words.sports_cat_text')}}</span></a></li>
                <li class="{{classActivePath('sports')}}"><a href="{{ URL::to('admin/sports') }}" class="{{classActivePath('sports')}}"><i class="fa fa-soccer-ball-o"></i><span>{{trans('words.sports_video_text')}}</span></a></li>
               </ul>
            </li>
            @endif

            @if(getcong('menu_livetv'))
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span>{{trans('words.live_tv')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('tv_category')}}"><a href="{{ URL::to('admin/tv_category') }}" class="{{classActivePath('tv_category')}}"><i class="fa fa-tags"></i><span>{{trans('words.live_tv_category')}}</span></a></li>
                <li class="{{classActivePath('live_tv')}}"><a href="{{ URL::to('admin/live_tv') }}" class="{{classActivePath('live_tv')}}"><i class="fa fa-list"></i><span>{{trans('words.tv_channel')}}</span></a></li>
               </ul>
            </li>
            @endif

            <li><a href="{{ URL::to('admin/actor') }}" class="waves-effect {{classActivePath('actor')}}"><i class="fa fa-user"></i><span>{{trans('words.actors')}}</span></a></li>
            <li><a href="{{ URL::to('admin/director') }}" class="waves-effect {{classActivePath('director')}}"><i class="fa fa-user"></i><span>{{trans('words.directors')}}</span></a></li>
             
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i><span>{{trans('words.home')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('slider')}}"><a href="{{ URL::to('admin/slider') }}" class="{{classActivePath('slider')}}"><i class="fa fa-sliders"></i><span>{{trans('words.slider')}}</span></a></li>
                <li class="{{classActivePath('home_sections')}}"><a href="{{ URL::to('admin/home_sections') }}" class="{{classActivePath('home_sections')}}"><i class="fa fa-th-list"></i><span>{{trans('words.home_section')}}</span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i><span>{{trans('words.users')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('users')}}"><a href="{{ URL::to('admin/users') }}" class="{{classActivePath('users')}}"><i class="fa fa-users"></i><span>{{trans('words.users')}}</span></a></li>
                <li class="{{classActivePath('sub_admin')}}"><a href="{{ URL::to('admin/sub_admin') }}" class="{{classActivePath('sub_admin')}}"><i class="fa fa-users"></i><span>{{trans('words.admin')}}</span></a></li>
               </ul>
            </li>
            <li><a href="{{ URL::to('admin/subscription_plan') }}" class="waves-effect {{classActivePath('subscription_plan')}}"><i class="fa fa-dollar"></i><span>{{trans('words.subscription_plan')}}</span></a></li>
            <li><a href="{{ URL::to('admin/coupons') }}" class="waves-effect {{classActivePath('coupons')}}"><i class="fa fa-gift"></i><span>{{trans('words.coupons')}}</span></a></li>
            <li><a href="{{ URL::to('admin/payment_gateway') }}" class="waves-effect {{classActivePath('payment_gateway')}}"><i class="fa fa-credit-card-alt"></i><span>{{trans('words.payment_gateway')}}</span></a></li>
            <li><a href="{{ URL::to('admin/transactions') }}" class="waves-effect {{classActivePath('transactions')}}"><i class="fa fa-list"></i><span>{{trans('words.transactions')}}</span></a></li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-edit"></i><span>{{trans('words.pages')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                                 
                <li class="{{classActivePath('pages')}}"><a href="{{ URL::to('admin/pages') }}" class="{{classActivePath('pages')}}"><i class="fa fa-file"></i><span>{{trans('words.pages')}}</span></a></li>
                <li class="{{classActivePath('pages/add')}}"><a href="{{ URL::to('admin/pages/add') }}" class="{{classActivePath('pages')}}"><i class="fa fa-plus"></i><span>{{trans('words.add_page')}}</span></a></li>
               </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i><span>{{trans('words.settings')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('general_settings')}}"><a href="{{ URL::to('admin/general_settings') }}" class="{{classActivePath('general_settings')}}"><i class="fa fa-cog"></i><span>{{trans('words.general')}}</span></a></li>
                <li class="{{classActivePath('email_settings')}}"><a href="{{ URL::to('admin/email_settings') }}" class="{{classActivePath('email_settings')}}"><i class="fa fa-send"></i><span>{{trans('words.smtp_email')}}</span></a></li>
                <li class="{{classActivePath('social_login_settings')}}"><a href="{{ URL::to('admin/social_login_settings') }}" class="{{classActivePath('social_login_settings')}}"><i class="fa fa-usb"></i><span>{{trans('words.social_login')}}</span></a></li>  
                <li class="{{classActivePath('player_settings')}}"><a href="{{ URL::to('admin/player_settings') }}" class="{{classActivePath('player_settings')}}"><i class="fa fa-play-circle"></i><span>{{trans('words.player_settings')}}</span></a></li>
                <li class="{{classActivePath('menu_settings')}}"><a href="{{ URL::to('admin/menu_settings') }}" class="{{classActivePath('menu_settings')}}"><i class="fa fa-list"></i><span>{{trans('words.menu')}}</span></a></li>
               </ul>
            </li> 

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-android"></i><span>{{trans('words.android_app')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                                 
                <li class="{{classActivePath('verify_purchase_app')}}"><a href="{{ URL::to('admin/verify_purchase_app') }}" class="{{classActivePath('verify_purchase_app')}}"><i class="fa fa-lock"></i><span>App Verify</span></a></li>  
                @if(env('BUYER_NAME') AND env('BUYER_PURCHASE_CODE'))
                <li class="{{classActivePath('android_settings')}}"><a href="{{ URL::to('admin/android_settings') }}" class="{{classActivePath('android_settings')}}"><i class="fa fa-cog"></i><span>{{trans('words.android_app_settings')}}</span></a></li>
                <li class="{{classActivePath('ad_list')}}"><a href="{{ URL::to('admin/ad_list') }}" class="waves-effect {{classActivePath('ad_list')}}"><i class="fa fa-buysellads"></i><span>Ad Settings</span></a></li>                
                <li class="{{classActivePath('android_notification')}}"><a href="{{ URL::to('admin/android_notification') }}" class="{{classActivePath('android_notification')}}"><i class="fa fa-send"></i><span>{{trans('words.android_app_notification')}}</span></a></li>
                @endif 
               </ul>
            </li> 

            @else

            <ul>
            <li><a href="{{ URL::to('admin/dashboard') }}" class="waves-effect {{classActivePath('dashboard')}}"><i class="fa fa-dashboard"></i><span>{{trans('words.dashboard_text')}}</span></a></li>
            <li><a href="{{ URL::to('admin/language') }}" class="waves-effect {{classActivePath('language')}}"><i class="fa fa-language"></i><span>{{trans('words.language_text')}}</span></a></li>
            <li><a href="{{ URL::to('admin/genres') }}" class="waves-effect {{classActivePath('genres')}}"><i class="fa fa-list"></i><span>{{trans('words.genres_text')}}</span></a></li>

            @if(getcong('menu_movies'))
            <li><a href="{{ URL::to('admin/movies') }}" class="waves-effect {{classActivePath('movies')}}"><i class="fa fa-video-camera"></i><span>{{trans('words.movies_text')}}</span></a></li>
            @endif
            
            @if(getcong('menu_shows')) 
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-film"></i><span>{{trans('words.tv_shows_text')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('series')}}"><a href="{{ URL::to('admin/series') }}" class="{{classActivePath('series')}}"><i class="fa fa-image"></i><span>{{trans('words.shows_text')}}</span></a></li>
                <li class="{{classActivePath('season')}}"><a href="{{ URL::to('admin/season') }}" class="{{classActivePath('season')}}"><i class="fa fa-tree"></i><span>{{trans('words.seasons_text')}}</span></a></li>
                <li class="{{classActivePath('episodes')}}"><a href="{{ URL::to('admin/episodes') }}" class="{{classActivePath('episodes')}}"><i class="fa fa-list"></i><span>{{trans('words.episodes_text')}}</span></a></li>
              </ul>
            </li>
            @endif

            @if(getcong('menu_sports'))
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-futbol-o"></i><span>{{trans('words.sports_text')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('sports_category')}}"><a href="{{ URL::to('admin/sports_category') }}" class="{{classActivePath('sports_category')}}"><i class="fa fa-list"></i><span>{{trans('words.sports_cat_text')}}</span></a></li>
                <li class="{{classActivePath('sports')}}"><a href="{{ URL::to('admin/sports') }}" class="{{classActivePath('sports')}}"><i class="fa fa-soccer-ball-o"></i><span>{{trans('words.sports_video_text')}}</span></a></li>
               </ul>
            </li>
            @endif

            @if(getcong('menu_livetv'))
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span>{{trans('words.live_tv')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('tv_category')}}"><a href="{{ URL::to('admin/tv_category') }}" class="{{classActivePath('tv_category')}}"><i class="fa fa-tags"></i><span>{{trans('words.live_tv_category')}}</span></a></li>
                <li class="{{classActivePath('live_tv')}}"><a href="{{ URL::to('admin/live_tv') }}" class="{{classActivePath('live_tv')}}"><i class="fa fa-list"></i><span>{{trans('words.tv_channel')}}</span></a></li>
               </ul>
            </li>
            @endif
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i><span>{{trans('words.home')}}</span><span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('slider')}}"><a href="{{ URL::to('admin/slider') }}" class="{{classActivePath('slider')}}"><i class="fa fa-sliders"></i><span>{{trans('words.slider')}}</span></a></li>
                <li class="{{classActivePath('home_sections')}}"><a href="{{ URL::to('admin/home_sections') }}" class="{{classActivePath('home_sections')}}"><i class="fa fa-th-list"></i><span>{{trans('words.home_section')}}</span></a></li>
               </ul>
            </li>

            <li><a href="{{ URL::to('admin/transactions') }}" class="waves-effect {{classActivePath('transactions')}}"><i class="fa fa-list"></i><span>{{trans('words.transactions')}}</span></a></li>

            </ul>

            @endif
 
            <!-- <li><a href="{{ URL::to('admin/language') }}" class="waves-effect {{classActivePath('language')}}"><i class="fa fa-language"></i> <span> Language</span></a></li> -->
            
          </ul>
        </div>
      </div>
    </div>