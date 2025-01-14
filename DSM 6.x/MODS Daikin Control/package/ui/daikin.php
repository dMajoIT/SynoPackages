<?php
	$ip=$_GET["ip"];
	$name=$_GET["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home Temperature</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
   	body { padding-top: 70px; }
	</style>

	<!-- Font Awsome -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/daikin_ui.js"></script>
</head>
	<!--page content-->
<body onload="update('<?php echo $ip; ?>');">
	<div class="container">
	
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  <div class="container-fluid">
			<div class="navbar-brand" id="device">
				<?php echo $name." [".$ip."]"; ?>
			</div>
			<p class="navbar-text navbar-right sr-only" id="spinner"><i class="fa fa-circle-o-notch fa-spin fa-lg"></i></p>
		  </div>
		</nav>
		
		<div class="alert alert-danger sr-only" id="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p></p>
		</div>
		
		<div class="container-fluid">
			<div class="row">
		  		
		  		<!-- ON/OFF -->
		  		<div class="col-sm-offset-10 col-sm-2 pull-right">
		  			<a class="btn btn-default" onclick='power_onclick("<?php echo $ip; ?>");'><i class="fa fa-power-off" style="font-size:1.6em;color:black;"></i><b style="font-size:1.5em;" id="power"> OFF</b></a>
		  		</div>
	  		
	  		</div>
			<br>
			<div class="row">
	   		<div class="col-md-4 col-sm-6">
	   		
	   			<!-- Mode -->
					<h4>Mode</h4>
					<div class="btn-group">
						<a class="btn btn-default mode-btn" id="mode_cooling" onclick='mode_onclick("3", "<?php echo $ip; ?>");'><i class="fa fa-asterisk fa-2x" title="Cooling"></i></a>
						<a class="btn btn-default mode-btn" id="mode_dehum" 	onclick='mode_onclick("2", "<?php echo $ip; ?>");'><i class="fa fa-tint fa-2x" title="Dehumidification"></i></a>
						<a class="btn btn-default mode-btn" id="mode_heating" onclick='mode_onclick("4", "<?php echo $ip; ?>");'><i class="fa fa-sun-o fa-2x" title="Heating"></i></a>
						<a class="btn btn-default mode-btn" id="mode_fan" 		onclick='mode_onclick("6", "<?php echo $ip; ?>");'><i class="fa fa-retweet fa-2x" title="Fan"></i></a>
						<a class="btn btn-default mode-btn" id="mode_auto" 	onclick='mode_onclick("1", "<?php echo $ip; ?>");'><i class="fa fa-font fa-2x" title="Auto"></i></a>
					</div>
					
		  		</div>
		  		<div class="col-md-4 col-sm-6">
		  		
		  			<!-- Fan -->
					<h4>Fan</h4>
					<div class="btn-group">
						<a class="btn btn-default fan-btn" id="fan_auto" 	onclick='fan_onclick("A", "<?php echo $ip; ?>");'><i class="fa fa-font fa-2x" title="Auto"></i></a>
						<a class="btn btn-default fan-btn" id="fan_eco" 	onclick='fan_onclick("B", "<?php echo $ip; ?>");'><i class="fa fa-leaf fa-2x" title="Eco"></i></a>
						<a class="btn btn-default" onclick='fan_onclick("3", "<?php echo $ip; ?>");'><img src="media/level_1_off.svg" height="29px" id="fan_lvl_1"></a>
						<a class="btn btn-default" onclick='fan_onclick("4", "<?php echo $ip; ?>");'><img src="media/level_2_off.svg" height="29px" id="fan_lvl_2"></a>
						<a class="btn btn-default" onclick='fan_onclick("5", "<?php echo $ip; ?>");'><img src="media/level_3_off.svg" height="29px" id="fan_lvl_3"></a>
						<a class="btn btn-default" onclick='fan_onclick("6", "<?php echo $ip; ?>");'><img src="media/level_4_off.svg" height="29px" id="fan_lvl_4"></a>
						<a class="btn btn-default" onclick='fan_onclick("7", "<?php echo $ip; ?>");'><img src="media/level_5_off.svg" height="29px" id="fan_lvl_5"></a>
					</div>
		  			
		  		</div>
		  		<div class="col-md-4 hidden-sm">
		  		
		  			<!-- Wings Direction -->
					<h4>Wings Direction</h4>
					<div class="btn-group" >
						<a class="btn btn-default wing-btn" id="wing_v" onclick='wing_onclick("1", "<?php echo $ip; ?>");'><i class="fa fa-arrows-v fa-2x" title="Vertical"></i></a>
						<a class="btn btn-default wing-btn" id="wing_h" onclick='wing_onclick("2", "<?php echo $ip; ?>");'><i class="fa fa-arrows-h fa-2x" title="Horizontal"></i></a>
						<a class="btn btn-default wing-btn"	id="wing_b" onclick='wing_onclick("3", "<?php echo $ip; ?>");'><i class="fa fa-arrows fa-2x" title="Both"></i></a>
					</div>
				
				</div>
		  	</div>
		  	<br>
		  	<div class="row">
		  		<div class="visible-sm col-sm-6">
		  			
		  			<!-- Wings Direction -->
					<h4>Wings Direction</h4>
					<div class="btn-group" >
						<a class="btn btn-default wing-btn" id="wing_v" onclick='wing_onclick("1", "<?php echo $ip; ?>");'><i class="fa fa-arrows-v fa-2x" title="Vertical"></i></a>
						<a class="btn btn-default wing-btn" id="wing_h" onclick='wing_onclick("2", "<?php echo $ip; ?>");'><i class="fa fa-arrows-h fa-2x" title="Horizontal"></i></a>
						<a class="btn btn-default wing-btn"	id="wing_b" onclick='wing_onclick("3", "<?php echo $ip; ?>");'><i class="fa fa-arrows fa-2x" title="Both"></i></a>
					</div>		  		
				
				</div>
			</div>	  	
		  	<br>
		  	<div class="row">
		  		<div class="col-md-4 col-sm-6" id="target_temp_col">
		  			
		  			<!--Target temperature-->
					<h4>Target temperature</h4>
					<div class="btn-group" >
						<a class="btn btn-default" style="font-size:2.2em;padding-top:12px;padding-bottom:12px;"><b id="target_temp"> ~ C</b></a>
					</div>
					
					<div class="btn-group-vertical">
						<a class="btn btn-default wing-btn" id="target_temp_up" onclick='temp_onclick(1, "<?php echo $ip; ?>");' style="font-size:1.7em;padding-top:0px;padding-bottom:0px;"><i class="fa fa-chevron-up"></i></a>
						<a class="btn btn-default wing-btn"	id="target_temp_down" onclick='temp_onclick(-1, "<?php echo $ip; ?>");' style="font-size:1.7em;padding-top:0px;padding-bottom:0px;"><i class="fa fa-chevron-down"></i></a>
					</div>
					

		  			
		  		</div>
		  		<div class="col-md-4 col-sm-6">
		  			
		  			<!-- TEMPERATURES -->
					<h4>Temperatures</h4>
					<div class="btn-group" >
						<a class="btn btn-default" style="font-size:1.8em;">
							<i class="fa fa-home" title="Indoor"></i><b id="home_temp"> - C</b>
						</a>
						<a class="btn btn-default" style="font-size:1.8em;">
							<i class="fa fa-image" title="Outdoor"></i><b id="outside_temp"> - C</b>
						</a>
					</div>
		  			
		  		</div>
	  		</div>
		</div>
	
	</div>
	<br>
</body>
</html>
