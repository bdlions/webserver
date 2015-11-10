<script>
    $(function() {
        $("#submit_load_balance").on("click", function() {
            if($("#load_balance_amount").val() === '' || $("#load_balance_amount").val() <= 0)
            {
               alert("Please assign valid amount");
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>admin/load_balance',
                data: $("#form_load_balance").serializeArray(),
                success: function(data) {
                    //$("#load_balance_amount").val(""); 
                    alert(data.message);
                    window.location = '<?php echo base_url(); ?>';
                }
            });
        });    
    });
</script>
<?php echo form_open("admin/load_balance", array('id' => 'form_load_balance', 'class' => 'form-horizontal','onsubmit' => 'return false;')); ?>
<div id="box_content_2" class="box-content" style="display: none; padding-top: 10px;">
    <div class="row form-group">
        <div class="col-md-4">
            Amount
        </div>
        <div class="col-md-8">
            <input id="load_balance_amount" name="load_balance_amount" type="text" class="form-control form_control_custom">
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-6 col-md-6">
            <a class="ajax-link">
                <input type="submit" id="submit_load_balance" name="submit_load_balance" class="btn btn-sm btn-default  pull-right" value="Load">
            </a>
        </div>
    </div>
</div>
<?php echo form_close(); ?>