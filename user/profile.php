<?php
/**
 * @Author: prpr
 * @Date:   2016-02-03 16:12:45
 * @Last Modified by:   prpr
 * @Last Modified time: 2016-02-03 17:21:31
 */

session_start();
$dir = dirname(dirname(__FILE__));
require "$dir/includes/autoload.inc.php";
require "$dir/config.php";

if(isset($_COOKIE['uname']) && isset($_COOKIE['token'])) {
    $_SESSION['uname'] = $_COOKIE['uname'];
    $_SESSION['token'] = $_COOKIE['token'];
}

if (isset($_SESSION['uname'])) {
    $user = new user($_SESSION['uname']);
    if ($_SESSION['token'] != $user->getToken()) {
        header('Location: ../index.php?msg=Invalid token. Please login.');
    }
} else {
    header('Location: ../index.php?msg=Illegal access. Please login.');
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Blessing Skin Server</title>
    <link rel="stylesheet" href="../libs/pure/pure-min.css">
    <link rel="stylesheet" href="../libs/pure/grids-responsive-min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/profile.style.css">
    <link rel="stylesheet" href="../libs/ply/ply.css">
</head>
<body>
<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="../index.php">Blessing Skin Server</a>
        <a href="javascript:;" title="Movements"><span class="glyphicon glyphicon-pause"></span></a>
        <a href="javascript:;" title="Running"><span class="glyphicon glyphicon-forward"></span></a>
        <a href="javascript:;" title="Rotation"><span class="glyphicon glyphicon-repeat"></span></a>
        <ul class="pure-menu-list">
            <li class="pure-menu-item">
                    <a href="javascript:;" class="pure-menu-link">Welcome, <?php echo $_SESSION['uname']; ?>!</a>
             </li>
            <li class="pure-menu-item">
                <a class="pure-menu-link" id="logout" href="javascript:;">Log out?</a>
            </li>
        </ul>
        <div class="home-menu-blur">
            <div class="home-menu-wrp">
                <div class="home-menu-bg"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <form class="pure-form pure-form-stacked">
                        <input id="password" type="password" placeholder="Old password">
                        <input id="password" type="password" placeholder="New password">
                        <input id="password" type="password" placeholder="Repeat to confirm">
                        <button class="pure-button pure-button-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Delete Account</div>
                <div class="panel-body">
                    <p>Are you sure you want to delete your account?</p>
                    <p>You're about to delete your account on Blessing Skin Server.</p>
                    <p>This is permanent! No backups, no restores, no magic undo button.</p>
                    <p>We warned you, ok?</p>
                    <button class="pure-button pure-button-error">I am sure.</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    &copy; <a class="copy" href="https://prinzeugen.net">Blessing Studio</a> 2016
</div>

</body>
<script type="text/javascript" src="../libs/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../libs/ply/ply.min.js"></script>
<script type="text/javascript" src="../assets/js/profile.utils.js"></script>
</html>