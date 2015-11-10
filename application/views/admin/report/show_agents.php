<script>
    $(function() {
        
    });
    function get_agent_current_balances()
    {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>user/get_agent_current_balances',
            success: function(data) {
                //$('#load_balance_total_amount').html("Total amount : "+data.total_amount);
                $('#tbl_agent_balance_list').html(tmpl('tlmp_agent_balance_list', data.agent_list));
            }
        });
    }
</script>
<script type="text/x-tmpl" id="tlmp_agent_balance_list">
    {% var i=0, agent_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(agent_info){ %}
        <tr>
            <td>{%= agent_info.first_name %}</td>
            <td>{%= agent_info.last_name %}</td>
            <td >{%= agent_info.current_balance %}</td>
        </tr>
    {% agent_info = ((o instanceof Array) ? o[i++] : null); %}
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
                    <tbody id="tbl_agent_balance_list">                        
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