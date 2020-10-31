<?php
error_reporting(0);
define('BASEPATH', str_replace("\\", "/", 'system'));

require_once 'vendor/Facebook/autoload.php';
require_once 'application/config/database.php';
require_once 'application/config/facebook.php';
require_once 'application/config/config.php';
session_start(); //Session should be active




?>
    <script type="text/javascript">
   	// Javascript URL redirection
    //window.location.replace("https://www.facebook.com/v2.12/dialog/oauth?client_id=<?=$config['facebook_app_id']?>&redirect_uri=<?=$config['url_login']?>&response_type=token&scope=email,public_profile");
    window.location.href = "<?=$config['url_login']?>?callback=" + "<?=urlencode($config['url_end'])?>";
</script>
