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
                                <li id="nav_balance_history"><a class="ajax-link"><i class="glyphicon glyphicon-star"></i>Credit Transfer History</a>
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
                                Current Balance : <?php echo $current_balance;?>
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
                                <?php $this->load->view('subagent/report/show_transactions'); ?>
                            </div>
                        </div>
                    </div>

                    
                    <!--Balance History-->
                <div id="balance_history" class="row display_hidden">
                    <div class="box box_height col-md-12">
                        <div class="box-inner">
                            <div class="box-header well">
                                <h2><i class="glyphicon glyphicon-star"></i>Credit Transfer History</h2>
                            </div>
                            <?php $this->load->view('subagent/report/show_credit_transfer'); ?>
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
                                <?php $this->load->view('subagent/report/show_profit_summary'); ?>
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
                    get_user_transaction_list('<?php echo $user_info['user_id']?>');
                });
                
                $("#nav_balance_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#balance_history").show();
                    get_credit_transfer_list('<?php echo $user_info['user_id']?>');
                });

                $("#nav_profit_summary").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#profit_summary").show();
                    get_user_profit_list('<?php echo $user_info['user_id']?>');
                });


            });
        </script>
    </body>
</html>
