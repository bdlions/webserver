<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Congrats! You are on ...</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
        <meta name="author" content="A.K.M. Nazmul Islam">
    </head>

    <body>
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
                                        <?php $this->load->view('transaction/add_transaction');?>
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
