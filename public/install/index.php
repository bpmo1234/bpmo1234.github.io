<?php
session_start();



require_once '../lb_helper.php'; // Include LicenseBox external/client api helper file
$api = new LicenseBoxAPI(); // Initialize a new LicenseBoxAPI object
 
$filename = 'database.sql';

$product_info=$api->get_latest_version();

function getBaseUrl() {
     
     if( isset($_SERVER['HTTPS'] ) ) 
      {  
        $file_path = 'https://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
      }
      else
      {
        $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
      }

      return substr($file_path,0,-8);
}
 
//print_r($product_info);
//exit;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title><?php echo $product_info['product_name']; ?> - Installer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <style type="text/css">
      body, html {
        background: #F7F7F7;
      }
    </style>
  </head>
  <body>
    <?php
      $errors = false;
      $step = isset($_GET['step']) ? $_GET['step'] : '';
    ?>
    <div class="container"> 
      <div class="section">
        <div class="column is-6 is-offset-3">
          <center>
            <h1 class="title" style="padding-top: 20px"><?php echo $product_info['product_name'];?> Installer</h1><br>
          </center>
          <div class="box">
            <?php
            switch ($step) {
              default: ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li class="is-active">
                      <a>
                        <span><b>Requirements</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Verify</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Database</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Finish</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php  
                // Add or remove your script's requirements below
                if(phpversion() < "7.4"){
                  $errors = true;
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Current PHP version is ".phpversion()."! minimum PHP 7.4 or higher required.</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> You are running PHP version ".phpversion()."</div>";
                }

                if(!extension_loaded('bcmath')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> BCMath PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> BCMath PHP extension available</div>";
                }

                if(!extension_loaded('ctype')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> CTYPE PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> CTYPE PHP extension available</div>";
                }

                if(!extension_loaded('fileinfo')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Fileinfo PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Fileinfo PHP extension available</div>";
                }

                 if(!extension_loaded('json')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> JSON PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> JSON PHP extension available</div>";
                }

                
                if(!extension_loaded('mbstring')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Mbstring PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Mbstring PHP extension available</div>";
                }
  

                if(!extension_loaded('openssl')){
                  $errors = true; 
                echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Openssl PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Openssl PHP extension available</div>";
                }

                if(!extension_loaded('pdo')){
                  $errors = true; 
                echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> PDO PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> PDO PHP extension available</div>";
                }

                if(!extension_loaded('tokenizer')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Tokenizer PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Tokenizer PHP extension available</div>";
                }
 
               
                if(!extension_loaded('xml')){
                  $errors = true; 
                  echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> XML PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> XML PHP extension available</div>";
                }

                if(!extension_loaded('curl')){
                  $errors = true; 
                echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Curl PHP extension missing!</div>";
                }else{
                  echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> Curl PHP extension available</div>";
                }
 
                 
                  
                ?>
                <div style='text-align: right;'>
                  <?php if($errors==true){ ?>
                  <a href="#" class="button is-link" disabled>Next</a>
                  <?php }else{ ?>
                  <a href="index.php?step=0" class="button is-link">Next</a>
                  <?php } ?>
                </div><?php
                break;
              case "0": ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                      </a>
                    </li>
                    <li class="is-active">
                      <a>
                        <span><b>Verify</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Database</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Finish</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                  $license_code = null;
                  $client_name = null;
                  if(!empty($_POST['license'])&&!empty($_POST['client'])){
                    $license_code = strip_tags(trim($_POST["license"]));
                    $client_name = strip_tags(trim($_POST["client"]));
                    /* Once we have the license code and client's name we can use LicenseBoxAPI's activate_license() function for activating/installing the license, if the third parameter is empty a local license file will be created which can be used for background license checks. */
                    $activate_response = $api->activate_license($license_code,$client_name);

                    $_SESSION['envato_buyer_name']=$client_name;
                    $_SESSION['envato_purchase_code']=$license_code;
                     
                    if(empty($activate_response)){
                      $msg='Server is unavailable.';
                    }else{
                      $msg=$activate_response['message'];
                    }
                    if($activate_response['status'] != true){ ?>
                      <form action="index.php?step=0" method="POST">
                        <div class="notification is-danger"><?php echo ucfirst($msg); ?></div>
                        
                        <div class="field">
                          <label class="label">Envato Username
                          <p class="control-label-help">https://codecanyon.net/user/<u style="color: #e91e63">viaviwebtech</u></p>
                              <p class="control-label-help">(<u style="color: #e91e63">viaviwebtech</u> is username)</p></label>
                          <div class="control">
                            <input class="input" type="text" placeholder="enter your name" name="client" required>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label">License code
                            Envato Purchase Code
                          <p class="control-label-help">nulled</p>
                          </label>
                          <div class="control">
                            <input class="input" type="text" placeholder="enter your purchase" name="license" required>
                          </div>
                        </div>
                        <div style='text-align: right;'>
                          <button type="submit" class="button is-link">Verify</button>
                        </div>
                      </form><?php
                    }else{ 
 
                      ?>



                      <form action="index.php?step=1" method="POST">
                        <div class="notification is-success"><?php echo ucfirst($msg); ?></div>
                        <input type="hidden" name="lcscs" id="lcscs" value="<?php echo ucfirst($activate_response['status']); ?>">
                        <div style='text-align: right;'>
                          <button type="submit" class="button is-link">Next</button>
                        </div>
                      </form><?php
                    }
                  }else{ ?>
                    <form action="index.php?step=0" method="POST">
                      <div class="field">
                        <label class="label">Envato Username
                          <p class="control-label-help">https://codecanyon.net/user/<u style="color: #e91e63">viaviwebtech</u></p>
                              <p class="control-label-help">(<u style="color: #e91e63">viaviwebtech</u> is username)</p></label>
                        <div class="control">
                          <input class="input" type="text" placeholder="envato username" name="client" required>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Envato Purchase Code
                          <p class="control-label-help">(<a href="https://cutt.ly/PLFZenO" target="_blank">NULLED :: Web Community</a>)</p>
                        </label>
                        <div class="control">
                          <input class="input" type="text" placeholder="enter your purchase" name="license" required>
                        </div>
                      </div>
                      
                      <div style='text-align: right;'>
                        <button type="submit" class="button is-link">Verify</button>
                      </div>
                    </form>
                  <?php } 
                break;
              case "1": ?>
                <div class="tabs is-fullwidth">
                  <ul>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Requirements</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span><i class="fa fa-check-circle"></i> Verify</span>
                      </a>
                    </li>
                    <li class="is-active">
                      <a>
                        <span><b>Database</b></span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>Finish</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <?php
                  if($_POST && isset($_POST["lcscs"])){
                    $valid = strip_tags(trim($_POST["lcscs"]));
                    $db_host = strip_tags(trim($_POST["host"]));
                    $db_user = strip_tags(trim($_POST["user"]));
                    $db_pass = strip_tags(trim($_POST["pass"]));
                    $db_name = strip_tags(trim($_POST["name"]));
                    // Let's import the sql file into the given database
                    if(!empty($db_host)){

                      $myfile = fopen("../../.env", "w") or die("Unable to open file!");
                      $txt = "";
                      fwrite($myfile, $txt);
                      $txt = "APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:1rEFpUtOFXmy15sMO6Fie+uC1fz6bZlWGLTAIdOPcOE=
APP_DEBUG=false
APP_URL=".getBaseUrl()."

APP_TIMEZONE=Asia/Kolkata
APP_LANG=en

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=".$db_host."
DB_PORT=3306
DB_DATABASE=".$db_name."
DB_USERNAME=".$db_user."
DB_PASSWORD=".$db_pass."

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY=
MIX_PUSHER_APP_CLUSTER=

STRIPE_SECRET=

BUYER_NAME=
BUYER_PURCHASE_CODE=
BUYER_EMAIL=
BUYER_APP_PACKAGE_NAME=app.streaming.com

GOOGLE_CLIENT_DI=
GOOGLE_SECRET=
GOOGLE_REDIRECT=

FB_APP_ID=
FB_SECRET=
FB_REDIRECT=

PAYPAL_MODE=
PAYPAL_SANDBOX_CLIENT_ID=
PAYPAL_SANDBOX_CLIENT_SECRET=
PAYPAL_LIVE_CLIENT_ID=
PAYPAL_LIVE_CLIENT_SECRET=
";
                      fwrite($myfile, $txt);
                      fclose($myfile);

                      $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                      mysqli_query($con,"SET NAMES 'utf8'");  

                      if(mysqli_connect_errno()){ ?>
                        <form action="index.php?step=1" method="POST">
                          <div class='notification is-danger'>Failed to connect to MySQL: <?php echo mysqli_connect_error(); ?></div>
                          <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                          <div class="field">
                            <label class="label">Database Host</label>
                            <div class="control">
                              <input class="input" type="text" id="host" placeholder="enter your database host" name="host" required>
                            </div>
                          </div>
                          <div class="field">
                            <label class="label">Database Username</label>
                            <div class="control">
                              <input class="input" type="text" id="user" placeholder="enter your database username" name="user" required>
                            </div>
                          </div>
                          <div class="field">
                            <label class="label">Database Password</label>
                            <div class="control">
                              <input class="input" type="text" id="pass" placeholder="enter your database password" name="pass">
                            </div>
                          </div>
                          <div class="field">
                            <label class="label">Database Name</label>
                            <div class="control">
                              <input class="input" type="text" id="name" placeholder="enter your database name" name="name" required>
                            </div>
                          </div>
                          <div style='text-align: right;'>
                            <button type="submit" class="button is-link">Import</button>
                          </div>
                        </form><?php
                        exit;
                      }
                      $templine = '';
                      $lines = file($filename);
                      foreach($lines as $line){
                        if(substr($line, 0, 2) == '--' || $line == '')
                          continue;
                        $templine .= $line;
                        $query = false;
                        if(substr(trim($line), -1, 1) == ';'){
                          $query = mysqli_query($con, $templine);
                          $templine = '';
                        }
                      } 

                      //Update buyer name and code
                      $envato_sql="UPDATE settings SET `envato_buyer_name` = '".$_SESSION['envato_buyer_name']."',`envato_purchase_code` = '".$_SESSION['envato_purchase_code']."'WHERE `id`='1'";

                      mysqli_query($con, $envato_sql);
                       
                      ?>
                    <form action="index.php?step=2" method="POST">
                      <div class='notification is-success'>Database was successfully imported.</div>
                      <input type="hidden" name="dbscs" id="dbscs" value="true">
                      <div style='text-align: right;'>
                        <button type="submit" class="button is-link">Next</button>
                      </div>
                    </form><?php
                  }else{ ?>
                    <form action="index.php?step=1" method="POST">
                      <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                      <div class="field">
                        <label class="label">Database Host</label>
                        <div class="control">
                          <input class="input" type="text" id="host" placeholder="enter your database host" name="host" required>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Database Username</label>
                        <div class="control">
                          <input class="input" type="text" id="user" placeholder="enter your database username" name="user" required>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Database Password</label>
                        <div class="control">
                          <input class="input" type="text" id="pass" placeholder="enter your database password" name="pass">
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Database Name</label>
                        <div class="control">
                          <input class="input" type="text" id="name" placeholder="enter your database name" name="name" required>
                        </div>
                      </div>
                      <div style='text-align: right;'>
                        <button type="submit" class="button is-link">Import</button>
                      </div>
                    </form><?php
                } 
              }else{ ?>
                <div class='notification is-danger'>Sorry, something went wrong.</div><?php
              }
              break;
            case "2": ?>
              <div class="tabs is-fullwidth">
                <ul>
                  <li>
                    <a>
                      <span><i class="fa fa-check-circle"></i> Requirements</span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span><i class="fa fa-check-circle"></i> Verify</span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span><i class="fa fa-check-circle"></i> Database</span>
                    </a>
                  </li>
                  <li class="is-active">
                    <a>
                      <span><b>Finish</b></span>
                    </a>
                  </li>
                </ul>
              </div>
              <?php
              if($_POST && isset($_POST["dbscs"])){
                $valid = $_POST["dbscs"];
                ?>
                <center>
                  <p><strong><?php echo $product_info['product_name']; ?> is successfully installed.</strong></p><br>
                  <br>
                  <p>You can now login using your email: <strong>admin@admin.com</strong> and default password: <strong>admin</strong></p><br><strong>
                  <p><a class='button is-link' href='../admin'>Login</a></p></strong>
                  <br>
                  <p class='help has-text-grey'>The first thing you should do is change your account details.</p>
                </center>
                <?php
              }else{ ?>
                <div class='notification is-danger'>Sorry, something went wrong.</div><?php
              } 
            break;
          } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="content has-text-centered">
    <p>Copyright <?php echo date('Y'); ?> Viaviweb.com, All rights reserved.</p><br>
  </div>
</body>
</html>
 