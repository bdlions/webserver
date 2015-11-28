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
                
                
                $("#sim_recharge_history_start_datepicker").datepicker();
                $("#sim_recharge_history_end_datepicker").datepicker();
                
                $("#profit_summary_stat_datepicker").datepicker();
                $("#profit_summary_end_datepicker").datepicker();
                

                //                Nav-menu on click dispaly
                $("#nav_agent").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#agent").show();
                    get_agent_current_balances();
                });

                $("#nav_subagent").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#subagent").show();
                    get_subagent_current_balances();
                });

                $("#nav_transaction_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#transaction_history").show();
                    $('#agent_list_transactions').val('');
                    $('#subagent_list_transactions').val('');
                    $('#admin_list_transactions').val('<?php echo $user_info['user_id']?>');
                    get_user_transaction_list('<?php echo $user_info['user_id']?>');
                });

                $("#nav_balance_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#balance_history").show();
                    $('#agent_list_credit_transfer').val('');
                    $('#subagent_list_credit_transfer').val('');
                    $('#admin_list_credit_transfer').val('<?php echo $user_info['user_id']?>');
                    get_credit_transfer_list('<?php echo $user_info['user_id']?>');
                });
                $("#nav_sim_recharge_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#sim_recharge_history").show();
                    get_load_balance_list();
                });
                $("#nav_profit_summary").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#admin_profit_summary").show();
                    $('#agent_list_profits').val('');
                    $('#subagent_list_profits').val('');
                    $('#admin_list_profits').val('<?php echo $user_info['user_id']?>');
                    get_user_profit_list('<?php echo $user_info['user_id']?>');
                });
                $('.transaction_history_preview').click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#transaction_history").show();
                });
                $('.balance_history_preview').click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#balance_history").show();
                });

                /*Transaction form 1 */
                $("#form_1_up").click(function() {
                    $("#form_1_up").hide();
                    $(".form_2").hide();
                    $("#form_1_down").show();
                    $("#box_content_1").slideDown();
                });
                $("#form_1_down").click(function() {
                    $("#form_1_down").hide();
                    $("#box_content_1").slideUp();
                    $(".form_2").show();
                    $("#form_1_up").show();
                });

                /*Transaction form 2 */
                $("#form_2_up").click(function() {
                    $(".form_2").css("padding-top", "10px");
                    $("#form_2_up").hide();
                    $(".form_1").hide();
                    $("#form_2_down").show();
                    $("#box_content_2").slideDown();
                });
                $("#form_2_down").click(function() {
                    $(".form_2").css("padding-top", "0px");
                    $("#form_2_down").hide();
                    $("#box_content_2").slideUp();
                    $(".form_1").show();
                    $("#form_2_up").show();
                });
            });
        </script>
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
                                <li id="nav_agent"><a class="ajax-link"><i class="glyphicon glyphicon-user"></i><span> Agents</span></a>
                                </li>
                                <li id="nav_subagent"><a class="ajax-link"><i class="glyphicon glyphicon-user"></i><span> Subagents</span></a>
                                </li>
                                <li id="nav_transaction_history"><a class="ajax-link"><i class="glyphicon glyphicon-minus-sign"></i><span> Transaction History</span></a>
                                </li>
                                <li id="nav_balance_history"><a class="ajax-link"><i class="glyphicon glyphicon-star"></i>Credit Transfer History</a>
                                </li>
                                <li id="nav_sim_recharge_history"><a class="ajax-link"><i class="glyphicon glyphicon-plus-sign"></i><span> Sim Recharge History</span></a>
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
                    <?php $this->load->view('admin/report/dashboard_summary')?>

                    <!--Show Agents-->
                    <div id="agent" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-user green"></i> Show Agents</h2>
                                </div>
                                <?php $this->load->view('admin/report/show_agents')?>
                            </div>
                        </div>
                    </div>


                    <!--Show Sub-agents-->
                    <div id="subagent" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-user yellow"></i> Show Subagent</h2>
                                </div>
                                <?php $this->load->view('admin/report/show_subagents')?>
                            </div>
                        </div>
                    </div>

                    <!--Transaction History-->
                    <div id="transaction_history" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-minus-sign"></i> Transaction History</h2>
                                </div>
                                <?php $this->load->view('admin/report/show_transactions');?>
                            </div>
                        </div>
                    </div>




                    <!--Balance History-->
                    <div id="balance_history" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-star"></i> Credit Transfer History</h2>
                                </div>
                                <?php $this->load->view('admin/report/show_credit_transfer'); ?>
                            </div>
                        </div>
                    </div>


                    <!--Sim Recharge History-->
                    <div id="sim_recharge_history" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-plus-sign"></i> Sim Recharge History</h2>
                                </div>
                                <?php $this->load->view('admin/report/show_load_balance_history')?>                                
                            </div>
                        </div>
                    </div>


                    <!-- Profit Summary--> 
                    <div id="admin_profit_summary" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-briefcase"></i> Profit Summary</h2>
                                </div>
                                <?php $this->load->view('admin/report/show_profit_summary')?>
                            </div>
                        </div>
                    </div>

                    
                    <!--Fixed bottom 3 boxes-->
                    <div class="row">
                        <div class="box col-md-4">
                            <div class="box-inner homepage-box">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-th"></i> Create</h2>
                                </div>
                                <div class="box-content">
                                    <ul class="nav nav-tabs" id="myTab">
<!--                                        <li class="active"><a href="#info">Role</a></li>-->
                                        <li><a href="#custom">Agent</a></li>
                                    </ul>

                                    <div id="myTabContent" class="tab-content" >
                                        <div class="tab-pane active tab_pane_info_pad" id="info">
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    Title
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control form_control_custom">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-offset-6 col-md-6">
                                                    <a class="ajax-link">
                                                        <input type="button" class="btn btn-sm btn-default  pull-right" value="Create">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane tab_pane_custom_pad" id="custom">
                                            <?php $this->load->view('admin/agent/create_agent')?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box col-md-4">
                            <div class="box-inner homepage-box">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-transfer"></i> Transfer Credit to Agent</h2>

                                </div>
                                <div class="box-content">
                                    <?php $this->load->view('admin/agent/transfer_credit');?>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="box col-md-4">
                            <div class="box-inner homepage-box">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon glyphicon-folder-open"></i> Form</h2>
                                </div>

                                <div  class="form_1 form_pad">
                                    <h6 class="form_heading" >Transaction Form
                                        <a class="ajax-link">
                                            <i id="form_1_up" class="btn-round glyphicon glyphicon-chevron-up" style="border: 1px solid lightgray; padding: 5px; cursor: pointer;">
                                            </i>
                                            <i id="form_1_down" class="btn-round glyphicon glyphicon-chevron-down" style="border: 1px solid lightgray; padding: 5px; cursor: pointer; display: none">
                                            </i>
                                        </a>
                                    </h6>
                                    <div id="box_content_1" class="box-content" style="display: none">
                                        <?php $this->load->view('transaction/add_transaction');?>
                                    </div>                                    
                                </div>
                                <div  class="form_2">
                                    <h6 class="form_heading">Load Sim
                                        <a class="ajax-link">
                                            <i id="form_2_up" class="btn-round glyphicon glyphicon-chevron-up" style="border: 2px solid lightgray; padding: 5px; cursor: pointer;">
                                            </i>
                                            <i id="form_2_down" class="btn-round glyphicon glyphicon-chevron-down" style="border: 2px solid lightgray; padding: 5px; cursor: pointer; display: none">
                                            </i>
                                        </a>
                                    </h6>
                                    <?php $this->load->view('admin/balance/load_balance');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        