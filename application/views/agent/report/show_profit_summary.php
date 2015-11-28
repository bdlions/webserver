<script>
    $(function() {
        $("#agent_list_profits").change(function() {
            var user_id = $('#agent_list_profits').val();
            if(user_id > 0)
            {
                $('#subagent_list_profits').val('');
                get_user_profit_list(user_id);
            }
        });
        $("#subagent_list_profits").change(function() {
            var subagent_user_id = $('#subagent_list_profits').val();
            if(subagent_user_id > 0)
            {
                $('#agent_list_profits').val('');    
                get_user_profit_list(subagent_user_id);                
            }
        });
    });
    function get_user_profit_list(user_id)
    {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/get_user_profit_list',
            data: {
                user_id: user_id
            },
            success: function(data) {
                $('#profit_total_amount').html("Total amount : "+data.total_amount);
                $('#tlbl_profit_list').html(tmpl('tlmp_profit_list', data.profit_list));
            }
        });
    }
</script>
<script type="text/x-tmpl" id="tlmp_profit_list">
    {% var i=0, profit_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(profit_info){ %}
        <tr>
            <td>{%= profit_info.created_on %}</td>
            <td>{%= profit_info.amount %}</td>
            <td>{%= profit_info.agent_profit %}</td>
            <td>{%= profit_info.subagent_profit %}</td>
        </tr>
    {% profit_info = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>
<div class="content">
    <div class="demo">
        <div class="scrollbar-macosx">
            <div class="scroll_top">
            <div class="box-content">
                <div class="row form-group">
                    <div class="col-md-offset-1 col-md-3 pull-left">
                        <label>
                            <?php echo form_dropdown('subagent_list_profits', array('' => 'Select subagent')+$subagent_list, '', 'class=form-control id=subagent_list_profits'); ?>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                                <select id="agent_list_profits" name="agent_list_profits" class="form-control form_control_custom">
                                    <option value="" selected="selected">Select</option>
                                    <option value="<?php echo $user_info['user_id']?>"><?php echo $user_info['first_name'].' '.$user_info['last_name']?></option>
                                </select>
                            </label>
                    </div>
                </div>
<!--                <div class="row">
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
                </div>-->
                <table class="table table-striped table-bordered responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Agent Profit</th>
                            <th>Subagent Profit</th>
                        </tr>
                    </thead>
                    <tbody id="tlbl_profit_list">                        
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div id="profit_total_amount" name="profit_total_amount" class="col-md-offset-1 col-md-10">
            Total Amount: 0
        </div>
    </div>
<!--    <div class="col-md-12 center-block">

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
    </div>-->
</div>