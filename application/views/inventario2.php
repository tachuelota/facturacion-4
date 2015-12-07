<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard | Slate Admin 2.0</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Styles -->
<link href="<?php echo base_url(); ?>third_party/template/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>third_party/template/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>third_party/template/css/bootstrap-overrides.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>third_party/template/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>third_party/template/css/slate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>third_party/template/css/slate-responsive.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>third_party/template/css/pages/dashboard.css" rel="stylesheet">


<!-- Javascript -->
<script src="<?php echo base_url(); ?>third_party/template/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>third_party/template/js/Slate.js"></script>

<script src="<?php echo base_url(); ?>third_party/template/js/plugins/excanvas/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>third_party/template/js/plugins/flot/jquery.flot.resize.js"></script>

<script src="<?php echo base_url(); ?>third_party/template/js/demos/charts/bar.js"></script>


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
 	
  	
<div id="header">
	
	<div class="container">			
		
		<h1><a href="<?php echo base_url(); ?>third_party/template/">Slate Admin 2.0</a></h1>			
		
		<div id="info">				
			
			<a href="javascript:;" id="info-trigger">
				<i class="icon-cog"></i>
			</a>
			
			<div id="info-menu">
				
				<div class="info-details">
				
					<h4>Welcome back, John D.</h4>
					
					<p>
						Logged in as Admin.
						<br>
						You have <a href="javascript:;">5 messages.</a>
					</p>
					
				</div> <!-- /.info-details -->
				
				<div class="info-avatar">
					
					<img src="<?php echo base_url(); ?>third_party/template/img/avatar.jpg" alt="avatar">
					
				</div> <!-- /.info-avatar -->
				
			</div> <!-- /#info-menu -->
			
		</div> <!-- /#info -->
		
	</div> <!-- /.container -->

</div> <!-- /#header -->


<div id="nav">
		
	<div class="container">
		
		<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<i class="icon-reorder"></i>
      	</a>
		
		<div class="nav-collapse">
			
			<ul class="nav">
		
				<li class="nav-icon active">
					<a href="<?php echo base_url(); ?>third_party/template/">
						<i class="icon-home"></i>
						<span>Home</span>
					</a>	    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th"></i>
						Components
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>third_party/template/forms.html">Forms</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/ui-elements.html">UI Elements</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/grid.html">Grid Layout</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/tables.html">Tables</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/widgets.html">Widget Boxes</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/charts.html">Charts</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/tabs.html">Tabs & Accordion</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/buttons.html">Buttons</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-copy"></i>
						Sample Pages
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>third_party/template/invoice.html">Invoice</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/faq.html">FAQ</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/pricing.html">Pricing Plans</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/gallery.html">Image Gallery</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/wizard.html">Wizard</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/reports.html">Reports</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/calendar.html">Calendar</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-external-link"></i>
						Other Pages
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li><a href="<?php echo base_url(); ?>third_party/template/login.html">Login</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/signup.html">Signup</a></li>
						<li><a href="<?php echo base_url(); ?>third_party/template/error.html">Error</a></li>
						<li class="dropdown">
							<a href="javascript:;">
								Dropdown Menu									
								<i class="icon-chevron-right sub-menu-caret"></i>
							</a>
							
							<ul class="dropdown-menu sub-menu">
		                        <li><a href="javascript:;">Dropdown #1</a></li>
		                        <li><a href="javascript:;">Dropdown #2</a></li>
		                        <li><a href="javascript:;">Dropdown #3</a></li>
		                        <li><a href="javascript:;">Dropdown #4</a></li>
		                    </ul>
						</li>
					</ul>    				
				</li>
				
				
			
			</ul>
			
			
			<ul class="nav pull-right">
		
				<li class="">
					<form class="navbar-search pull-left">
						<input type="text" class="search-query" placeholder="Search">
						<button class="search-btn"><i class="icon-search"></i></button>
					</form>	    				
				</li>
				
			</ul>
			
		</div> <!-- /.nav-collapse -->
		
	</div> <!-- /.container -->
	
</div> <!-- /#nav -->


<div id="content">
		
	<div class="container">
		
		<div class="row">
			
			<div class="span4">
		
				<div class="widget">
					
					<div class="widget-header">
						
						<h3>
							<i class="icon-tasks"></i> 
							Quick Stats								
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">		
						
						
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
				
			
				
				
			</div> <!-- /.span4 -->
			
			<div class="span8">
				
				
	<div class="widget">
					
					<div class="widget-header">
						
						<h3>
							<i class="icon-tasks"></i> 
							Quick Stats								
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">		
						
<table border="1" class="table table-bordered table-striped">
<tr>
<thead>
<th>Codigo</th>
<th>Nombre</th>
<th>Precio</th>
</thead>
</tr>
<tbody>
<?php foreach($inventario->result_array() as $row){ ?>
	<tr>
	<td><?php echo $row['codigo']; ?></td>
	<td><?php echo $row['nombre']; ?></td>
	<td><?php echo $row['precio']; ?></td>
	</tr>
<?php }?>
</tbody>	
</table>						
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
				
				
	
				
			</div> <!-- /.span8 -->
			
		</div> <!-- /.row -->
		
		
	</div> <!-- /.container -->
	
</div> <!-- /#content -->



<div id="footer">	
		
	<div class="container">
		
		&copy; 2015 Propel UI, all rights reserved.
		
	</div> <!-- /.container -->		
	
</div> <!-- /#footer -->





  </body>
</html>
