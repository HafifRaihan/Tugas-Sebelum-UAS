<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>NodeMCU Log</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="data/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="data/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="data/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/css/util.css">
	<link rel="stylesheet" type="text/css" href="data/css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(data/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Selamat Datang
					</span>
				</div>
				<div class="row" style="padding:20px;">
					<div class="col-md-6" align="center">
						<!-- <input class="login100-form-btn" type="submit" id="createDB" name="createDB" value="Create DB"/> -->
						<button class="login100-form-btn" type="submit" id="createDB" name="createDB">
							<span class="fa fa-database"> </span> &nbsp; Create DB
						</button>
					</div>
					<div class="col-md-6" align="center">
						<button class="login100-form-btn" onclick="gotoApps()">
							<span class="fa fa-window-maximize"> </span> &nbsp; Go to Apps
						</button>
					</div>
				</div>				
					
			<!-- <input type="submit" class="button" name="select" value="select" /> -->
					
			</div>
		</div>
	</div>
	<div class="modal fade" id="notifModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Notification</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="header_text">Checking database and table ...</div>
					<p id="response_data"></p>                 
				</div>  
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
			  </div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="data/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="data/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="data/vendor/bootstrap/js/popper.js"></script>
	<script src="data/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="data/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="data/vendor/daterangepicker/moment.min.js"></script>
	<script src="data/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="data/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="data/js/main.js"></script>
	<script>
	$(document).ready(function(){
		$('#createDB').click(function(){
			var clickBtnValue = $(this).attr('name');
			var ajaxurl = 'db_create.php',
			data =  {'action': clickBtnValue};
			$.post(ajaxurl, data, function (response) {
				// Response div goes here.
				//alert(response);
				$('#notifModal').modal('show');
				$('#response_data').slideUp( 1000 ).fadeIn( 1000 );
				$('#response_data').html(response);
				//$('#response_data').val(response);
			});
		});
	});
	function gotoApps() {
	  window.location.href = "dashboard/index.php";
	}
	</script>
</body>
</html>