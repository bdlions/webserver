<script>
    $(function() {
        $("#admin_list_transactions").change(function() {
            var user_id = $('#admin_list_transactions').val();
            if(user_id > 0)
            {
                $('#agent_list_transactions').val('');
                $('#subagent_list_transactions').val('');
                get_user_transaction_list(user_id);
            }
        });
        $("#agent_list_transactions").change(function() {
            var agent_user_id = $('#agent_list_transactions').val();
            if(agent_user_id > 0)
            {
                $('#admin_list_transactions').val('');    
                get_user_transaction_list(agent_user_id);
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '<?php echo base_url(); ?>user/get_subagent_list',
                    data: {
                        agent_user_id: agent_user_id
                    },
                    success: function(data) {
                        $('#subagent_list_transactions').html(tmpl('tlmp_subagent_list_transaction', data.subagent_list));
                    }
                });
            }
        });
        $("#subagent_list_transactions").change(function() {
            var subagent_user_id = $('#subagent_list_transactions').val();
            if(subagent_user_id > 0)
            {
                $('#admin_list_transactions').val('');    
                get_user_transaction_list(subagent_user_id);                
            }
        });
    });
    function get_user_transaction_list(user_id)
    {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/get_user_transaction_list',
            data: {
                user_id: user_id
            },
            success: function(data) {
                $('#transaction_total_amount').html("Total amount : "+data.total_amount);
                $('#tlbl_transaction_list').html(tmpl('tlmp_transaction_list', data.transaction_list));
            }
        });
    }
</script>
<script type="text/x-tmpl" id="tlmp_transaction_list">
    {% var i=0, transaction_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(transaction_info){ %}
        <tr>
            <td>{%= transaction_info.created_on %}</td>
            <td>{%= transaction_info.balance_out %}</td>
            <td>{%= transaction_info.cell_no %}</td>
            <td>{%= transaction_info.description %}</td>
        </tr>
    {% transaction_info = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>
<script type="text/x-tmpl" id="tlmp_subagent_list_transaction">
    {% var i=0, subagent_info = ((o instanceof Array) ? o[i++] : o); %}
    <option value="" selected="selected">Select a Subagents</option>
    {% while(subagent_info){ %}
        <option value="{%= subagent_info.user_id %}">{%= subagent_info.first_name %} {%= subagent_info.last_name %}</option>
    {% subagent_info = ((o instanceof Array) ? o[i++] : null); %}
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
                            <?php echo form_dropdown('agent_list_transactions', array('' => 'Select agent')+$agent_list, '', 'class=form-control id=agent_list_transactions'); ?>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            <select id="subagent_list_transactions" name="subagent_list_transactions" class="form-control form_control_custom">
                                <option value="" selected="selected">Select a Subagents</option>                                
                            </select>
                        </label>
                    </div>
                   <div class="col-md-3">
                        <label>
                                <select id="admin_list_transactions" name="admin_list_transactions" class="form-control form_control_custom">
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
                            <th>Mobile No</th>
                            <th>Reference</th>
                        </tr>
                    </thead>
                    <tbody id="tlbl_transaction_list">                        
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div id="transaction_total_amount" name="transaction_total_amount" class="col-md-offset-1 col-md-10">
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