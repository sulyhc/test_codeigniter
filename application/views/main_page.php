<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>PRUEBA CODEIGNITER</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="<?php echo base_url("assets/css/bootstrap.css") ?>" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->

		<script src="https://use.fontawesome.com/17dbc34ce3.js"></script>

		<!-- MORRIS CHART STYLES-->
		<link href="<?php echo base_url("assets/js/morris/morris-0.4.3.min.css")?>" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="<?php echo base_url("assets/css/custom.css")?>" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<link href='//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Binary admin</a>
				</div>
				<div style="color: white;
				padding: 15px 50px 5px 50px;
				float: right;
				font-size: 16px;">
					Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a>
				</div>
			</nav>
			<!-- /. NAV TOP  -->
			<nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
						<li class="text-center">
							<img src="<?php echo base_url("assets/img/find_user.png") ?>" class="user-image img-responsive"/>
						</li>

						<li>
							<a class="active-menu"  href="<?php echo base_url("index.php/MainPage/index")?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
						</li>
					</ul>

				</div>

			</nav>
			<!-- /. NAV SIDE  -->
			<div id="page-wrapper" >
				<div id="page-inner">
					<div class="row">
						<div class="col-md-12">
							<h2>ALTAS Y BAJAS</h2>
							<h5>Bienvenido. </h5>
							<hr />
						</div>
					</div>
					
					<div class="row">						
						<div class="col-md-2 col-md-offset-10">
							<button class="btn btn-primary btn-block" onclick="modalAltas()">Nuevo Registro</button>
						</div>
					</div>		
					<div id="tableDiv" class="row">
						
					</div>	
					
					<!-- modal -->
					<div id="modalMain" class="modal fade" role="dialog">
					</div>
					<!-- end modal -->

						
					<!-- /. ROW  -->
				</div>
				<!-- /. PAGE INNER  -->
			</div>
			<!-- /. PAGE WRAPPER  -->
		</div>
		<!-- /. WRAPPER  -->
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="<?php echo base_url("assets/js/jquery-1.10.2.js") ?>"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="<?php echo base_url("assets/js/jquery.metisMenu.js") ?>"></script>
		<!-- MORRIS CHART SCRIPTS -->
		<script src="<?php echo base_url("assets/js/morris/raphael-2.1.0.min.js") ?>"></script>
		<script src="<?php echo base_url("assets/js/morris/morris.js") ?>"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="<?php echo base_url("assets/js/custom.js") ?>"></script>
		<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

		<script>
					
		loadRecords();
		
		function loadRecords(){
			mainAjax("POST","<?php echo base_url("index.php/MainPage/loadRecords") ?>",{},"#tableDiv");
			$('#tableActivities').DataTable();
		}
		
		function modalAltas(){
			mainAjax("POST","<?php echo base_url("index.php/MainPage/modalAdd") ?>",{},"#modalMain");
			$("#modalMain").modal("show");
		}
		
		function modalEdit(id){
			mainAjax("POST","<?php echo base_url("index.php/MainPage/modalEdit") ?>",{},"#modalMain");
			$("#modalMain").modal("show");
		}
		
		function modalDelete(id){
			mainAjax("POST","<?php echo base_url("index.php/MainPage/modalDelete") ?>",{},"#modalMain");
			$("#modalMain").modal("show");
		}
			function mainAjax(type, url, data, place) {
				$.ajax({
					type : type,
					url : url,
					data : data,
					success : function(data) {
						$(place).html(data);
					}
				});
			}

		</script>

	</body>
</html>
