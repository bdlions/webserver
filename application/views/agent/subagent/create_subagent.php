<script>
    $(function() {
        $("#submit_create_subagent").on("click", function() {
            if($("#first_name_create_subagaent").val() === '')
            {
               alert("Please assign first name.");
            }
            if($("#last_name_create_subagaent").val() === '')
            {
               alert("Please assign last name.");
            }
            if($("#username_create_subagaent").val() === '')
            {
               alert("Please assign username.");
            }
            if($("#password_create_subagaent").val() === '')
            {
               alert("Please assign password.");
            }
            if($("#commission_create_subagent").val() === '')
            {
               alert("Please assign commission.");
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>user/create_subagent',
                data: $("#form_create_subagent").serializeArray(),
                success: function(data) {
                    alert(data.message);
                }
            });
        });    
    });
</script>
<?php echo form_open("user/create_subagent", array('id' => 'form_create_subagent', 'class' => 'form-horizontal','onsubmit' => 'return false;')); ?>
<div class="row form-group">
    <div class="col-md-5">
        First Name
    </div>
    <div class="col-md-7">
        <input id="first_name_create_subagaent" name="first_name_create_subagaent" type="text" class="form-control form_control_custom">
    </div>
</div>
<div class="row form-group">
    <div class="col-md-5">
        Last Name
    </div>
    <div class="col-md-7">
        <input id="last_name_create_subagaent" name="last_name_create_subagaent" type="text" class="form-control form_control_custom">
    </div>
</div>
<div class="row form-group">
    <div class="col-md-5">
        Username
    </div>
    <div class="col-md-7">
        <input id="username_create_subagaent" name="username_create_subagaent" type="text" class="form-control form_control_custom">
    </div>
</div>
<div class="row form-group">
    <div class="col-md-5">
        Password
    </div>
    <div class="col-md-7">
        <input id="password_create_subagaent" name="password_create_subagaent" type="password" class="form-control form_control_custom">
    </div>
</div>
<div class="row form-group">
    <div class="col-md-5">
        Roles
    </div>
    <div class="col-md-7">
        <ul class="role_ul_custom list-unstyled">
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 1</li>
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 2</li>
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 3</li>
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 4</li>
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 5</li>
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 6</li>
            <li><input type="checkbox" name="vehicle" value="Bike"> Roles 7</li>
        </ul>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-5">
        Commission
    </div>
    <div class="col-md-7">
        <input id="commission_create_subagent" name="commission_create_subagent" type="text" class="form-control form_control_custom">
        <label class="commission_label">(Taka Per Thousand)</label>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-6 col-md-6">
        <a class="ajax-link">
            <input type="submit" id="submit_create_subagent" name="submit_create_subagent" class="btn btn-sm btn-default  pull-right" value="Create">
        </a>
    </div>
</div>
<?php echo form_close(); ?>