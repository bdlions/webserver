<script>
    $(function() {
        $("#admin_list_credit_transfer").change(function() {
            var user_id = $('#admin_list_credit_transfer').val();
            if(user_id > 0)
            {
                $('#agent_list_credit_transfer').val('');
                $('#subagent_list_credit_transfer').val('');
                get_credit_transfer_list(user_id);
            }
        });
        $("#agent_list_credit_transfer").change(function() {
            var agent_user_id = $('#agent_list_credit_transfer').val();
            if(agent_user_id > 0)
            {
                $('#admin_list_credit_transfer').val('');    
                get_credit_transfer_list(agent_user_id);
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '<?php echo base_url(); ?>user/get_subagent_list',
                    data: {
                        agent_user_id: agent_user_id
                    },
                    success: function(data) {
                        $('#subagent_list_credit_transfer').html(tmpl('tlmp_subagent_list_credit_transfer', data.subagent_list));
                    }
                });
            }
        });
        $("#subagent_list_credit_transfer").change(function() {
            var subagent_user_id = $('#subagent_list_credit_transfer').val();
            if(subagent_user_id > 0)
            {
                $('#admin_list_credit_transfer').val('');    
                get_credit_transfer_list(subagent_user_id);                
            }
        });
    });
    function get_credit_transfer_list(user_id)
    {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/get_credit_transfer_list',
            data: {
                user_id: user_id
            },
            success: function(data) {
                $('#tbl_credit_transfer_list').html(tmpl('tlmp_credit_transfer_list', data.transaction_list));
            }
        });
    }
</script>
<script type="text/x-tmpl" id="tlmp_credit_transfer_list">
    {% var i=0, transaction_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(transaction_info){ %}
        <tr>
            <td>{%= transaction_info.transaction_id %}</td>
            <td>{%= transaction_info.created_on %}</td>
            <td>{%= transaction_info.balance_in %}</td>
            <td >{%= transaction_info.balance_out %}</td>
        </tr>
    {% transaction_info = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>
<script type="text/x-tmpl" id="tlmp_subagent_list_credit_transfer">
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
            <div class="box-content">
                <div class="row form-group">
                    <div class="col-md-offset-1 col-md-3 pull-left">
                        <label>
                            <?php echo form_dropdown('agent_list_credit_transfer', array('' => 'Select agent')+$agent_list, '', 'class=form-control id=agent_list_credit_transfer'); ?>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            <select id="subagent_list_credit_transfer" name="subagent_list_credit_transfer" class="form-control form_control_custom">
                                <option value="" selected="selected">Select a Subagents</option>                                
                            </select>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                                <select id="admin_list_credit_transfer" name="admin_list_credit_transfer" class="form-control form_control_custom">
                                    <option value="" selected="selected">Select</option>
                                    <option value="<?php echo $user_info['user_id']?>"><?php echo $user_info['first_name'].' '.$user_info['last_name']?></option>
                                </select>
                            </label>
                    </div>
                </div>
<!--                <div class="row">
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
                </div>-->
                <table class="table table-striped table-bordered responsive">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Date</th>
                            <th>Receive</th>
                            <th>Send</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_credit_transfer_list">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--<div>
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
</div>-->