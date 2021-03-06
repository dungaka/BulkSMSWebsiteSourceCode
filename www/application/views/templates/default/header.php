<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		if(empty($og_description))$og_description=$configs['site_meta_description'];
	?>
    <meta name="description" content="<?php echo $og_description; ?>">
    <meta name="author" content="Tormuto.com">
	<meta name='keywords' content="<?php echo $configs['site_meta_keywords']; ?>">
	<meta name='copyright' content="<?php echo $configs['site_meta_copyright']; ?>">

    <title><?php
		if(empty($page_title))$page_title=$site_name;		
		echo ($page_title==$site_name)?$site_name:"$page_title - $site_name";
	?></title>
	
	<link rel="shortcut icon" href="<?php echo $this->general_model->get_url('favicon.ico'); ?>" type="image/x-icon" />
	
	<link href="<?php echo $this->general_model->get_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo $this->general_model->get_url('assets/css/jquery-ui.css');?>" rel="stylesheet">
	<link href='<?php echo $this->general_model->get_url('bootstrap/css/bootstrap-theme.min.css');?>' rel='stylesheet'>
	<link href='<?php echo $this->general_model->get_url('assets/css/font-awesome.min.css');?>' rel='stylesheet' type='text/css'>	
	
	<link href='<?php echo $this->general_model->get_url('assets/css/sb-admin.css');?>' rel='stylesheet'>
	<link href='<?php echo $this->general_model->get_url('assets/css/cgsms_style.css');?>' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='<?php echo $this->general_model->get_url('assets/css/bootstrap-datetimepicker.min.css');?>' />
	
	<script src="<?php echo $this->general_model->get_url('assets/js/modernizr-inputtypes.js');?>"></script>
	<script src="<?php echo $this->general_model->get_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?php echo $this->general_model->get_url('assets/js/jquery-ui.js');?>"></script>
	<script src="<?php echo $this->general_model->get_url('assets/js/moment.min.js');?>"></script>
	<script src="<?php echo $this->general_model->get_url('assets/js/moment_locales_en_gb.js');?>"></script>
	<script src="<?php echo $this->general_model->get_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>
	<script src="<?php echo $this->general_model->get_url('bootstrap/js/bootstrap.min.js');?>"></script>
			
	<script type='text/javascript'> var base_url='<?php echo base_url(); ?>'; </script>
    <script src="<?php echo $this->general_model->get_url('assets/js/script.js');?>"></script>
	<script src='<?php echo $this->general_model->get_url('assets/js/jquery.autovalidate.js');?>'></script>
	
	
	<?php
		if(!empty($configs['facebook_app_id']))
		{
			if(empty($og_image))$og_image=$this->general_model->get_url('cheap_global_sms_image1.jpg');
	?>
		<meta property='og:title' content="<?php echo $page_title;?>" />
		<meta property='og:type' content="business" />
		<meta property='og:url' content="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
		<meta property='og:site_name' content="<?php echo $configs['site_name']; ?>" />
		<meta property='og:image' content='<?php echo $og_image;?>' />
		<meta property='fb:app_id' content='<?php echo $configs['facebook_app_id'];?>' />
		<?php
		if(!empty($og_description)){
		?>
		<meta property='og:description' content="<?php echo str_replace('"',' ',$og_description);?>" />
		<?php }?>
	<?php
		}
	?>
	
</head>
<body style='background-color:#fff;' >
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a href='<?php echo $this->general_model->get_url();?>' class='pull-left' style='display:none;' >
					<img src='<?php echo $this->general_model->get_url('assets/images/cheap_global_sms_logo.png'); ?>' style='max-height:35px;background-color:#fff;'/>
				</a>
                <a class="navbar-brand" href="<?php echo $this->general_model->get_url();?>">
					<?php echo $site_name; ?>
				</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<?php if($this->general_model->logged_in() && !empty($my_profile)){ ?>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $my_profile['default_sender_id']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->general_model->get_url('pricing');?>"><i class="fa fa-fw fa-database"></i><?php echo $my_profile['balance']; ?> Units</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('sub_accounts');?>"><i class="fa fa-fw fa-cubes"></i> Sub Accounts</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('transaction');?>" style='white-space:nowrap;'><i class="fa fa-fw fa-list"></i> My Transactions</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('profile'); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('reset_password'); ?>"  style='white-space:nowrap;' ><i class="fa fa-fw fa-key"></i> Reset Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('?logout=1'); ?>" style='color:#A94442;' ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
				<li>
					<a href="<?php echo $this->general_model->get_url('pricing');?>"><i class="fa fa-fw fa-database"></i> 	<?php 
							if($my_profile['balance']<0&&$my_profile['flag_level']>0)echo "<span class='text-danger'>-0</span>"; 
							else echo  $my_profile['balance'];
						?>
					</a>
				</li>
				<?php } else { ?>
                    <li>
                        <a href="javascript:void(0)" data-toggle='modal' data-target='#login'> Login</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle='modal' data-target='#signup' > Register</a>
                    </li>
				<?php } ?>
				
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="<?php echo $this->general_model->get_url('faqs');?>">FAQs</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('terms');?>">Terms & Condition</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('privacy_policy');?>">Privacy</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->general_model->get_url('contact_us');?>">Contact Us</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if($page_name=='dashboard')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url();?>">
							<i class="fa fa-fw fa-dashboard"></i> Dashboard
						</a>
                    </li>
                    <li  class="<?php if($page_name=='payment')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url('pricing');?>"><i class="fa fa-fw fa-database"></i> Buy SMS Credits</a>
                    </li>
                    <li class="<?php if($page_name=='pricing')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url('pricing');?>"><i class="fa fa-fw fa-table"></i> Price List</a>
                    </li>
                    <li  class="<?php if($page_name=='coverage_list')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url('coverage_list');?>"><i class="fa fa-fw fa-list-alt"></i> Coverage List</a>
                    </li>
					<?php if(!$this->general_model->logged_in()){ ?>
                    <li  class="<?php if($page_name=='registration')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url('registration/send_free_sms');?>"><i class="fa fa-fw fa-paper-plane"></i> Send Testing SMS</a>
                    </li>
					<?php } ?>
				    <li  class="<?php if($page_name=='my_contacts')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url('my_contacts');?>">
							<i class="fa fa-fw fa-mobile"></i> Contacts/Numbers
						</a>
                    </li>
                    <li  class="<?php if(!empty($current_tab)&&$current_tab=='sms')echo 'active'; ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#send_sms_menus">
							<i class="fa fa-fw fa-paper-plane-o"></i> SMS Sending<i class="fa fa-fw fa-caret-down pull-right"></i>
						</a>
                        <ul id="send_sms_menus" class="collapse <?php if(!empty($current_tab)&&$current_tab=='sms')echo 'in'; ?>">
                            <li>
                                <a href="<?php echo $this->general_model->get_url('send_sms');?>">
									<i class="fa fa-fw fa-paper-plane"></i> Send SMS
								</a>
                            </li>
							<li>
								<a href="<?php echo $this->general_model->get_url('sms_log?stage=pending');?>">
									<i class="fa fa-fw fa-calendar"></i> Scheduled Messages
								</a>
							</li>
							<li>
								<a href="<?php echo $this->general_model->get_url('sms_log?stage=sent');?>">
									<i class="fa fa-fw fa-envelope-o"></i> Sent Messages
								</a>
							</li>
                        </ul>
                    </li>                    
					<li  class="<?php if($page_name=='gateway_api')echo 'active'; ?>">
                        <a href="<?php echo $this->general_model->get_url('gateway_api');?>"><i class="fa fa-fw fa-wrench"></i> Gateway API</a>
                    </li>
					<li>
						<div id='google_translate_element' style='display:inline-block;max-width:100%;overflow:auto;'></div>
					</li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<?php  if(!$this->general_model->logged_in()){ ?>
<form action='<?php echo $this->general_model->get_url('login'); ?>' role='form' method='post'>
  <!-- Code for Login / Signup Popup -->
  <!-- Modal Log in -->
	<div style="display: none;" class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	  <div class="modal-dialog" style="margin-top: 150px;max-width:400px;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h4 class="modal-title" id="myModalLabel1">Login</h4>
	      </div>
	      <div class="modal-body">
	        <div class='help-block'> Already have an account? </div>
			<div class='form-group'>
				<label>Your Email</label>
				<input placeholder="example@gmail.com" name="email" type="email"  value="<?php echo set_value('email');?>" class='form-control input-sm' required />
			</div>
	        <div class='form-group'>
				<label>Password</label>
				<input placeholder="Password" name="password" type="password" class='form-control input-sm' required>
			</div>
			<div class='text-right'>
				
				<a href="<?php echo $this->general_model->get_url('reset_password'); ?>">Forgot Password?</a>
			</div>
	      </div>
	      <div class="modal-footer">
			<button  class="btn btn-primary pull-left" type='submit' > Log In </button>
			<span> Not a member yet?</span>
			<a href='javascript:void(0)' style='white-space:nowrap;' data-dismiss='modal'  data-toggle='modal' data-target='#signup' >Sign Up!</a>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
 <!--Modal Login Ends -->
 </form>
 
 
 <form action='<?php echo $this->general_model->get_url('registration'); ?>' role='form' method='post'>
 <!-- Modal Sign-up Starts -->
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
	  <div class="modal-dialog" style="margin-top:100px;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h4 class="modal-title" id="myModalLabel2">Register</h4>
	      </div>
	      <div class="modal-body" id="signup_details">
			<div class='row'>
				<div class='form-group col-xs-6 col-md-6'>
					<label>First Name</label>
					<input placeholder="Firstname" name="firstname" type="text" mustmatch='^[a-zA-Z]+$' mustmatchmessage='Firstname can only contain alphabets. Symbols and punctuation marks are not allowed' value="<?php echo set_value('firstname');?>" class='form-control input-sm' required maxlength='35' >
				</div>
				<div class='form-group col-xs-6 col-md-6'>
					<label>Last Name</label>
					<input placeholder="Lastname" name="lastname" type="text"  mustmatch='^[a-zA-Z]+$' mustmatchmessage='Lastname can only contain alphabets. Symbols and punctuation marks are not allowed' value="<?php echo set_value('lastname');?>" class='form-control input-sm' required  maxlength='35' >
				</div>
			</div>
			
			<div class='row'>
				<div class='form-group col-xs-8 col-md-4'>
					<label>Country</label>
					<select name="country" class='form-control input-sm' required onchange="$('div.form-group .default_dial_code').val($(this).find('option:selected').attr('dial_code'))" >
						<?php
						if(empty($countries))$countries=$this->general_model->get_countries(false);
						
						foreach($countries as $country_id=>$country)
						{
					?>
						<option <?php
						echo " value='$country_id' ";
						echo " dial_code='{$country['dial_code']}' ";
						echo set_select('country',$country_id,$country_id==37);
						?> ><?php echo $country['country'];?></option>
					<?php
						}
					?>
					</select>
				</div>
				<div class='form-group col-xs-4 col-md-2'>
					<label>Prefix</label>
					<input placeholder="+234" name="default_dial_code" type='text' maxlength='5' pattern='^\+?[0-9]{1,5}$' title="Country/Network's default dial code, e.g 234" value='<?php echo set_value('default_dial_code','+234'); ?>'  class='form-control input-sm default_dial_code' required >
				</div>
				<div class='form-group col-xs-12 col-md-3'>
					<label>Timezone <a href='https://wikipedia.org/wiki/List_of_time_zones_by_country' title='Supplying the timezone offset of your country ensures that any information you recieve carries accurate timestamp' target='_blank' style='cursor:help;'>?</a></label>
					<div class='input-group'>
						<span class='input-group-addon'>GMT</span>
						<input placeholder="+01:00" name="timezone_offset" type='text' maxlength='6'  pattern='^[-+]?[0-9]{1,2}(:[0-9]{1,2})?$' title='e.g +1' value="<?php echo set_value('timezone_offset','+01:00');?>" class='form-control input-sm' required >
					</div>
				</div>
				<div class='form-group col-xs-12 col-md-3'>
					<label>Default Sender</label>
					<input placeholder="Sender Id" name='default_sender_id'  minlength='3' maxlength='11' type="text" value="<?php echo set_value('default_sender_id');?>" class='form-control input-sm' required >
				</div>
			</div>
	        
			<div class='row'>
				<div class='form-group  col-xs-6 col-md-6'>
					<label>Email</label>
					<input placeholder="example@gmail.com" name='email' type='email'  value="<?php echo set_value('email');?>"  class='form-control input-sm' required >
				</div>
				<div class='form-group  col-xs-6 col-md-6'>
					<label>Phone</label>
					<input placeholder="+23480XXXXXXXX" name="phone" type="text" title='+XXXXXXXXXXXX'  pattern="^\+?[0-9]{7,}$" value='<?php echo set_value('phone','+234');?>'  class='form-control input-sm default_dial_code' required >
				</div>
			</div>
			<div class='row'>
				<div class='form-group  col-xs-6 col-md-6'>
					<label>Password</label>
					<input placeholder="Password" name="password" type="password"  class='form-control input-sm' required >
				</div>
				<div class='form-group col-xs-6 col-md-6'>
					<label>Confirm</label>
					<input placeholder="Re-type Password" name="confirm_password" type="password"  class='form-control input-sm' required >
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
			<button class="btn btn-primary pull-left" type='submit' > Sign Up </button>
	       <span>&nbsp;&nbsp;&nbsp; Already a member? </span>
		   <a href='javascript:void(0)' data-dismiss='modal' data-toggle='modal' data-target='#login' >  Login now  </a> 
		 </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <!-- Modal Sign up ends! -->
  <!-- End code for Login / Signup Popup -->
  </form>
 <?php } ?>
        <div id="page-wrapper">
            <div class="container-fluid" style='min-height:680px;padding-bottom:50px;'>
				<?php if(!empty($this->general_model->flash_message)){ ?>
						<div class='alert alert-info fade in'>
							<span class='close' data-dismiss='alert'>&times;</span>
							<?php echo $this->general_model->flash_message;?>
						</div>
				<?php } ?>