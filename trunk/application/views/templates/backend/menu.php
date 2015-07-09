<ul class="nav">
	<?php if(array_key_exists("configuration", $role_by_group['code']) || array_key_exists("partner", $role_by_group['code'])):?>
            <li class="dropdown <?php if (in_array($this->uri->segment(2), array('server', 'configuration', 'partner'))) echo ' active'; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $this->lang->line('menu_system')?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <?php if(array_key_exists("configuration", $role_by_group['code'])):?>
                                <a href="<?php echo site_url("auth/configuration"); ?>"><?php echo $this->lang->line('menu_configuration')?></a>
                        <?php endif;?>
                        <?php if(array_key_exists("user", $role_by_group['code'])):?>
                                <a href="<?php echo site_url("auth/user"); ?>"><?php echo $this->lang->line('menu_user')?></a>
                        <?php endif;?>
                        <?php if(array_key_exists("group", $role_by_group['code'])):?>
                                <a href="<?php echo site_url("auth/group"); ?>"><?php echo $this->lang->line('menu_group')?></a>
                        <?php endif;?>
                        <?php if(array_key_exists("role", $role_by_group['code'])):?>
                                <a href="<?php echo site_url("auth/role"); ?>"><?php echo $this->lang->line('menu_role')?></a>	
                        <?php endif;?>	
                    </li>
                </ul>
            </li>
	<?php endif;?>
                
        <?php if(array_key_exists("advertising", $role_by_group['code'])):?>
            <li<?php if ($this->uri->segment(2) == "advertising") echo ' class="active"'; ?>>
                <a href="<?php echo site_url("auth/advertising"); ?>"><?php echo $this->lang->line('menu_advertising')?></a>
            </li>
	<?php endif;?>
</ul>

<p class="navbar-text pull-right">
	<?php echo $this->lang->line('hello').', '. $username;?> 
	<a href="<?php echo site_url("auth/home/logout"); ?>">
		<?php echo $this->lang->line('menu_logout')?>
	</a>
</p>
<style>
    .pull-right{
        width:240px;
    }    
</style>