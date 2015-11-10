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
                });

                $("#nav_subagent").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#subagent").show();
                });

                $("#nav_transaction_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#transaction_history").show();
                });

                $("#nav_balance_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#balance_history").show();
                });
                $("#nav_sim_recharge_history").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#sim_recharge_history").show();
                });
                $("#nav_profit_summary").click(function() {
                    $('.display_hidden').css("display", "none");
                    $("#admin_profit_summary").show();
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
                                <li id="nav_subagent"><a class="ajax-link"><i class="glyphicon glyphicon-user"></i><span> Sub-agents</span></a>
                                </li>
                                <li id="nav_transaction_history"><a class="ajax-link"><i class="glyphicon glyphicon-minus-sign"></i><span> Transaction History</span></a>
                                </li>
                                <li id="nav_balance_history"><a class="ajax-link"><i class="glyphicon glyphicon-star"></i> Balance History</a>
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
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="4 New Agents Added Today" class="well top-block" href="#">
                                <i class="glyphicon glyphicon-user green"></i>

                                <div>Total Agents</div>
                                <div>228</div>
                                <span class="notification">4</span>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="6 New Sub-agents Added Today" class="well top-block" href="#">
                                <i class="glyphicon glyphicon-user yellow"></i>

                                <div>Total Sub-agents</div>
                                <div>507</div>
                                <span class="notification yellow">6</span>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="Today Agent's Transaction Tk. 5750" class="well top-block" href="#">
                                <i class="glyphicon glyphicon-shopping-cart green"></i>

                                <div>Agent's Total Transaction</div>
                                <div>Tk. 195320</div>
                                <span class="notification green">Tk. 5750</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="Today Sub-agent's Transaction Tk. 4930" class="well top-block" href="#">
                                <i class="glyphicon glyphicon-shopping-cart yellow"></i>

                                <div>Sub-agent's Total Transaction</div>
                                <div>Tk. 133320</div>
                                <span class="notification yellow">Tk. 4930</span>
                            </a>
                        </div>
                    </div>

                    <!--Show Agents-->
                    <div id="agent" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-user green"></i> Show Agents</h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="box-content">
                                                <table class="table table-striped table-bordered responsive">
                                                    <thead>
                                                        <tr>
                                                            <th >Login ID</th>
                                                            <th >Username</th>
                                                            <th >Current Balance (Tk.)</th>
                                                            <th class="center">Transaction History</th>
                                                            <th class="center">Balance History</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Nazmul Hasan</td>
                                                            <td >1000</td>
                                                           <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Alamgir Kabir</td>
                                                            <td>1500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Mohammad Ali</td>
                                                            <td>2000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Abdul Wadud</td>
                                                            <td>2500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Omar Sany</td>
                                                            <td>3000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Mohammad Ashraful</td>
                                                            <td>3500</td>
                                                           <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Aftab Ahmed</td>
                                                            <td>4000</td>
                                                           <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Mir Nasir Ali</td>
                                                            <td>4500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Saddma Hossain</td>
                                                            <td>5000</td>
                                                           <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Abdur Rahim</td>
                                                            <td>5500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 center-block pagination_pad">

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


                    <!--Show Sub-agents-->
                    <div id="subagent" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-user yellow"></i> Show Sub-agent</h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="box-content">
                                                <div class="row">
                                                <div class="col-md-12">
                                                        <label>
                                                            <select class="form-control form_control_custom">
                                                                <option selected="selected">Select an Agent</option>
                                                                <option value="0">Nazmul Hasan</option>
                                                                <option value="1">Alamgir Kabir</option>
                                                                <option value="2">Mohammad Ali</option>
                                                                <option value="3">Abdul Wadud</option>
                                                                <option value="4">Omar Sany</option>
                                                                <option value="5">Mohammad Ashraful</option>
                                                                <option value="6">Aftab Ahmed</option>
                                                                <option value="7">Mir Nasir Ali</option>
                                                                <option value="8">Saddma Hossain</option>
                                                                <option value="9">Abdur Rahim</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    </div>
                                                
                                                <table class="table table-striped table-bordered responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Login ID</th>
                                                            <th>Username</th>
                                                            <th>Current Balance (Tk.)</th>
                                                            <th class="center">Transaction History</th>
                                                            <th class="center">Balance History</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td >1</td>
                                                            <td>Sakib Al Hasan</td>
                                                            <td >500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >2</td>
                                                            <td>Tamim Iqbal</td>
                                                            <td >1000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >3</td>
                                                            <td>Sabbir Rahman</td>
                                                            <td >1500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >4</td>
                                                            <td>Mominul Haque</td>
                                                            <td >2000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >5</td>
                                                            <td>Souma Sarkar</td>
                                                            <td >2500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >6</td>
                                                            <td>Taskin Ahmed</td>
                                                            <td >3000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >7</td>
                                                            <td>Mostafizur Rahman</td>
                                                            <td >3500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >8</td>
                                                            <td>Rubel Hossain</td>
                                                            <td >4000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >9</td>
                                                            <td>Liton Kumar Das</td>
                                                            <td >4500</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td >10</td>
                                                            <td>Mushfiqur Rahim</td>
                                                            <td >5000</td>
                                                            <td class="center"><a class="transaction_history_preview">View</a></td>
                                                            <td class="center"><a class="balance_history_preview">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 center-block pagination_pad">
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

                    <!--Transaction History-->
                    <div id="transaction_history" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-minus-sign"></i> Transaction History</h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="scroll_top">
                                            <div class="box-content">
                                                <div class="row form-group">
                                                    <div class="col-md-offset-1 col-md-3 pull-left">
                                                        <label>
                                                            <select class="form-control form_control_custom">
                                                                <option selected="selected">Select an Agent</option>
                                                                <option value="0">Nazmul Hasan</option>
                                                                <option value="1">Alamgir Kabir</option>
                                                                <option value="2">Mohammad Ali</option>
                                                                <option value="3">Abdul Wadud</option>
                                                                <option value="4">Omar Sany</option>
                                                                <option value="5">Mohammad Ashraful</option>
                                                                <option value="6">Aftab Ahmed</option>
                                                                <option value="7">Mir Nasir Ali</option>
                                                                <option value="8">Saddma Hossain</option>
                                                                <option value="9">Abdur Rahim</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                            <select class="form-control form_control_custom">
                                                                <option selected="selected">Select a Sub-agents</option>
                                                                <option value="0">Sakib Al Hasan</option>
                                                                <option value="1">Tamim Iqbal</option>
                                                                <option value="2">Sabbir Rahman</option>
                                                                <option value="3">Mominul Haque</option>
                                                                <option value="4">Souma Sarkar</option>
                                                                <option value="5">Taskin Ahmed</option>
                                                                <option value="6">Mostafizur Rahman</option>
                                                                <option value="7">Rubel Hossain</option>
                                                                <option value="8">Liton Kumar Das</option>
                                                                <option value="9">Mushfiqur Rahim</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                   <div class="col-md-3">
                                                        <label>
                                                                <select class="form-control form_control_custom">
                                                                    <option selected="selected">Select You</option>
                                                                    <option value="0">Mashrafe Mortaza</option>
                                                                    
                                                                </select>
                                                            </label>
                                                    </div>
                                                </div>
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
                                                        <label>Nazmul Hasan</label>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Mobile No</th>
                                                            <th>Reference</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:00 Am</td>
                                                            <td>100</td>
                                                            <td>0123456789</td>
                                                            <td>Ref 1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:15 Am</td>
                                                            <td>200</td>
                                                            <td>1234567890</td>
                                                            <td>Ref 2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:30 Am</td>
                                                            <td>300</td>
                                                            <td>2345678901</td>
                                                            <td>Ref 3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:45 Am</td>
                                                            <td>400</td>
                                                            <td>3456789012</td>
                                                            <td>Ref 4</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11:00 Am</td>
                                                            <td>500</td>
                                                            <td>4567890123</td>
                                                            <td>Ref 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11:15 Am</td>
                                                            <td>600</td>
                                                            <td>5678901234</td>
                                                            <td>Ref 6</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11:30 Am</td>
                                                            <td>700</td>
                                                            <td>6789012345</td>
                                                            <td>Ref 7</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11.45 Am</td>
                                                            <td>800</td>
                                                            <td>7890123456</td>
                                                            <td>Ref 8</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 12:00 Pm</td>
                                                            <td>900</td>
                                                            <td>8901234567</td>
                                                            <td>Ref 9</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 12:15 Pm</td>
                                                            <td>1000</td>
                                                            <td>9012345678</td>
                                                            <td>Ref 10</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            Total Amount: 12500
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
                                                <div class="row form-group">
                                                    <div class="col-md-offset-1 col-md-5 pull-left">
                                                        <label>
                                                            <select class="form-control form_control_custom">
                                                                <option selected="selected">Select an Agent</option>
                                                                <option value="0">Nazmul Hasan</option>
                                                                <option value="1">Alamgir Kabir</option>
                                                                <option value="2">Mohammad Ali</option>
                                                                <option value="3">Abdul Wadud</option>
                                                                <option value="4">Omar Sany</option>
                                                                <option value="5">Mohammad Ashraful</option>
                                                                <option value="6">Aftab Ahmed</option>
                                                                <option value="7">Mir Nasir Ali</option>
                                                                <option value="8">Saddma Hossain</option>
                                                                <option value="9">Abdur Rahim</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>
                                                            <select class="form-control form_control_custom">
                                                                <option selected="selected">Select a Sub-agents</option>
                                                                <option value="0">Sakib Al Hasan</option>
                                                                <option value="1">Tamim Iqbal</option>
                                                                <option value="2">Sabbir Rahman</option>
                                                                <option value="3">Mominul Haque</option>
                                                                <option value="4">Souma Sarkar</option>
                                                                <option value="5">Taskin Ahmed</option>
                                                                <option value="6">Mostafizur Rahman</option>
                                                                <option value="7">Rubel Hossain</option>
                                                                <option value="8">Liton Kumar Das</option>
                                                                <option value="9">Mushfiqur Rahim</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
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
                                                        <label>Alamgir Kabir</label>
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


                    <!--Sim Recharge History-->
                    <div id="sim_recharge_history" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-plus-sign"></i> Sim Recharge History</h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="box-content">

                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-3">
                                                        <div class="start_datepicker">
                                                            <p> <input type="text" id="sim_recharge_history_start_datepicker" placeholder="Start Date"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">
                                                        <div class="end_datepicker">
                                                            <p> <input type="text" id="sim_recharge_history_end_datepicker" placeholder="End Date"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">
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
                                                            <td>28.10.15 </td>
                                                            <td>10000</td>
                                                        </tr>
                                                        <tr>
                                                           <td>27.10.15</td>
                                                            <td>9000</td>
                                                        </tr>
                                                        <tr>
                                                           <td>26.10.15 </td>
                                                            <td>8000</td> 
                                                        </tr>
                                                         <tr>
                                                            <td>25.10.15 </td>
                                                            <td>7000</td>
                                                        </tr>
                                                         <tr>
                                                            <td>24.10.15 </td>
                                                            <td>6000</td>
                                                        </tr>
                                                        <tr>
                                                             <td>23.10.15 </td>
                                                            <td>5000</td>
                                                        </tr>
                                                        <tr>
                                                           
                                                            <td>22.10.15 </td>
                                                            <td>4000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>21.10.15 </td>
                                                            <td>3000</td>
                                                        </tr>
                                                        <tr>
                                                             <td>20.10.15 </td>
                                                            <td>2000</td>
                                                        </tr>
                                                        <tr>
                                                           <td>19.10.15 </td>
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
                                            Total Amount: 55000
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
                    <div id="admin_profit_summary" class="row display_hidden">
                        <div class="box box_height col-md-12">
                            <div class="box-inner">
                                <div class="box-header well">
                                    <h2><i class="glyphicon glyphicon-briefcase"></i> Profit Summary</h2>
                                </div>
                                <div class="content">
                                    <div class="demo">
                                        <div class="scrollbar-macosx">
                                            <div class="box-content">
                                                <div class="row form-group">
                                                    <div class="col-md-offset-1 col-md-3 pull-left">
                                                          <label>
                                                         <select class="form-control form_control_custom">
                                                                <option selected="selected">Select an Agent</option>
                                                                <option value="0">Nazmul Hasan</option>
                                                                <option value="1">Alamgir Kabir</option>
                                                                <option value="2">Mohammad Ali</option>
                                                                <option value="3">Abdul Wadud</option>
                                                                <option value="4">Omar Sany</option>
                                                                <option value="5">Mohammad Ashraful</option>
                                                                <option value="6">Aftab Ahmed</option>
                                                                <option value="7">Mir Nasir Ali</option>
                                                                <option value="8">Saddma Hossain</option>
                                                                <option value="9">Abdur Rahim</option>
                                                            </select>
                                                          </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                                <select class="form-control form_control_custom">
                                                                    <option selected="selected">Select a Sub-agents</option>
                                                                    <option value="0">Sakib Al Hasan</option>
                                                                    <option value="1">Tamim Iqbal</option>
                                                                    <option value="2">Sabbir Rahman</option>
                                                                    <option value="3">Mominul Haque</option>
                                                                    <option value="4">Souma Sarkar</option>
                                                                    <option value="5">Taskin Ahmed</option>
                                                                    <option value="6">Mostafizur Rahman</option>
                                                                    <option value="7">Rubel Hossain</option>
                                                                    <option value="8">Liton Kumar Das</option>
                                                                    <option value="9">Mushfiqur Rahim</option>
                                                                </select>
                                                            </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                                <select class="form-control form_control_custom">
                                                                    <option selected="selected">Select You</option>
                                                                    <option value="0">Mashrafe Mortaza</option>
                                                                    
                                                                </select>
                                                            </label>
                                                    </div>
                                                </div>
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
                                                            <th>Date</th>
                                                            <th>Mobile No</th>
                                                            <th>Amount</th>
                                                            <th>Admin Profit</th>
                                                            <th>Agent Profit</th>
                                                            <th>Sub-agent Profit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:00 Am</td>
                                                            <td>0123456789</td>
                                                            <td>1020</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>3.80</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:15 Am</td>
                                                            <td>1234567890</td>
                                                            <td>2040</td>
                                                            <td>2</td>
                                                            <td>2</td>
                                                            <td>7.60</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:30 Am</td>
                                                            <td>2345678901</td>
                                                            <td>3060</td>
                                                            <td>3</td>
                                                            <td>3</td>
                                                            <td>11.40</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 10:45 Am</td>
                                                            <td>4080</td>
                                                            <td>3456789012</td>
                                                            <td>4</td>
                                                            <td>4</td>
                                                            <td>15.20</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11:00 Am</td>
                                                            <td>4567890123</td>
                                                            <td>50100</td>
                                                            <td>5</td>
                                                            <td>5</td>
                                                            <td>19.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11:15 Am</td>
                                                            <td>5678901234</td>
                                                            <td>60120</td>
                                                            <td>6</td>
                                                            <td>6</td>
                                                            <td>22.80</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11:30 Am</td>
                                                            <td>6789012345</td>
                                                            <td>70140</td>
                                                            <td>7</td>
                                                            <td>7</td>
                                                            <td>26.60</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 11.45 Am</td>
                                                            <td>7890123456</td>
                                                            <td>80160</td>
                                                            <td>8</td>
                                                            <td>8</td>
                                                            <td>30.40</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 12:00 Pm</td>
                                                            <td>8901234567</td>
                                                            <td>90180</td>
                                                            <td>9</td>
                                                            <td>9</td>
                                                            <td>34.20</td>
                                                        </tr>
                                                        <tr>
                                                            <td>28.10.15 <br> 12:15 Pm</td>
                                                            <td>9012345678</td>
                                                            <td>101000</td>
                                                            <td>10</td>
                                                            <td>10</td>
                                                            <td>38.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class=" col-md-offset-1 col-md-3">
                                        Total Amount: 55100 
                                    </div>
                                    <div class="col-md-2">
                                        Total Admin Profit: 55 
                                    </div>
                                    <div class="col-md-2">
                                        Total Agent Profit: 55 
                                    </div>
                                    <div class="col-md-3">
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

        