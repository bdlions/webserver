        <div class="navbar navbar-default">
            <div class="navbar-inner">

                <a class="navbar-brand" href="<?php echo base_url()?>"> <img alt="bKash Logo" src="resources/images/bkashLogo.png" class="hidden-xs"/>
                    <span>bKash</span></a>

                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user yellow"></i><span class="hidden-sm hidden-xs"><?php echo $user_info['first_name'].' '.$user_info['last_name']?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url().'auth/logout'?>">Logout</a></li>
                    </ul>
                </div>

                <!-- theme selector starts -->
                <div class="btn-group pull-right theme-container animated tada">
                    <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-tint red"></i><span
                            class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="themes">
                        <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                        <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                        <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                        <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                        <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                        <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                        <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                        <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                        <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                    </ul>
                </div>
            </div>
        </div>