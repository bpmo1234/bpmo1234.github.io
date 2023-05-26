<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">    
    
    <url>        
        <loc>{{ URL::to('/') }}</loc>
        <changefreq>Daily</changefreq>
        <priority>1.0</priority>
     </url>
 
     @foreach($pages_list as $page_data)     
     <url>        
        <loc>{{ URL::to('page/'.$page_data->page_slug) }}</loc>
        <changefreq>Yearly</changefreq>
        <priority>0.6</priority>
     </url>
     @endforeach         
         
</urlset>