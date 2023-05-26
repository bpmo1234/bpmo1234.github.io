<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
<meta name="description" content="">
<meta name="msapplication-tap-highlight" content="yes" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Email Template</title>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style type="text/css">
@import url(https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap);
body {margin: 0; padding: 0; min-width: 100%!important;}
img {height: auto;}
a {transition: 0.4s;}
a:active, a:hover {outline: 0;transition: 0.4s;}
.content {width: 100%; max-width: 520px;}
.header {padding: 40px 30px 20px 30px;}
.innerpadding {padding:25px 30px;}
body[yahoo] .unsubscribe {width:170px;display: block; margin-top: 15px; padding: 8px 20px; background: #fe0531; color:#ffffff; border-radius: 4px; text-decoration: none!important; font-weight: 500;}
body[yahoo] .unsubscribe:hover {background: #2f3942;color:#acb1b5;}

@media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
.innerpadding {padding:30px 20px;}
body[yahoo] .hide {display: none!important;}
body[yahoo] .buttonwrapper {background-color: transparent!important;}
body[yahoo] .button {padding: 0px!important;}
body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
body[yahoo] .unsubscribe {display: block; margin-top: 15px; padding: 10px 20px; background: #2f3942; border-radius: 4px; text-decoration: none!important; font-weight: 500;}
.h1 {font-size: 26px;line-height: 36px;}
}
</style>
</head>

<body yahoo bgcolor="#ffffff">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <table bgcolor="#151c26" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td>
          <table align="center" border="0" cellpadding="0" cellspacing="0" style="position:relative">  
            <tr>
        <td>
        <span style="width: 146px;height: 39px;background: rgba(21, 28, 38, 0.5);border-radius: 4px;padding: 15px 10px 10px 10px;display: block;margin: 0 auto;text-align: center;margin-top: 20px;"><a href="#"><img src="{{ URL::asset('/'.getcong('site_logo')) }}" border="0" alt="" /></a></span>
              </td>
            </tr>
          </table>                    
        </td>
      </tr>
      <tr>
        <td style="padding: 30px 50px;border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-family: Rubik;font-size: 18px;line-height: 28px;font-weight: 500;color: #acb1b5;padding-bottom: 15px;">Hello Admin,</td>
            </tr>
            <tr>
              <td style="font-size: 16px;line-height: 26px;margin-bottom: 15px;display: inline-block;color: #acb1b5;font-family: Rubik;">Contact details below...</td>
            </tr>
            <tr>
              <td style="font-size: 16px;line-height: 26px;margin-bottom: 15px;display: inline-block;color: #acb1b5;font-family: Rubik;">
                  
                  Name: <?php echo $name?><br/>
                  Email: <?php echo $email ?><br/>
                  Phone: <?php echo $phone ?><br/>    
                  Subject: <?php echo $subject ?><br/>
                  Message: <?php echo $user_message ?><br/>

              </td>
            </tr>
            <!-- <tr>
              <td style="display: inline-block;padding: 10px 0;margin: 5px 0 15px 0;"><a href="#" class="es-button" target="_blank" style="font-family: Rubik;font-weight: 500;font-size: 16px; border-radius: 5px; background: #fe0531;text-decoration:none;border-style: solid;border-color: #fe0531;color:#ffffff;border-width: 10px 20px 10px 20px;">Get Started</a></td>
            </tr> -->
       
            <tr>
              <td style="font-size: 16px;line-height: 26px;margin-bottom: 15px;display: inline-block;color: #acb1b5;font-family: Rubik;">-{{getcong('site_name')}}</td>  
            </tr>     
          </table>
        </td>
      </tr>
      <tr>
        <td style="padding: 20px 40px 15px 40px;" bgcolor="#f8f8f8">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" style="font-family: Rubik;font-size: 14px;color: #727272;">Question? Visit the Help Center or email <a href="#" style="width: 170px;display: block;margin-top: 15px;padding: 8px 20px;background: #fe0531;color: #ffffff;border-radius: 4px;text-decoration: none !important;font-weight: 500;"><font>{{getcong('site_email')}}</font></a></td>
            </tr>
            <tr>
              <td align="center" style="padding: 20px 0 0 0;">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="36" style="text-align:center;padding:0 4px;">
                      <a href="{{stripslashes(getcong('footer_fb_link'))}}">
                        <img src="{{ URL::asset('site_assets/images/email/ic-fb.png') }}" width="36" height="36" alt="Facebook" border="0" />
                      </a>
                    </td>
                    <td width="36" style="text-align:center;padding:0 4px;">
                      <a href="{{stripslashes(getcong('footer_twitter_link'))}}">
                        <img src="{{ URL::asset('site_assets/images/email/ic-tw.png') }}" width="36" height="36" alt="Twitter" border="0" />
                      </a>
                    </td>           
                    <td width="36" style="text-align:center;padding:0 4px;">
                      <a href="{{stripslashes(getcong('footer_instagram_link'))}}">
                        <img src="{{ URL::asset('site_assets/images/email/ic-in.png') }}" width="36" height="36" alt="Instagram" border="0" />
                      </a>
                    </td>            
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>    
    </td>
  </tr>
</table>
</body>
</html>