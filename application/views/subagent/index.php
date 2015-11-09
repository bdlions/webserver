<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
            ===
            This comment should NOT be removed.
    
            Charisma v2.0.0
    
            Copyright 2012-2014 Muhammad Usman
            Licensed under the Apache License v2.0
            http://www.apache.org/licenses/LICENSE-2.0
    
            http://usman.it
            http://twitter.com/halalit_usman
            ===
        -->
        <meta charset="utf-8">
        <title>Congrats! You are on ...</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
        <meta name="author" content="A.K.M. Nazmul Islam">

        <!-- The styles -->
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



        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
         <script src="resources/js/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
       <link rel="shortcut icon" href="resources/images/bkashLogo.ico">
   

    </head>

    <body>

        <div class="navbar navbar-default">
            <div class="navbar-inner">

                <a class="navbar-brand" href="http://www.bkash.com/" target="_blank"> <img alt="bKash Logo" src="resources/images/bkashLogo.png" class="hidden-xs"/>
                    <span>bKash</span></a>

                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user yellow"></i><span class="hidden-sm hidden-xs"> sub-agent</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>

                <!-- theme selector starts -->
                <div class="btn-group pull-right theme-container animated tada">
                    <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-tint red"></i><span
                            class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="themes">
                        <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                        <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                        <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                        <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                        <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                        <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                        <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                        <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                        <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="ch-container">
            <div class="row">

                <!-- left menu starts -->
                <div class="col-sm-2">
                    <div class="sidebar-nav">
                        <div class="nav-canvas">
                            <div class="nav-sm nav nav-stacked">

                            </div>
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header glyphicon glyphicon-home"> Main</li>
                                <li id="nav_subagent_transaction_history"><a class="ajax-link"><i class="glyphicon glyphicon-minus-sign"></i><span> Transaction History</span></a>
                                </li>
                                <li id="nav_balance_history"><a class="ajax-link"><i class="glyphicon glyphicon-star"></i> Balance History</a>
                            </li>
                                <li id="nav_profit_summary"><a class="ajax-link"><i class="glyphicon glyphicon-briefcase"></i><span> Profit Summary</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- content starts -->
                <div class="col-sm-10">
                    <div>
                        <ul class="breadcrumb">
                            <li>
                                Home
                            </li>
                        </ul>
                    </div>

                    <!--Sub-agent Transaction History-->
                    <div id="subagent_transaction_history" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-minus-sign"></i> Transaction History</h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="box-content">
                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-2">
                                                        <div class="start_datepicker">
                                                            <p> <input type="text" id="transaction_history_start_datepicker" placeholder="Start Date"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-2">
                                                        <div class="end_datepicker">
                                                            <p> <input type="text" id="transaction_history_end_datepicker" placeholder="End Date"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-2">
                                                        <input type="text" placeholder="Start Time">
                                                    </div> 
                                                    <div class="col-md-2">
                                                        <input type="text" placeholder="End Time">
                                                    </div> 
                                                    <div class="col-md-2 pull-right">
                                                        <a class="ajax-link">
                                                            <input class="btn btn-sm btn-default" type="button" value="Search">
                                                        </a>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-3">
                                                        <input type="checkbox"> 
                                                        <span style="vertical-align: top;">Show All</span>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label>Mushfiqur Rahim</label>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered responsive">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">Date</th>
                                                            <th class="center">Amount</th>
                                                            <th class="center">Mobile No</th>
                                                            <th class="center">Reference</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:00 Am</td>
                                                            <td class="center">100</td>
                                                            <td class="center">0123456789</td>
                                                            <td class="center">Ref 1</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:15 Am</td>
                                                            <td class="center">200</td>
                                                            <td class="center">1234567890</td>
                                                            <td class="center">Ref 2</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:30 Am</td>
                                                            <td class="center">300</td>
                                                            <td class="center">2345678901</td>
                                                            <td class="center">Ref 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:45 Am</td>
                                                            <td class="center">400</td>
                                                            <td class="center">3456789012</td>
                                                            <td class="center">Ref 4</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11:00 Am</td>
                                                            <td class="center">500</td>
                                                            <td class="center">4567890123</td>
                                                            <td class="center">Ref 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11:15 Am</td>
                                                            <td class="center">600</td>
                                                            <td class="center">5678901234</td>
                                                            <td class="center">Ref 6</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11:30 Am</td>
                                                            <td class="center">700</td>
                                                            <td class="center">6789012345</td>
                                                            <td class="center">Ref 7</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11.45 Am</td>
                                                            <td class="center">800</td>
                                                            <td class="center">7890123456</td>
                                                            <td class="center">Ref 8</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 12:00 Pm</td>
                                                            <td class="center">900</td>
                                                            <td class="center">8901234567</td>
                                                            <td class="center">Ref 9</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 12:15 Pm</td>
                                                            <td class="center">1000</td>
                                                            <td class="center">9012345678</td>
                                                            <td class="center">Ref 10</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            Total Amount: 3500
                                        </div>
                                    </div>
                                    <div class="col-md-12 center-block">

                                        <div class=" pagination">
                                            <ul class="pagination">
                                                <li class="prev disabled">
                                                    <a href="#"> Previous</a>
                                                </li>
                                                <li class="active">
                                                    <a href="#">1</a>
                                                </li>
                                                <li>
                                                    <a href="#">2</a>
                                                </li>
                                                <li>
                                                    <a href="#">3</a>
                                                </li>
                                                <li>
                                                    <a href="#">4</a>
                                                </li>
                                                <li class="next">
                                                    <a href="#">Next  </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!--Balance History-->
                <div id="balance_history" class="row display_hidden">
                    <div class="box box_height col-md-12">
                        <div class="box-inner">
                            <div class="box-header well">
                                <h2><i class="glyphicon glyphicon-star"></i> Balance History</h2>
                            </div>
                            <div class="content">
                                <div class="demo">
                                    <div class="scrollbar-macosx">
                                        <div class="box-content">
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-2">
                                                    <div class="start_datepicker">
                                                        <p> <input type="text" id="balance_history_start_datepicker" placeholder="Start Date"></p>
                                                    </div>
                                                </div> 
                                                <div class="col-md-2">
                                                    <div class="end_datepicker">
                                                        <p> <input type="text" id="balance_history_end_datepicker" placeholder="End Date"></p>
                                                    </div>
                                                </div> 
                                                <div class="col-md-2">
                                                    <input type="text" placeholder="Start Time">
                                                </div> 
                                                <div class="col-md-2">
                                                    <input type="text" placeholder="End Time">
                                                </div> 
                                                <div class="col-md-2 pull-right">
                                                    <a class="ajax-link">
                                                        <input class="btn btn-sm btn-default" type="button" value="Search">
                                                    </a>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-3">
                                                    <input type="checkbox"> 
                                                    <span style="vertical-align: top;">Show All</span>
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Sakib Al Hasan</label>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>28.10.15 <br> 10:00 Am</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 10:15 Am</td>
                                                        <td>200</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 10:30 Am</td>
                                                        <td>300</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 10:45 Am</td>
                                                        <td>400</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 11:00 Am</td>
                                                        <td>500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 11:15 Am</td>
                                                        <td>600</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 11:30 Am</td>
                                                        <td>700</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 11.45 Am</td>
                                                        <td>800</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 12:00 Pm</td>
                                                        <td>900</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.10.15 <br> 12:15 Pm</td>
                                                        <td>1000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10">
                                        Total Amount: 5500
                                    </div>
                                </div>
                                <div class="col-md-12 center-block">
                                    <div class=" pagination">
                                        <ul class="pagination">
                                            <li class="prev disabled">
                                                <a href="#"> Previous</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">1</a>
                                            </li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">4</a>
                                            </li>
                                            <li class="next">
                                                <a href="#">Next  </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    

                    <!-- Profit Summary--> 
                    <div id="profit_summary" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-briefcase"></i> Profit Summary </h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="box-content">
                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-2">
                                                        <div class="start_datepicker">
                                                            <p> <input type="text" id="profit_summary_stat_datepicker" placeholder="Start Date"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-2">
                                                        <div class="end_datepicker">
                                                            <p> <input type="text" id="profit_summary_end_datepicker" placeholder="End Date"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-2">
                                                        <input type="text" placeholder="Start Time">
                                                    </div> 
                                                    <div class="col-md-2">
                                                        <input type="text" placeholder="End Time">
                                                    </div> 
                                                    <div class="col-md-2 pull-right">
                                                        <a class="ajax-link">
                                                            <input class="btn btn-sm btn-default" type="button" value="Show">
                                                        </a>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-3">
                                                        <input type="checkbox"> 
                                                        <span style="vertical-align: top;">Show All</span>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered responsive">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">Date</th>
                                                            <th class="center">Mobile No</th>
                                                            <th class="center">Amount</th>
                                                            <th class="center">Sub-agent Profit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:00 Am</td>
                                                            <td class="center">0123456789</td>
                                                            <td class="center">1020</td>
                                                            <td class="center">3.80</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:15 Am</td>
                                                            <td class="center">1234567890</td>
                                                            <td class="center">2040</td>
                                                            <td class="center">7.60</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:30 Am</td>
                                                            <td class="center">2345678901</td>
                                                            <td class="center">3060</td>
                                                            <td class="center">11.40</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 10:45 Am</td>
                                                            <td class="center">4080</td>
                                                            <td class="center">3456789012</td>
                                                            <td class="center">15.20</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11:00 Am</td>
                                                            <td class="center">4567890123</td>
                                                            <td class="center">50100</td>
                                                            <td class="center">19.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11:15 Am</td>
                                                            <td class="center">5678901234</td>
                                                            <td class="center">60120</td>
                                                            <td class="center">22.80</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11:30 Am</td>
                                                            <td class="center">6789012345</td>
                                                            <td class="center">70140</td>
                                                            <td class="center">26.60</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 11.45 Am</td>
                                                            <td class="center">7890123456</td>
                                                            <td class="center">80160</td>
                                                            <td class="center">30.40</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 12:00 Pm</td>
                                                            <td class="center">8901234567</td>
                                                            <td class="center">90180</td>
                                                            <td class="center">34.20</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">28.10.15 <br> 12:15 Pm</td>
                                                            <td class="center">9012345678</td>
                                                            <td class="center">101000</td>
                                                            <td class="center">38.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class=" col-md-offset-1 col-md-5">
                                        Total Amount: 55100 
                                    </div>
                                    <div class="col-md-5">
                                        Total Sub-agent Profit: 209
                                    </div>
                                </div>
                                <div class="col-md-12 center-block">
                                    <div class="pagination">
                                        <ul class="pagination">
                                            <li class="prev disabled">
                                                <a href="#"> Previous</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">1</a>
                                            </li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">4</a>
                                            </li>
                                            <li class="next">
                                                <a href="#">Next  </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Fixed bottom 1 box-->
                    <div class="row">
                        
                        <div class="box col-md-12">
                            <div class="box-inner box-inner-custom">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon glyphicon-folder-open"></i> Form</h2>
                                </div>

                                <div  class="form_1 form_pad" >
                                    <h6 class="form_heading center" >Transaction Form</h6>
                                    <div id="box_content_1" class="box-content " >
                                        <div class="row">
                                            <div class="col-lg-offset-2 col-md-8">
                                                <div class="row form-group">
                                            <div class="col-md-4">
                                                Mobile No.
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form_control_custom">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                Amount
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form_control_custom">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                Reference
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form_control_custom">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-offset-6 col-md-6">
                                                <a class="ajax-link">
                                                    <input type="button" class="btn btn-sm btn-default  pull-right" value="Send">
                                                </a>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                            
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="row">
                <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; bKash Copyright 2015 </p>

                <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a href="http://www.bkash.com/" target="_blank">bKash</a></p>
            </footer>

        </div>

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
        <!-- multiple file upload plugin -->
        <script src="js/jquery.uploadify-3.1.min.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="js/charisma.js"></script>

        <!--Scroll Bar-->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.scrollbar-macosx').scrollbar();
            });
        </script>

        <script>
            $(function() {

//                Datepicker
                
                $("#transaction_history_start_datepicker").datepicker();
                $("#transaction_history_end_datepicker").datepicker();
                
                 $("#balance_history_start_datepicker").datepicker();
                $("#balance_history_end_datepicker").datepicker();
            
                $("#profit_summary_stat_datepicker").datepicker();
                $("#profit_summary_end_datepicker").datepicker();

                //                Nav-menu on click dispaly

                $("#nav_subagent_transaction_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#subagent_transaction_history").show();
                });
                
                $("#nav_balance_history").click(function() {
                $('.display_hidden').css("display", "none");
                $("#balance_history").show();
            });

                $("#nav_profit_summary").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#profit_summary").show();
                });


            });
        </script>
    </body>
</html>
