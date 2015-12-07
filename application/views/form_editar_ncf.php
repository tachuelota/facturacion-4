<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>

<div id="content">
		
	<div class="container">

	<?php if($this->session->flashdata('success')){ ?>

			<div class="alert alert-success">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Exitoso!</h4>
			<?php echo $this->session->flashdata('success') ?>
			</div>

		  <?php }else if($this->session->flashdata('error')){ ?>

			<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Error!</h4>
			<?php echo $this->session->flashdata('error') ?>
			</div>

		<?php } ?>


	<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			   <li class="active">Negocio - Editar NCF</li>
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

							<a href="<?php echo base_url(); ?>index.php/inventario/agregarArticulo" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Inventario</span>
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
							Editar NCF					
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">	
					<?php 

					foreach($ncf as $n){

						$id = $n["id"];
						$numero = $n["numero"];
						$descripcion = $n["descripcion"];
						$estado =  $n["estado"];

					}

					?>	
						
						<form action="<?php echo base_url(); ?>index.php/facturacion/processEditarNcf" method="post" id="inventario-form" class="form-horizontal" novalidate="novalidate">
							<fieldset>
							    <div class="control-group">
							      <label class="control-label" for="name">Numero</label>
							      <div class="controls">
							      	<input type="hidden" class="input-large" name="id" id="name" value="<?php echo $id;?>" />
							        <input type="text" class="input-large" name="numero" id="name" value="<?php echo $numero;?>" />
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Descripcion</label>
							      <div class="controls">
							       <textarea class="input-large" id="textarea" rows="3" name="descripcion"><?php echo $descripcion;?></textarea>
							      </div>
							    </div>

							      <div class="control-group">
							      <label class="control-label" for="name">Estado</label>
							      <div class="controls">
							     <select name="estado">
							     <option value="<?php echo $estado;?>"><?php echo $estado;?></option>
							     <option value="Activo">Activo</option>
							     <option value="Inactivo">Inactivo</option>
							     <option value="Borrado">Borrado</option>
							     </select>   
							      </div>
							    </div>

							    <div class="form-actions">
							      <button type="submit" class="btn btn-warning btn-large"><i class="icon-star"></i> Guardar NCF</button>
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
