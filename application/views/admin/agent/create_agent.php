<script>
    $(function() {
        $("#submit_create_agent").on("click", function() {
            if($("#first_name_create_agaent").val() === '')
            {
               alert("Please assign first name.");
            }
            if($("#last_name_create_agaent").val() === '')
            {
               alert("Please assign last name.");
            }
            if($("#username_create_agaent").val() === '')
            {
               alert("Please assign username.");
            }
            if($("#password_create_agaent").val() === '')
            {
               alert("Please assign password.");
            }
            if($("#commission_create_agent").val() === '')
            {
               alert("Please assign commission.");
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>user/create_agent',
                data: $("#form_create_agent").serializeArray(),
                success: function(data) {                    
//                    $("#first_name_create_agaent").val(""); 
//                    $("#last_name_create_agaent").val(""); 
//                    $("#username_create_agaent").val(""); 
//                    $("#password_create_agaent").val(""); 
//                    $("#commission_create_agent").val(""); 
                    alert(data.message);
                    window.location = '<?php echo base_url(); ?>';
                }
            });
        });    
    });
</script>
<?php echo form_open("user/create_agent", array('id' => 'form_create_agent', 'class' => 'form-horizontal','onsubmit' => 'return false;')); ?>
    <div class="row form-group">
        <div class="col-md-4">
            First Name
        </div>
        <div class="col-md-8">
            <input id="first_name_create_agaent" name="first_name_create_agaent" type="text" class="form-control form_control_custom">
        </div>
    </div>
        <div class="row form-group">
        <div class="col-md-4">
            Last Name
        </div>
        <div class="col-md-8">
            <input id="last_name_create_agaent" name="last_name_create_agaent" type="text" class="form-control form_control_custom">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            Username
        </div>
        <div class="col-md-8">
            <input id="username_create_agaent" name="username_create_agaent" type="text" class="form-control form_control_custom">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            Password
        </div>
        <div class="col-md-8">
            <input id="password_create_agaent" name="password_create_agaent" type="password" class="form-control form_control_custom">
        </div>
    </div>
<!--    <div class="row form-group">
        <div class="col-md-4">
            Roles
        </div>
        <div class="col-md-8">
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
    </div>-->
    <div class="row form-group">
        <div class="col-md-4">
            Commission
        </div>
        <div class="col-md-8">
            <input id="commission_create_agent" name="commission_create_agent" type="text" class="form-control form_control_custom">
            <label class="commission_label">(Taka Per Thousand)</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-6 col-md-6">
            <a class="ajax-link">
                <input type="submit" id="submit_create_agent" name="submit_create_agent" class="btn btn-sm btn-default  pull-right" value="Create">
            </a>
        </div>
    </div>

<?php echo form_close(); ?>