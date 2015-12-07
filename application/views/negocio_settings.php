<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>

<div id="content">
		
	<div class="container">

	<?php if(!empty($this->session->flashdata('success'))){ ?>

			<div class="alert alert-success">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Exitoso!</h4>
			<?php echo $this->session->flashdata('success') ?>
			</div>

		  <?php }else if(!empty($this->session->flashdata('error'))){ ?>

			<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Error!</h4>
			<?php echo $this->session->flashdata('error') ?>
			</div>

		<?php } ?>

	<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			   <li class="active">Inventario - Agrear Productos Nuevos</li>
			</ul>
			
		</div> <!-- /.page-title -->
		
		<div class="row">

		<div class="span4">
		
				<div class="widget">
					
					<div class="widget-header">
						<h3>
							<i class="icon-bookmark"></i> 
							Menu						
						</h3>
						
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">
						
						<div class="shortcuts" >

							<a href="<?php echo base_url(); ?>index.php/facturacion/" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Crear Factura</span>
							</a>

							<a href="<?php echo base_url(); ?>index.php/facturacion/mostrarFactura/factura" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Ver Facturas</span>
							</a>

							<a href="<?php echo base_url(); ?>index.php/facturacion/mostrarFactura/cotizacion" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Ver Cotizaciones</span>
							</a>

							
															
						</div> <!-- /.shortcuts -->
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget --><!-- /.widget -->
				
							
			</div> <!-- /.span2 -->
			
			<div class="span8">
		
				<div class="widget">
					
					<div class="widget-header">
						
						<h3>
							<i class="icon-tasks"></i> 
							Configuracion del Negocio					
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">	

					<?php 

					foreach($negocio->result_array() as $negocio){

						$nombre = $negocio["nombre"];
						$rnc = $negocio["rnc"];
						$direccion = $negocio["direccion"];
						$telefono1 = $negocio["telefono1"];
						$fax = $negocio["fax"];
						$whatsapp = $negocio["whatsapp"];
						$email = $negocio["email"];
						$itbis = $negocio["itbis"];
						$moneda = $negocio["moneda"];
						$nota = $negocio["nota_factura"];
						$nota2 = $negocio["nota_factura2"];

						$showFax = $negocio["showFax"];
						$app = $negocio["showWhatsapp"];
						$showEmail = $negocio["showEmail"];
						$showHeader = $negocio["showHeader"];
						$showFooter = $negocio["showFooter"];

						if($showFax == '1'){

							$mshowFax = 'checked';

						}else{

							$mshowFax = '';

						}


						if($app == '1'){

							$mapp = 'checked';

						}else{

							$mapp = '';

						}

						if($showEmail == '1'){

							$mshowEmail = 'checked';

						}else{

							$mshowEmail = '';

						}

						if($showHeader == '1'){

							$mshowHeader = 'checked';

						}else{

							$mshowHeader = '';

						}

						if($showFooter == '1'){

							$mshowFooter = 'checked';

						}else{

							$mshowFooter = '';

						}





						
					}



					?>	
						
						<form action="<?php echo base_url(); ?>index.php/negocio/processNegocio" method="post" id="contact-form" class="form-horizontal" novalidate="novalidate">
							<fieldset>
							    <div class="control-group">
							      <label class="control-label" for="name">Nombre</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="nombre" value="<?php echo $nombre ?>" >
							      </div>
							    </div>

							     <div class="control-group">
							      <label class="control-label" for="name">RNC</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="rnc" value="<?php echo $rnc ?>">
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Direccion</label>
							      <div class="controls">
							       <textarea class="input-large" id="textarea" rows="3" name="direccion"><?php echo $direccion ?></textarea>
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Telefono 1</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="telefono1" value="<?php echo $telefono1 ?>">
							      </div>
							    </div>

							     

							     <div class="control-group">
							      <label class="control-label" for="name">Fax</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="fax" value="<?php echo $fax ?>">
							        <input type="checkbox" name="showFax" value="<?php echo $showFax;?>" <?php echo $mshowFax;?> > Mostrar en la Factura.
							      </div>
							    </div>

							     <div class="control-group">
							      <label class="control-label" for="name">Whatsapp</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="whatsapp" value="<?php echo $whatsapp ?>">
							        <input type="checkbox" name="showWhatsapp" value="<?php echo $app;?>" <?php echo $mapp;?> > Mostrar en la Factura.
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Email</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="email" value="<?php echo $email ?>">
							        <input type="checkbox" name="showEmail" value="<?php echo $showEmail;?>" <?php echo $mshowEmail;?> > Mostrar en la Factura.
							      </div>
							    </div>

							     <div class="control-group">
							      <label class="control-label" for="name">Itbis</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="itbis" value="<?php echo $itbis ?>">
							      </div>
							    </div>

							     <div class="control-group">
							      <label class="control-label" for="name">Simbolo Moneda</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="moneda" value="<?php echo $moneda ?>">
							      </div>
							    </div>

							     <div class="control-group">
							      <label class="control-label" for="name">Nota Cabezera Factura</label>
							      <div class="controls">
							       <textarea class="input-large" id="textarea" rows="3" name="nota"><?php echo $nota?></textarea>
							       <input type="checkbox" name="showHeader" value="<?php echo $showHeader;?>" <?php echo $mshowHeader;?> > Mostrar en la Factura.
							      </div>
							    </div>

							      <div class="control-group">
							      <label class="control-label" for="name">Nota Pie Factura</label>
							      <div class="controls">
							       <textarea class="input-large" id="textarea" rows="3" name="nota2"><?php echo $nota2?></textarea>
							       <input type="checkbox" name="showFooter" value="<?php echo $showFooter;?>" <?php echo $mshowFooter;?> > Mostrar en la Factura.
							      </div>
							    </div>

							    <div class="form-actions">
							      <button type="submit" class="btn btn-primary btn-large"><i class="icon-star"></i> Guardar Configuracion</button>
							    </div>
							  </fieldset>
							</form>
						
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
				
							
			</div> <!-- /.span8 -->	


			

		</div> <!-- /.row -->
		
		
	</div> <!-- /.container -->
	
</div> <!-- /#content -->


<?php $this->load->view('footer'); ?>
