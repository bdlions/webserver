<!DOCTYPE html>
<html lang="en" class="js no-flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Dedicated for selling textile product">
        <meta name="author" content="Nazmul Hasan, Alamgir Kabir">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="og:site_name" content="apurbobrand" />
        <meta name="og:title" content="buy and sales" />
        <meta name="og:description" content="soport website" />	
        <meta name="keywords" content=""/>
        <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="css/charisma-app.css" rel="stylesheet">
        <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
        <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
        <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
        <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
        <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
        <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
        <link href='css/jquery.noty.css' rel='stylesheet'>
        <link href='css/noty_theme_default.css' rel='stylesheet'>
        <link href='css/elfinder.min.css' rel='stylesheet'>
        <link href='css/elfinder.theme.css' rel='stylesheet'>
        <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='css/uploadify.css' rel='stylesheet'>
        <link href='css/animate.min.css' rel='stylesheet'>
        <link href='resources/css/custom.css' rel='stylesheet'>
        <link href='bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
        <!-- The fav icon -->
        <link rel="shortcut icon" href="resources/images/bkashLogo.ico">
                <!-- jQuery -->
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/jquery-ui.min.js"></script>
        <script src="resources/js/jquery.scrollbar.min.js"></script>

        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- library for cookie management -->
        <script src="js/jquery.cookie.js"></script>
        <!-- calender plugin -->
        <script src='bower_components/moment/min/moment.min.js'></script>
        <script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
        <!-- data table plugin -->
        <script src='js/jquery.dataTables.min.js'></script>

        <!-- select or dropdown enhancer -->
        <script src="bower_components/chosen/chosen.jquery.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
        <!-- notification plugin -->
        <script src="js/jquery.noty.js"></script>
        <!-- library for making tables responsive -->
        <script src="bower_components/responsive-tables/responsive-tables.js"></script>
        <!-- tour plugin -->
        <script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
        <!-- star rating plugin -->
        <script src="js/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="js/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="js/jquery.autogrow-textarea.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="js/charisma.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/tmpl.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/tmpl.min.js"></script>
        <title>
            <?php
            if (empty($title)) {
                echo "Sportzweb";
            } else {
                echo $title;
            }
            ?>
        </title>
    </head>
    <body>
        <?php $this->load->view("auth/admin/templates/sections/header");?>
        <?php echo $contents?>
        <?php $this->load->view("auth/admin/templates/sections/footer");?>
    </body>
</html>