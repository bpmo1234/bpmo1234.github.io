<video id="v_player" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="auto" playsinline crossorigin="anonymous" width="640" height="450" poster="{{URL::to('/'.$tv_info->channel_thumb)}}" data-setup="{}" @if(get_player_cong('autoplay')=="true")autoplay="true"@endif>
							  	
		  	<!-- video source -->
		  @if(isset($_GET['server']) AND $_GET['server']==2)
          <source src="{{$tv_info->channel_url2}}" type="application/x-mpegURL" /> 
          @elseif(isset($_GET['server']) AND $_GET['server']==3)
          <source src="{{$tv_info->channel_url3}}" type="application/x-mpegURL" /> 
          @else
          <source src="{{$tv_info->channel_url}}" type="application/x-mpegURL" /> 
          @endif

			<!-- worning text if needed -->
			<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
</video>