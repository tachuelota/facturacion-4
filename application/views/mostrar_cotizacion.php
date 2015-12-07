<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>

<div id="content">
		
	<div class="container">

	<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			   <li class="active">Mostrar Cotizaciones</li>
			</ul>
			
		</div> <!-- /.page-title -->
		
		<div class="row">

		<div class="span2">
		
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

							<a href="<?php echo base_url(); ?>index.php/inventario/agregarArticulo" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Inventario</span>
							</a>

							
															
						</div> <!-- /.shortcuts -->
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget --><!-- /.widget -->
				
							
			</div> <!-- /.span2 -->
			

			<div class="span10">
	      		
	      		<div class="widget widget-table">
						
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Cotizaciones							
						</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						
						<table class="table table-striped table-bordered table-highlight" id="example">
							<thead>
								<tr>
									<th>Numero Cotizacion</th>
									<th>Cliente</th>
									<th>Documento</th>
									<th>Monto</th>
									<th>Fecha Creacion</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($cotizacion->result_array() as $row){ ?>
								<tr>
								<td><a href="<?php echo base_url(); ?>index.php/facturacion/printFactura/<?php echo $row['numero_orden']?>" target="__blank" title="Mostrar detalles"><?php echo $row['numero_orden']; ?></a></td>
								<td><?php echo $row['cliente']; ?></td>
								<td><?php echo $row['documento']; ?></td>
								<td><?php echo 'RD$ '. number_format($row['monto'],2); ?></td>
								<td><?php echo $row['fecha_creacion']; ?></td>
								<td>
								<a href="<?php echo base_url(); ?>index.php/facturacion/printFactura/<?php echo $row['numero_orden']?>" target="__blank" title="Mostrar detalles">Ver Cotizacion</a>
								<?php if($row['ncf'] == 'N/A'){ ?> 	
								 |
								<a href="<?php echo base_url(); ?>index.php/facturacion/convertirFactura/<?php echo $row['numero_orden']?>/NO_NCF" target="__blank" title="Facturar Cotizacion">Facturar Sin NCF</a> |
								<a href="<?php echo base_url(); ?>index.php/facturacion/convertirFactura/<?php echo $row['numero_orden']?>/SI_NCF" target="__blank" title="Facturar Cotizacion">Facturar Con NCF</a>
								<?php }else{ ?>
								| <a href="<?php echo base_url(); ?>index.php/facturacion/convertirFactura/<?php echo $row['numero_orden']?>/<?php echo $row['ncf']?>/FACTURAR" target="__blank" title="Facturar Cotizacion">Facturar Cotizacion</a>

								<?php }?>
								</td>
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
