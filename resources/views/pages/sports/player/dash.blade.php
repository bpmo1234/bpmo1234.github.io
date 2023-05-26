<video id="v_player" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="auto" playsinline crossorigin="anonymous" width="640" height="450" poster="{{URL::to('/'.$sports_info->video_image)}}" data-setup="{}" @if(get_player_cong('autoplay')=="true")autoplay="true"@endif>
							  	
		  	<!-- video source -->
		  	<source src="{{$sports_info->video_url}}" type="application/dash+xml" />  
				
				@if($sports_info->subtitle_on_off)
				<!-- video subtitle -->
			@if($sports_info->subtitle_url1)
				<track kind="captions" src="{{$sports_info->subtitle_url1}}"   label="{{$sports_info->subtitle_language1?$sports_info->subtitle_language1:'English'}}" default>		
			@endif
			@if($sports_info->subtitle_url2)
				<track kind="captions" src="{{$sports_info->subtitle_url2}}"   label="{{$sports_info->subtitle_language2?$sports_info->subtitle_language2:'English'}}">		
			@endif
			@if($sports_info->subtitle_url3)
				<track kind="captions" src="{{$sports_info->subtitle_url3}}"    label="{{$sports_info->subtitle_language3?$sports_info->subtitle_language3:'English'}}">		
			@endif	
			@endif

			<!-- worning text if needed -->
			<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
</video>