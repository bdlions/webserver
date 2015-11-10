<script>
    $(function() {
        
    });
    function get_subagent_current_balances()
    {
        var agent_user_id = '<?php echo $user_info['user_id']?>';
        if(agent_user_id > 0)
        {
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>user/get_subagent_current_balances',
                data: {
                    agent_user_id: agent_user_id
                },
                success: function(data) {
                    $('#tbl_subagent_balance_list').html(tmpl('tlmp_subagent_balance_list', data.subagent_list));
                }
            });
        }
        else
        {
            $('#tbl_subagent_balance_list').html("");
        }
        
    }
</script>
<script type="text/x-tmpl" id="tlmp_subagent_balance_list">
    {% var i=0, subagent_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(subagent_info){ %}
        <tr>
            <td>{%= subagent_info.first_name %}</td>
            <td>{%= subagent_info.last_name %}</td>
            <td >{%= subagent_info.current_balance %}</td>
        </tr>
    {% subagent_info = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>
<div class="content">
    <div class="demo">
        <div class="scrollbar-macosx">
            <div class="box-content">
                <table class="table table-striped table-bordered responsive">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Current Balance (Tk.)</th>
<!--                            <th class="center">Transaction History</th>
                            <th class="center">Balance History</th>-->
                        </tr>
                    </thead>
                    <tbody id="tbl_subagent_balance_list">
<!--                        <tr>
                            <td >1</td>
                            <td>Sakib Al Hasan</td>
                            <td >500</td>
                            <td class="center"><a class="transaction_history_preview">View</a></td>
                            <td class="center"><a class="balance_history_preview">View</a></td>
                        </tr>-->                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--<div class="col-md-12 center-block pagination_pad">
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
</div>-->