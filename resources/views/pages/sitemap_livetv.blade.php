<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
     
    @foreach($live_list as $live_tv_data)
    <url>        
        <loc>{{ URL::to('livetv/details/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id) }}</loc>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
     </url>        
    @endforeach 
     
</urlset>