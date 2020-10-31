<?php
error_reporting(0);

define('BASEPATH', str_replace("\\", "/", 'system'));

session_start(); //Session should be active
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once 'application/config/database.php';
require_once 'application/config/facebook.php';
require_once 'application/config/config.php';

require_once 'vendor/Facebook/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bán acc liên quân, liên minh</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <script>

    window.onload = function () {
        document.location.href = '<?=$config['url_end']?>?token=' + getParameterByName('access_token');
    };

    function getParameterByName(name) {

        var _url = window.location.href.indexOf('?') > -1 ? window.location.href.replace('#', '') : window.location.href.replace('#', '?');
        var match = RegExp('[?&]' + name + '=([^&]*)').exec(_url);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }
    </script>
</body>
</html>

