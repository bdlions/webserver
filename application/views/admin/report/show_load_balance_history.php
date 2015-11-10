<script>
    $(function() {
        
    });
    function get_load_balance_list()
    {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>admin/get_load_balance_list',
            success: function(data) {
                $('#load_balance_total_amount').html("Total amount : "+data.total_amount);
                $('#tbl_balance_list').html(tmpl('tlmp_balance_list', data.transaction_list));
            }
        });
    }
</script>
<script type="text/x-tmpl" id="tlmp_balance_list">
    {% var i=0, balance_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(balance_info){ %}
        <tr>
            <td>{%= balance_info.created_on %}</td>
            <td>{%= balance_info.balance_in %}</td>
        </tr>
    {% balance_info = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>
<div class="content">
    <div class="demo">
        <div class="scrollbar-macosx">
            <div class="box-content">

<!--                <div class="row">
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
                </div>-->
                <table class="table table-striped table-bordered responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_balance_list">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="row">
        <div id="load_balance_total_amount" name="load_balance_total_amount" class="col-md-offset-1 col-md-10">
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