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
							Agregar Producto						
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">		
						
						<form action="<?php echo base_url(); ?>index.php/inventario/processAgregarArticulo" method="post" id="inventario-form" class="form-horizontal" novalidate="novalidate">
							<fieldset>
							    <div class="control-group">
							      <label class="control-label" for="name">Nombre</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="nombre" id="name">
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Descripcion</label>
							      <div class="controls">
							       <textarea class="input-large" id="textarea" rows="3" name="descripcion"></textarea>
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Precio</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="precio" id="precio">
							      </div>
							    </div>

							    <div class="control-group">
							      <label class="control-label" for="name">Existencia</label>
							      <div class="controls">
							        <input type="text" class="input-large" name="existencia" id="existencia">
							      </div>
							    </div>

							    <div class="form-actions">
							      <button type="submit" class="btn btn-primary btn-large"><i class="icon-star"></i> Guardar Producto</button>
							      <button type="reset" class="btn btn-large">Cancelar</button>
							    </div>
							  </fieldset>
							</form>
						
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
				
							
			</div> <!-- /.span8 -->	


			<div class="span12">
	      		
	      		<div class="widget widget-table">
						
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Inventario							
						</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						
						<table class="table table-striped table-bordered table-highlight" id="example">
							<thead>
								<tr>
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Precio</th>
									<th>Existencia</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($inventario->result_array() as $row){ ?>
								<tr>
								<td><?php echo $row['codigo']; ?></td>
								<td><a href="<?php echo base_url(); ?>index.php/inventario/editarArticulo/<?php echo $row['codigo']; ?>" title="Editar Producto"><?php echo $row['nombre']; ?></a></td>
								<td><?php echo $row['descripcion']; ?></td>
								<td><?php echo $row['precio']; ?></td>
								<td><?php echo $row['existencia']; ?></td>
								<td><a href="<?php echo base_url(); ?>index.php/inventario/editarArticulo/<?php echo $row['codigo']; ?>">Editar Articulo</a></td>
								</tr>
								<?php }?>	
							</tbody>
						</table>
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /span12 -->
		    

		</div> <!-- /.row -->
		
		
	</div> <!-- /.container -->
	
</div> <!-- /#content -->


<?php $this->load->view('footer'); ?>
