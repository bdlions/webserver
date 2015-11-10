<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $total_agents_today; ?> Added Today" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user green"></i>

            <div>Total Agents</div>
            <div><?php echo $total_agents; ?></div>
            <span class="notification"><?php echo $total_agents_today; ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?php echo $total_subagents_today; ?> Added Today" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user yellow"></i>

            <div>Total Sub-agents</div>
            <div><?php echo $total_subagents; ?></div>
            <span class="notification yellow"><?php echo $total_subagents_today; ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Today Agent's Transaction <?php echo $total_agent_transactions_today; ?> TK" class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart green"></i>

            <div>Agent's Total Transaction</div>
            <div><?php echo $total_agent_transactions; ?> Tk</div>
            <span class="notification green"><?php echo $total_agent_transactions_today; ?> Tk</span>
        </a>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Today Sub-agent's Transaction <?php echo $total_subagent_transactions_today; ?> Tk" class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div>Sub-agent's Total Transaction</div>
            <div><?php echo $total_subagent_transactions; ?> Tk</div>
            <span class="notification yellow"><?php echo $total_subagent_transactions_today; ?> Tk</span>
        </a>
    </div>
</div>