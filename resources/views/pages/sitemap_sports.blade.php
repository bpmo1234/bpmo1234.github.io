<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
     
    @foreach($sports_video_list as $sports_video)
    <url>        
        <loc>{{ URL::to('sports/details/'.$sports_video->video_slug.'/'.$sports_video->id) }}</loc>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
     </url>        
    @endforeach 
     
</urlset>