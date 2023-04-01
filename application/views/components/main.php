<?php $this->load->view('components/head'); ?>
<div class="top-nav">
	<div class="top-nav-box">
		<div class="side-nav-mobile"><i class="fa fa-bars"></i></div>
		<div class="logo-wrapper">
			<div class="logo-box">
				<img alt="pongo" src="<?php echo base_url() . 'assets/images/logoo1.png'; ?>">
				<a href="<?php echo base_url(); ?>">
					
				</a>
			</div>
		</div>
		<div class="top-nav-content">
			<div class="top-nav-box">
				
				
				<div class="top-notification">
					
					
					
				</div>
				<div class="user-top-profile">
					<div class="user-image">
						<div class="user-on"></div>
						<img alt="pongo" src="<?php echo base_url() . 'assets/images/profile.png'; ?>">
					</div>
					<div class="clear">
						<div class="user-name"><?php echo $active_user->name; ?></div>
						<div class="user-group"><?php echo $active_user_group->group_name; ?></div>
						<ul class="user-top-menu animated bounceInUp">
							<li><a href="<?php echo base_url() . 'profile'; ?>">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
							<li><a href="<?php echo base_url() . 'settings'; ?>">Settings</a></li>
							<li><a href="<?php echo base_url() . 'change_password'; ?>">Change Password</a></li>
							<li><a href="<?php echo base_url() . 'auth/logout'; ?>">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-nav-mobile"><i class="fa fa-cog"></i></div>
	</div>
</div>
<div class="wrapper <?php echo $menu_style != 'default' ? $menu_style : ''; ?>">
	<aside class="side-nav">
		
		<div class="user-side-profile">
			<div class="user-image">
				<div class="user-on"></div>
				<img alt="pongo" src="<?php echo base_url() . 'assets/images/profile.png'; ?>">
			</div>
			<div class="clear">
				<div class="user-name"><?php echo $active_user->name; ?></div>
				<div class="user-group"><?php echo $active_user_group->group_name; ?></div>
				<ul class="user-side-menu animated bounceInUp">
					<li><a href="<?php echo base_url() . 'profile'; ?>">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
					<li><a href="<?php echo base_url() . 'settings'; ?>">Settings</a></li>
					<li><a href="<?php echo base_url() . 'change_password'; ?>">Change Password</a></li>
					<li><a href="<?php echo base_url() . 'auth/logout'; ?>">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="main-menu-title">Menu</div>
		<div class="main-menu">
			<ul>
				<li class="<?php echo $active_menu == 0 ? 'active' : ''; ?>">
					<a href="<?php echo base_url(); ?>dashboard">
						<i class="fa fa-bars"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				<?php foreach ($list_menu as $key => $menu) { ?>
	                <?php if ($menu->id < 60) { ?>
	                    <!-- Print parent menu -->
	                    <?php if ($menu->parent_id == 0 && $menu->is_have_child != 0) { ?>
				            <li class="<?php echo $active_menu == $menu->id && $menu_style != 'compact-nav' ? 'active' : ''; ?>">
					            <a href="">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
						            <?php if ($key == 0) { ?>
							            
						            <?php } elseif ($key == 6) { ?>
							            
						            <?php } ?>
					            </a>
					            <ul>
						            <!-- Print submenu -->
	            		            <?php foreach ($list_menu as $submenu) { ?>
	                		            <?php if ($submenu->parent_id == $menu->id) { ?>
	                    		            <li><a href="<?php echo base_url() . $submenu->link; ?>"><?php echo $submenu->title; ?></a></li>
	                		            <?php } ?>
	            		            <?php } ?>
					            </ul>
				            </li>
	                    <?php } elseif ($menu->parent_id == 0 && $menu->is_have_child == 0) { ?>
	                        <li class="<?php echo $active_menu == $menu->id ? 'active' : ''; ?>">
					            <a href="<?php echo base_url() . $menu->link; ?>">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
					            </a>
				            </li>
                        <?php } ?>
                    <?php } ?>
	            <?php } ?>
			</ul>
		</div>

		<div class="main-menu">
			<ul>
				<?php foreach ($list_menu as $key => $menu) { ?>
	                <?php if ($menu->id > 60) { ?>
	                    <!-- Print parent menu -->
	                    <?php if ($menu->parent_id == 0 && $menu->is_have_child != 0) { ?>
				            <li class="<?php echo $active_menu == $menu->id && $menu_style != 'compact-nav' ? 'active' : ''; ?>">
					            <a href="">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
						            <?php if ($key == 0) { ?>
							            
						            <?php } elseif ($key == 6) { ?>
							            
						            <?php } ?>
					            </a>
					            <ul>
						            <!-- Print submenu -->
	            		            <?php foreach ($list_menu as $submenu) { ?>
	                		            <?php if ($submenu->parent_id == $menu->id) { ?>
	                    		            <li><a href="<?php echo base_url() . $submenu->link; ?>"><?php echo $submenu->title; ?></a></li>
	                		            <?php } ?>
	            		            <?php } ?>
					            </ul>
				            </li>
	                    <?php } elseif ($menu->parent_id == 0 && $menu->is_have_child == 0) { ?>
	                        <li class="<?php echo $active_menu == $menu->id ? 'active' : ''; ?>">
					            <a href="<?php echo base_url($menu->link); ?>">
						            <i class="<?php echo $menu->icon; ?>"></i> 
						            <span><?php echo $menu->title; ?></span>
					            </a>
				            </li>
                        <?php } ?>
                    <?php } ?>
	            <?php } ?>
			</ul>
		</div>
		<div class="side-banner">
			<div class="banner-content">
				<div class="title">Pongo <div class="version">v1.1</div></div>
				<div class="subtitle">Simple & Clean Admin Template</div>
				<a class="purchase" href="https://codecanyon.net/item/pongo-laravel-admin-template-user-management-crud/20042240">Purchase Now</a>
			</div>
		</div>
	</aside>
	<div class="main">
		<?php $this->load->view($subview); ?>		
	</div>
</div>
<?php $this->load->view('components/foot'); ?>

