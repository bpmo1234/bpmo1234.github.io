<?php
use App\Settings;
use App\Pages;
use App\Transactions;
use App\Episodes;
use App\Movies;
use App\Sports;
use App\RecentlyWatched; 
use App\User;
use App\Ads;
use App\LiveTV; 
use App\Player; 
use App\Series;
use App\Watchlist;
use App\PaymentGateway;

if (! function_exists('check_watchlist')) {

    function check_watchlist($user_id,$post_id,$post_type)
    { 
         $watch_info = Watchlist::where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->where('post_type', '=', $post_type)->first();   


        if($watch_info)
        {
            return true;
        }
        else
        {
             
            return false;
        }

    }

}

if (! function_exists('get_episodes_pre_url')) {

    function get_episodes_pre_url($series_id,$id)
    { 
        $episode_info = Episodes::where('episode_series_id', '=', $series_id)->where('id', '<', $id)->orderBy('id','desc')->first(); 

        if($episode_info)
        {
            $series_slug= Series::getSeriesInfo($series_id,'series_slug');
            $pre_url= \URL::to('shows/'.$series_slug.'/'.$episode_info->video_slug.'/'.$episode_info->id);
        }
        else
        {
             
            $pre_url= "";
        }
        

        return $pre_url;
    }
}

if (! function_exists('get_episodes_next_url')) {

    function get_episodes_next_url($series_id,$id)
    {
          
        $episode_info = Episodes::where('episode_series_id', '=', $series_id)->where('id', '>', $id)->orderBy('id','asc')->first(); 

        if($episode_info)
        {
            $series_slug= Series::getSeriesInfo($series_id,'series_slug');
            $pre_url= \URL::to('shows/'.$series_slug.'/'.$episode_info->video_slug.'/'.$episode_info->id);
        }
        else
        {
             
            $pre_url= "";
        }
        

        return $pre_url;
    }
}

if (! function_exists('number_format_short')) {
function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format );
    }

    return $n_format . $suffix;
}
}

if (! function_exists('share_url_get')) {

    function share_url_get($type,$slug,$id)
    {
        if($type=="movies")
        {
            $share_url= \URL::to('movies/details/'.$slug.'/'.$id);
        }
        else if($type=="livetv")
        {
            $share_url= \URL::to('livetv/details/'.$slug.'/'.$id);
        }
        else if($type=="sports")
        {
            $share_url= \URL::to('sports/details/'.$slug.'/'.$id);
        } 
        else
        {
            $share_url= \URL::to('shows/details/'.$slug.'/'.$id);
        }
        

        return $share_url;
    }
}

if (! function_exists('recently_watched_info')) {

    function recently_watched_info($video_type,$video_id)
    {
        if($video_type=="Movies")
        {
            $recently_info = Movies::where('id',$video_id)->first();
        } 
        else if($video_type=="Sports")
        {
            $recently_info = Sports::where('id',$video_id)->first();
        }
        else if($video_type=="LiveTV")
        {
            $recently_info = LiveTV::where('id',$video_id)->first();
        }
        else
        {
            $recently_info = Episodes::where('id',$video_id)->first();
        }
        

        return $recently_info;
    }
}

if (! function_exists('putPermanentEnv')) {

 function putPermanentEnv($key, $value)
{
    $path = app()->environmentFilePath();

    $escaped = preg_quote('='.env($key), '/');

    file_put_contents($path, preg_replace(
        "/^{$key}{$escaped}/m",
        "{$key}={$value}",
        file_get_contents($path)
    ));
}

}

if (! function_exists('getcong')) {

    function getcong($key)
    {
    	//echo "string";exit;

       if(file_exists(base_path('/public/.lic')))
       { 
            $settings = Settings::findOrFail('1'); 

            return $settings->$key;
       }
    }
}

if (! function_exists('get_player_cong')) {

    function get_player_cong($key)
    {
         
        $settings = Player::findOrFail('1'); 

        return $settings->$key;
    }
}
 
//Site

if (!function_exists('classActivePathSite')) {
    function classActivePathSite($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
} 

//Admin
if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('classActivePathSub')) {
    function classActivePathSub($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' subdrop';
    }
}

if (!function_exists('classActivePathSub_Style')) {
    function classActivePathSub_Style($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'display: block;';
    }
}

if (!function_exists('classActivePathSite')) {
    function classActivePathSite($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'active';
    }
}

if (!function_exists('generate_timezone_list')) {
function generate_timezone_list()
{
    static $regions = array(
        DateTimeZone::AFRICA,
        DateTimeZone::AMERICA,
        DateTimeZone::ANTARCTICA,
        DateTimeZone::ASIA,
        DateTimeZone::ATLANTIC,
        DateTimeZone::AUSTRALIA,
        DateTimeZone::EUROPE,
        DateTimeZone::INDIAN,
        DateTimeZone::PACIFIC,
    );

    $timezones = array();
    foreach( $regions as $region )
    {
        $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
    }

    $timezone_offsets = array();
    foreach( $timezones as $timezone )
    {
        $tz = new DateTimeZone($timezone);
        $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
    }

    // sort timezone by offset
    ksort($timezone_offsets);

    $timezone_list = array();
    foreach( $timezone_offsets as $timezone => $offset )
    {
        $offset_prefix = $offset < 0 ? '-' : '+';
        $offset_formatted = gmdate( 'H:i', abs($offset) );

        $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

        $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
    }

    return $timezone_list;
}

} 

if (!function_exists('plan_count_by_month')) {
    function plan_count_by_month($plan_id,$month_name)
    {       
            //echo $month_name;

             $start_month = date('Y-m-d', strtotime('first day of '.$month_name.''));
             $finish_month = date('Y-m-d', strtotime('last day of '.$month_name.''));
             
            $monthly_plan_purchase = Transactions::where('plan_id',$plan_id)->whereBetween('date', array(strtotime($start_month), strtotime($finish_month)))->count();

            return $monthly_plan_purchase;
    }
}

if (! function_exists('check_verify_purchase')) {

    function check_verify_purchase()
    { 
       /* $api = new LicenseBoxAPI();
        $verify_obj=$api->verify_license(false);

        //print_r($verify_obj);
        //exit;

 
        if($verify_obj["status"]==1)
        {
            return true;
        }
        else
        {    
            \Redirect::to('admin/verify_purchase')->send();             
            exit;
        }*/
        
        return true; 
    }
}

if (! function_exists('verify_envato_purchase_code')) {
function verify_envato_purchase_code($product_code)
    { 
      
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);


        $personal_token = "M8tF6z8lzZBBkmZt4xm3dU4lw7Rlbrwp";
        $header = array();
        $header[] = 'Authorization: Bearer '.$personal_token;
        $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0';
        $header[] = 'timeout: 20';
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

        $envatoRes = curl_exec($curl);
        curl_close($curl);
        $envatoRes = json_decode($envatoRes);
         

         return $envatoRes;
      
    }
} 

if (! function_exists('grab_image')) {
function grab_image($file_url,$save_to){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $file_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 140);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $output = curl_exec($ch);
        $file = fopen($save_to, "w+");
        fputs($file, $output);
        fclose($file);
    }
}

if (! function_exists('checkSignSalt')) {
function checkSignSalt($data_info){

        $key="viaviweb";

        $data_json = $data_info;

        $data_arr = json_decode(urldecode(base64_decode($data_json)),true);

        //echo $data_arr['salt'];
        //exit;

        if($data_arr['sign'] == '' && $data_arr['salt'] == '' ){
            //$data['data'] = array("status" => -1, "message" => "Invalid sign salt.");
        
            $set['VIDEO_STREAMING_APP'][] = array("status" => -1, "message" => "Invalid sign salt.");
            header( 'Content-Type: application/json; charset=utf-8' );
            echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            exit();


        }else{
            
            $data_arr['salt'];    
            
            $md5_salt=md5($key.$data_arr['salt']);

            if($data_arr['sign']!=$md5_salt){

                //$data['data'] = array("status" => -1, "message" => "Invalid sign salt.");
                $set['VIDEO_STREAMING_APP'][] = array("status" => -1, "message" => "Invalid sign salt.");   
                header( 'Content-Type: application/json; charset=utf-8' );
                echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                exit();
            }
        }
        
        return $data_arr;
        
    }
}    

if (! function_exists('check_app_user_plan')) {

    function check_app_user_plan($user_id)
    {

        // $user_id=$get_data['user_id'];

        $user_info = User::findOrFail($user_id);
        $user_plan_id=$user_info->plan_id;
        $user_plan_exp_date=$user_info->exp_date;
 

        if($user_plan_id==0)
        {          
             return false;
        }
        else if(strtotime(date('m/d/Y'))>$user_plan_exp_date)
        {

                return false;
        }
        else
        {
                return true;
        }
         
    }
}

if (! function_exists('get_ads')) {

    function get_ads($key)
    {
         
        $ad_obj = Ads::where('ad_key',$key)->first(); 

        return $ad_obj;
    }
}

if (! function_exists('getPaymentGatewayInfo')) {
function getPaymentGatewayInfo($id,$field_name=null)
{ 
 
    $gateway_obj= PaymentGateway::find($id); 

    if(isset($field_name))
    {
        $gateway_info=json_decode($gateway_obj->gateway_info);

        //echo $gateway_info->status;
        //exit;

        return $gateway_info->$field_name;
    }
    else
    { 
        return $gateway_obj;
    }
     
}
}

if (! function_exists('getStatisticsColors')) {
function getStatisticsColors($colorId)
{ 

    switch ($colorId) {
      case "1":
        return "#ff8acc";
        break;
      case "2":
        return "#5b69bc";
        break;
      case "3":
        return "#35b8e0";
        break;
      case "4":
        return "#10c469";
        break;
      case "5":
        return "#71b6f9";
        break;
      case "6":
        return "#f9c851";
        break;         
      default:
        return "#ff8acc";
    }

}

}

if (! function_exists('getCurrencySymbols')) {
    function getCurrencySymbols($code)
    { 
        $currency_symbols = array(
                            'AED' => '&#1583;.&#1573;', // ?
                            'AFN' => '&#65;&#102;',
                            'ALL' => '&#76;&#101;&#107;',
                            'AMD' => '',
                            'ANG' => '&#402;',
                            'AOA' => '&#75;&#122;', // ?
                            'ARS' => '&#36;',
                            'AUD' => '&#36;',
                            'AWG' => '&#402;',
                            'AZN' => '&#1084;&#1072;&#1085;',
                            'BAM' => '&#75;&#77;',
                            'BBD' => '&#36;',
                            'BDT' => '&#2547;', // ?
                            'BGN' => '&#1083;&#1074;',
                            'BHD' => '.&#1583;.&#1576;', // ?
                            'BIF' => '&#70;&#66;&#117;', // ?
                            'BMD' => '&#36;',
                            'BND' => '&#36;',
                            'BOB' => '&#36;&#98;',
                            'BRL' => '&#82;&#36;',
                            'BSD' => '&#36;',
                            'BTN' => '&#78;&#117;&#46;', // ?
                            'BWP' => '&#80;',
                            'BYR' => '&#112;&#46;',
                            'BZD' => '&#66;&#90;&#36;',
                            'CAD' => '&#36;',
                            'CDF' => '&#70;&#67;',
                            'CHF' => '&#67;&#72;&#70;',
                            'CLF' => '', // ?
                            'CLP' => '&#36;',
                            'CNY' => '&#165;',
                            'COP' => '&#36;',
                            'CRC' => '&#8353;',
                            'CUP' => '&#8396;',
                            'CVE' => '&#36;', // ?
                            'CZK' => '&#75;&#269;',
                            'DJF' => '&#70;&#100;&#106;', // ?
                            'DKK' => '&#107;&#114;',
                            'DOP' => '&#82;&#68;&#36;',
                            'DZD' => '&#1583;&#1580;', // ?
                            'EGP' => '&#163;',
                            'ETB' => '&#66;&#114;',
                            'EUR' => '&#8364;',
                            'FJD' => '&#36;',
                            'FKP' => '&#163;',
                            'GBP' => '&#163;',
                            'GEL' => '&#4314;', // ?
                            'GHS' => '&#162;',
                            'GIP' => '&#163;',
                            'GMD' => '&#68;', // ?
                            'GNF' => '&#70;&#71;', // ?
                            'GTQ' => '&#81;',
                            'GYD' => '&#36;',
                            'HKD' => '&#36;',
                            'HNL' => '&#76;',
                            'HRK' => '&#107;&#110;',
                            'HTG' => '&#71;', // ?
                            'HUF' => '&#70;&#116;',
                            'IDR' => '&#82;&#112;',
                            'ILS' => '&#8362;',
                            'INR' => '&#8377;',
                            'IQD' => '&#1593;.&#1583;', // ?
                            'IRR' => '&#65020;',
                            'ISK' => '&#107;&#114;',
                            'JEP' => '&#163;',
                            'JMD' => '&#74;&#36;',
                            'JOD' => '&#74;&#68;', // ?
                            'JPY' => '&#165;',
                            'KES' => '&#75;&#83;&#104;', // ?
                            'KGS' => '&#1083;&#1074;',
                            'KHR' => '&#6107;',
                            'KMF' => '&#67;&#70;', // ?
                            'KPW' => '&#8361;',
                            'KRW' => '&#8361;',
                            'KWD' => '&#1583;.&#1603;', // ?
                            'KYD' => '&#36;',
                            'KZT' => '&#1083;&#1074;',
                            'LAK' => '&#8365;',
                            'LBP' => '&#163;',
                            'LKR' => '&#8360;',
                            'LRD' => '&#36;',
                            'LSL' => '&#76;', // ?
                            'LTL' => '&#76;&#116;',
                            'LVL' => '&#76;&#115;',
                            'LYD' => '&#1604;.&#1583;', // ?
                            'MAD' => '&#1583;.&#1605;.', //?
                            'MDL' => '&#76;',
                            'MGA' => '&#65;&#114;', // ?
                            'MKD' => '&#1076;&#1077;&#1085;',
                            'MMK' => '&#75;',
                            'MNT' => '&#8366;',
                            'MOP' => '&#77;&#79;&#80;&#36;', // ?
                            'MRO' => '&#85;&#77;', // ?
                            'MUR' => '&#8360;', // ?
                            'MVR' => '.&#1923;', // ?
                            'MWK' => '&#77;&#75;',
                            'MXN' => '&#36;',
                            'MYR' => '&#82;&#77;',
                            'MZN' => '&#77;&#84;',
                            'NAD' => '&#36;',
                            'NGN' => '&#8358;',
                            'NIO' => '&#67;&#36;',
                            'NOK' => '&#107;&#114;',
                            'NPR' => '&#8360;',
                            'NZD' => '&#36;',
                            'OMR' => '&#65020;',
                            'PAB' => '&#66;&#47;&#46;',
                            'PEN' => '&#83;&#47;&#46;',
                            'PGK' => '&#75;', // ?
                            'PHP' => '&#8369;',
                            'PKR' => '&#8360;',
                            'PLN' => '&#122;&#322;',
                            'PYG' => '&#71;&#115;',
                            'QAR' => '&#65020;',
                            'RON' => '&#108;&#101;&#105;',
                            'RSD' => '&#1044;&#1080;&#1085;&#46;',
                            'RUB' => '&#1088;&#1091;&#1073;',
                            'RWF' => '&#1585;.&#1587;',
                            'SAR' => '&#65020;',
                            'SBD' => '&#36;',
                            'SCR' => '&#8360;',
                            'SDG' => '&#163;', // ?
                            'SEK' => '&#107;&#114;',
                            'SGD' => '&#36;',
                            'SHP' => '&#163;',
                            'SLL' => '&#76;&#101;', // ?
                            'SOS' => '&#83;',
                            'SRD' => '&#36;',
                            'STD' => '&#68;&#98;', // ?
                            'SVC' => '&#36;',
                            'SYP' => '&#163;',
                            'SZL' => '&#76;', // ?
                            'THB' => '&#3647;',
                            'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
                            'TMT' => '&#109;',
                            'TND' => '&#1583;.&#1578;',
                            'TOP' => '&#84;&#36;',
                            'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
                            'TTD' => '&#36;',
                            'TWD' => '&#78;&#84;&#36;',
                            'TZS' => '',
                            'UAH' => '&#8372;',
                            'UGX' => '&#85;&#83;&#104;',
                            'USD' => '&#36;',
                            'UYU' => '&#36;&#85;',
                            'UZS' => '&#1083;&#1074;',
                            'VEF' => '&#66;&#115;',
                            'VND' => '&#8363;',
                            'VUV' => '&#86;&#84;',
                            'WST' => '&#87;&#83;&#36;',
                            'XAF' => '&#70;&#67;&#70;&#65;',
                            'XCD' => '&#36;',
                            'XDR' => '',
                            'XOF' => '',
                            'XPF' => '&#70;',
                            'YER' => '&#65020;',
                            'ZAR' => '&#82;',
                            'ZMK' => '&#90;&#75;', // ?
                            'ZWL' => '&#90;&#36;',
                        );
            
            $currency_html_code=$currency_symbols[$code];

            return $currency_html_code;
    }

}

if (! function_exists('getCurrencyList')) {
    function getCurrencyList()
    {                   
            // count 164
            $currency_list = array(
                "AFA" => "Afghan Afghani",
                "ALL" => "Albanian Lek",
                "DZD" => "Algerian Dinar",
                "AOA" => "Angolan Kwanza",
                "ARS" => "Argentine Peso",
                "AMD" => "Armenian Dram",
                "AWG" => "Aruban Florin",
                "AUD" => "Australian Dollar",
                "AZN" => "Azerbaijani Manat",
                "BSD" => "Bahamian Dollar",
                "BHD" => "Bahraini Dinar",
                "BDT" => "Bangladeshi Taka",
                "BBD" => "Barbadian Dollar",
                "BYR" => "Belarusian Ruble",
                "BEF" => "Belgian Franc",
                "BZD" => "Belize Dollar",
                "BMD" => "Bermudan Dollar",
                "BTN" => "Bhutanese Ngultrum",
                "BTC" => "Bitcoin",
                "BOB" => "Bolivian Boliviano",
                "BAM" => "Bosnia",
                "BWP" => "Botswanan Pula",
                "BRL" => "Brazilian Real",
                "GBP" => "British Pound Sterling",
                "BND" => "Brunei Dollar",
                "BGN" => "Bulgarian Lev",
                "BIF" => "Burundian Franc",
                "KHR" => "Cambodian Riel",
                "CAD" => "Canadian Dollar",
                "CVE" => "Cape Verdean Escudo",
                "KYD" => "Cayman Islands Dollar",
                "XOF" => "CFA Franc BCEAO",
                "XAF" => "CFA Franc BEAC",
                "XPF" => "CFP Franc",
                "CLP" => "Chilean Peso",
                "CNY" => "Chinese Yuan",
                "COP" => "Colombian Peso",
                "KMF" => "Comorian Franc",
                "CDF" => "Congolese Franc",
                "CRC" => "Costa Rican ColÃ³n",
                "HRK" => "Croatian Kuna",
                "CUC" => "Cuban Convertible Peso",
                "CZK" => "Czech Republic Koruna",
                "DKK" => "Danish Krone",
                "DJF" => "Djiboutian Franc",
                "DOP" => "Dominican Peso",
                "XCD" => "East Caribbean Dollar",
                "EGP" => "Egyptian Pound",
                "ERN" => "Eritrean Nakfa",
                "EEK" => "Estonian Kroon",
                "ETB" => "Ethiopian Birr",
                "EUR" => "Euro",
                "FKP" => "Falkland Islands Pound",
                "FJD" => "Fijian Dollar",
                "GMD" => "Gambian Dalasi",
                "GEL" => "Georgian Lari",
                "DEM" => "German Mark",
                "GHS" => "Ghanaian Cedi",
                "GIP" => "Gibraltar Pound",
                "GRD" => "Greek Drachma",
                "GTQ" => "Guatemalan Quetzal",
                "GNF" => "Guinean Franc",
                "GYD" => "Guyanaese Dollar",
                "HTG" => "Haitian Gourde",
                "HNL" => "Honduran Lempira",
                "HKD" => "Hong Kong Dollar",
                "HUF" => "Hungarian Forint",
                "ISK" => "Icelandic KrÃ³na",
                "INR" => "Indian Rupee",
                "IDR" => "Indonesian Rupiah",
                "IRR" => "Iranian Rial",
                "IQD" => "Iraqi Dinar",
                "ILS" => "Israeli New Sheqel",
                "ITL" => "Italian Lira",
                "JMD" => "Jamaican Dollar",
                "JPY" => "Japanese Yen",
                "JOD" => "Jordanian Dinar",
                "KZT" => "Kazakhstani Tenge",
                "KES" => "Kenyan Shilling",
                "KWD" => "Kuwaiti Dinar",
                "KGS" => "Kyrgystani Som",
                "LAK" => "Laotian Kip",
                "LVL" => "Latvian Lats",
                "LBP" => "Lebanese Pound",
                "LSL" => "Lesotho Loti",
                "LRD" => "Liberian Dollar",
                "LYD" => "Libyan Dinar",
                "LTL" => "Lithuanian Litas",
                "MOP" => "Macanese Pataca",
                "MKD" => "Macedonian Denar",
                "MGA" => "Malagasy Ariary",
                "MWK" => "Malawian Kwacha",
                "MYR" => "Malaysian Ringgit",
                "MVR" => "Maldivian Rufiyaa",
                "MRO" => "Mauritanian Ouguiya",
                "MUR" => "Mauritian Rupee",
                "MXN" => "Mexican Peso",
                "MDL" => "Moldovan Leu",
                "MNT" => "Mongolian Tugrik",
                "MAD" => "Moroccan Dirham",
                "MZM" => "Mozambican Metical",
                "MMK" => "Myanmar Kyat",
                "NAD" => "Namibian Dollar",
                "NPR" => "Nepalese Rupee",
                "ANG" => "Netherlands Antillean Guilder",
                "TWD" => "New Taiwan Dollar",
                "NZD" => "New Zealand Dollar",
                "NIO" => "Nicaraguan CÃ³rdoba",
                "NGN" => "Nigerian Naira",
                "KPW" => "North Korean Won",
                "NOK" => "Norwegian Krone",
                "OMR" => "Omani Rial",
                "PKR" => "Pakistani Rupee",
                "PAB" => "Panamanian Balboa",
                "PGK" => "Papua New Guinean Kina",
                "PYG" => "Paraguayan Guarani",
                "PEN" => "Peruvian Nuevo Sol",
                "PHP" => "Philippine Peso",
                "PLN" => "Polish Zloty",
                "QAR" => "Qatari Rial",
                "RON" => "Romanian Leu",
                "RUB" => "Russian Ruble",
                "RWF" => "Rwandan Franc",
                "SVC" => "Salvadoran ColÃ³n",
                "WST" => "Samoan Tala",
                "SAR" => "Saudi Riyal",
                "RSD" => "Serbian Dinar",
                "SCR" => "Seychellois Rupee",
                "SLL" => "Sierra Leonean Leone",
                "SGD" => "Singapore Dollar",
                "SKK" => "Slovak Koruna",
                "SBD" => "Solomon Islands Dollar",
                "SOS" => "Somali Shilling",
                "ZAR" => "South African Rand",
                "KRW" => "South Korean Won",
                "XDR" => "Special Drawing Rights",
                "LKR" => "Sri Lankan Rupee",
                "SHP" => "St. Helena Pound",
                "SDG" => "Sudanese Pound",
                "SRD" => "Surinamese Dollar",
                "SZL" => "Swazi Lilangeni",
                "SEK" => "Swedish Krona",
                "CHF" => "Swiss Franc",
                "SYP" => "Syrian Pound",
                "STD" => "São Tomé and Príncipe Dobra",
                "TJS" => "Tajikistani Somoni",
                "TZS" => "Tanzanian Shilling",
                "THB" => "Thai Baht",
                "TOP" => "Tongan pa'anga",
                "TTD" => "Trinidad & Tobago Dollar",
                "TND" => "Tunisian Dinar",
                "TRY" => "Turkish Lira",
                "TMT" => "Turkmenistani Manat",
                "UGX" => "Ugandan Shilling",
                "UAH" => "Ukrainian Hryvnia",
                "AED" => "United Arab Emirates Dirham",
                "UYU" => "Uruguayan Peso",
                "USD" => "US Dollar",
                "UZS" => "Uzbekistan Som",
                "VUV" => "Vanuatu Vatu",
                "VEF" => "Venezuelan BolÃvar",
                "VND" => "Vietnamese Dong",
                "YER" => "Yemeni Rial",
                "ZMK" => "Zambian Kwacha"
            );
 

            return $currency_list;
    }

}


if (! function_exists('plan_decimal_price')) {
    function plan_decimal_price($price, $decimal_separator='.', $thousand_separator=',' ) {
        $unit = number_format( intval( $price ), 0, $decimal_separator, $thousand_separator );
        $decimal = sprintf( '%02d', ( $price - intval( $price ) ) * 100 );
        return $unit . '<sub style="bottom:0px;">' . $decimal_separator. $decimal . '</sub>';
    }
}