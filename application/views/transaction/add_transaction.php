<script>
    $(function() {
        $("#submit_add_transaction").on("click", function() {
            if($("#add_transaction_cell_no").val() === '')
            {
               alert("Please assign mobile number.");
            }
            if($("#add_transaction_amount").val() === '' || $("#add_transaction_amount").val() <= 0)
            {
               alert("Please assign valid amount.");
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>transaction/add_transaction',
                data: $("#form_add_transaction").serializeArray(),
                success: function(data) {
                    $("#add_transaction_cell_no").val(""); 
                    $("#add_transaction_amount").val(""); 
                    alert(data.message);
                }
            });
        });    
    });
</script>
<?php echo form_open("transaction/add_transaction", array('id' => 'form_add_transaction', 'class' => 'form-horizontal','onsubmit' => 'return false;')); ?>

    <div class="row form-group">
        <div class="col-md-4">
            Mobile No.
        </div>
        <div class="col-md-8">
            <input id="add_transaction_cell_no" name="add_transaction_cell_no" type="text" class="form-control form_control_custom">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            Amount
        </div>
        <div class="col-md-8">
            <input id="add_transaction_amount" name="add_transaction_amount" type="text" class="form-control form_control_custom">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            Reference
        </div>
        <div class="col-md-8">
            <input id="add_transaction_description" name="add_transaction_description" type="text" class="form-control form_control_custom">
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-6 col-md-6">
            <a class="ajax-link">
                <input type="submit" id="submit_add_transaction" name="submit_add_transaction" class="btn btn-sm btn-default  pull-right" value="Send">
            </a>
        </div>
    </div>

<?php echo form_close(); ?>