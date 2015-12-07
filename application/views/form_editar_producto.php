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
			   <li class="active">Inventario - Editar Productos</li>
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
							Editar Producto						
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">	
					<?php 

					foreach($producto->result_array() as $producto){

						$codigo = $producto["codigo"];
						$nombre = $producto["nombre"];
						$descripcion = $producto["descripcion"];
						$precio = $producto["precio"];
						$existencia =  $producto["existencia"];
						$estado =  $producto["estado"];

					}



					?>	
						
						<form action="<?php echo base_url(); ?>index.php/inventario/processEditarArticulo" method="post" id="inventario-form" class="form-horizontal" novalidate="novalidate">
							<fieldset>
							    <div class="control-group">
							      <label class="control-label" for="name">Nombre</label>
							      <div class="controls">
							      	<input type="hidden" class="input-large" name="codigo" id="name" value="<?php echo $codigo;?>" />
							        <input type="text" class="input-large" name="nombre" id="name" value="<?php echo $nombre;?>" />
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Descripcion</label>
							      <div class="controls">
							       <textarea class="input-large" id="textarea" rows="3" name="descripcion"><?php echo $descripcion;?></textarea>
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Precio</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="precio" id="name" value="<?php echo $precio;?>" >
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Existencia</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="existencia" id="name" value="<?php echo $existencia;?>" >
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
							      <button type="submit" class="btn btn-warning btn-large"><i class="icon-star"></i> Guardar Producto</button>
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
