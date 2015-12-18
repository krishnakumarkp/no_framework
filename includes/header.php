<?php
        /*** if a user is logged in ***/
    if(isset($_SESSION['access_level'])) {
            $log_link = 'logout.php';
            $log_link_name = 'Log Out';
    }
    else {
            $log_link = 'login.php';
            $log_link_name = 'Log In';
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
            Created by Artisteer v3.1.0.48375
            Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
            -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Home</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
        <!--[if IE 6]>
        <link rel="stylesheet" href="css/style.ie6.css" type="text/css" media="screen" />
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/style.ie7.css" type="text/css" media="screen" />
        <![endif]-->
        <script type="text/javascript" src="scripts/jquery.js"></script>
        <script type="text/javascript" src="scripts/script.js"></script>
    </head>
    <body>
        <div id="art-main">
            <div class="cleared reset-box"></div>
            <div class="art-box art-sheet">
                <div class="art-box-body art-sheet-body">
                    <div class="art-header">
                        <div class="art-bar art-nav">
                            <div class="art-nav-outer">
                                <div class="art-nav-wrapper">
                                    <div class="art-nav-inner">
                                        <ul class="art-hmenu">
                                            <li>
                                                <a href="index.php" class="active">Home</a>
                                            </li>
                                             <li>
                                               <a href="add_user.php">Add User</a>
                                            </li>
                                            <li>
                                               <a href="<?php echo $log_link; ?>"><?php echo $log_link_name; ?></a>
                                            </li>
                                            <li>
                                                <a href="#">About</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cleared reset-box"></div>
                        <div class="art-logo">
                            <h1 class="art-logo-name"><a href="#">Headline</a></h1>
                            <h2 class="art-logo-text">Slogan text</h2>
                        </div>
                    </div>
                    <div class="cleared reset-box"></div>
                    <div class="art-layout-wrapper">
                        <div class="art-content-layout">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell art-content">