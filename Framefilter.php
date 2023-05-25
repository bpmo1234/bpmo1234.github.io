<?php

//Get the raw html.
$furl=trim($_GET["furl"]);
$raw = file_get_contents($furl);

$mydomain="https://bpmo1234.github.io/";

//Kill anoying popups.
$raw=str_replace("alert(","isNull(",$raw);
$raw=str_replace("window.open","isNull",$raw);
$raw=str_replace("prompt(","isNull(",$raw);
$raw=str_replace("Confirm: (","isNull(",$raw);

//Modify the javascript links so they go though a filter.
$raw=str_replace("script type=\"text/javascript\" src=\"","script type=\"text/javascript\" src=\"".$mydomain."javascriptfilter.php?jurl=",$raw);
$raw=str_replace("script src=","script src=".$mydomain."javascriptfilter.php?jurl=",$raw);

//Or kill js files
//$raw=str_replace(".js",".off",$raw);

//Put in a base domain tag so images, flash and css are certain to work.
$replacethis="<head>";
$replacestring="<head><base href='".$furl."/'>";
$raw=str_replace($replacethis,$replacestring,$raw);

//Echo the website html to the iframe.
echo $raw;

?>