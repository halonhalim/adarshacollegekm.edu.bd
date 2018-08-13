<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8"/>
    <title>404 - Error page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lukman"/>
    <meta name="keywords" content="oYo"/>
    <meta name="description" content="oYo - Error page"/>
    <link rel="shortcut icon" href="<?php echo config_item('base_url').'assets/admin/img/';?>favicon.png" >
	
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo config_item('base_url').'assets/admin/';?>404-template/css/style.css">

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" media="all" href="css/ie.css" />
    <script type="text/javascript" src="js/html5.js" ></script>
    <![endif]-->

	<!-- Javascripts -->
	<script type="text/javascript" charset="utf-8" src="<?php echo config_item('base_url').'assets/admin/';?>404-template/js/jquery-1.8.3.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo config_item('base_url').'assets/admin/';?>404-template/js/plax.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo config_item('base_url').'assets/admin/';?>404-template/js/404.js"></script>
</head>
	<body id="errorpage" class="error404">
        <div id="pagewrap">
            
			<!--page content-->
            <div id="wrapper" class="clearfix">     
                <div id="parallax_wrapper">    
                    <div id="content">
                        <h1>Oh No!<br />It looks like you are lost</h1>
                        <p>The page you're looking for is not here.</p>
                        <a href="<?php echo config_item('base_url');?>" title="" class="button">Go Home</a>
                    </div>
                </div>
            </div>

        </div><!-- end pagewrap -->

    </body>
</html>

