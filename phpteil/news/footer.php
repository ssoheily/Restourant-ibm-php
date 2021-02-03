<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 	
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<!--  in config.php call lib-folder(function.php ) for 'home_url()'   -->
           <!--  <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php echo APP_TITLE; ?>
            </a> -->
         </div>

			<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo home_url(); ?>">HOME</a></li>
						<li><a href="<?php echo home_url('register.php'); ?>">CREATE ACCOUNT</a></li>
					</ul>
			
					<ul class="nav navbar-nav navbar-right">
						<?php if(is_user_loggen_in($loginparam)) { ?>
						<li>
							<p class ="navbar-text">
							
							<!-- get_current_user_data() is in auth.php -->
							<?php $current_user=get_current_user_data();?> 
							<strong><?php echo  $current_user['userID'];?> </strong>
							</p>
						</li>
							<!-- is_user_loggen_in() is in auth.php -->
							  
							   <li><a href="<?php echo home_url('index.php'); ?>">LOG OUT</a></li>
							   
						<?php  } else {?>
							
								<li ><a href="<?php echo home_url('login.php'); ?>">LOG IN</a></li>
								<li ><a href="<?php echo home_url('admin_login.php'); ?>">ADMIN</a></li>
						<?php } ?>
					 
					</ul>
			
			</div><!--/.nav-collapse --> 
	  </div>	
	</nav> 
	 <!-- /.container -->
 </div><!-- /.container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		 <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo SITE_URL;?>includes/bootstrap/js/bootstrap-rtl.min.js "></script>
  </body>
</html>
