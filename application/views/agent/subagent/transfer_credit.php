<script>
    $(function() {
        $("#submit_transfer_subagent_credit").on("click", function() {
            if($("#subagent_credit_amount").val() === '' || $("#subagent_credit_amount").val() <= 0)
            {
               alert("Please assign valid amount.");
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>user/transfer_subagent_credit',
                data: $("#form_transfer_subagent_credit").serializeArray(),
                success: function(data) {
                    //$("#subagent_credit_amount").val(""); 
                    alert(data.message);
                    window.location = '<?php echo base_url(); ?>';
                }
            });
        });    
    });
</script>
<?php echo form_open("user/transfer_subagent_credit", array('id' => 'form_transfer_subagent_credit', 'class' => 'form-horizontal','onsubmit' => 'return false;')); ?>
<div class="row form-group transfer_credit_pad">
    <div class="col-md-5">
        Select Subagent
    </div>
    <div class="col-md-7">
        <?php echo form_dropdown('subagent_list', $subagent_list, '', 'class=form-control id=subagent_list'); ?>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-5">
        Amount
    </div>
    <div class="col-md-7">
        <input id="subagent_credit_amount" name="subagent_credit_amount" type="text" class="form-control form_control_custom">
    </div>
</div>
<div class="row">
    <div class="col-md-offset-7 col-md-5">
        <a class="ajax-link">
            <input id="submit_transfer_subagent_credit" name="submit_transfer_subagent_credit" type="button" class="btn btn-sm btn-default  pull-right" value="Transfer">
        </a>
    </div>
</div>
<?php echo form_close(); ?>