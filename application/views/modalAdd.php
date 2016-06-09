<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva Actividad</h4>
      </div>
      <div class="modal-body">
        <form id="formNva">
        <div class="row">
        	<div class="form-group">
        		<div class="col-md-6">
        			<label>Nombre del Evento</label>
        			<input name="nombre" class="form-control" />
        		</div>
        		<div class="col-md-6">
        			<label>Description</label>
        			<textarea name="descripcion" class="form-control" ></textarea>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="col-md-6">
        			<label>Prioridad</label>
        			<select name="prioridad" class="form-control">
        				<option>ALTA</option>
        				<option>MEDIA</option>
        				<option>BAJA</option>
        			</select>
        		</div>
        	</div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="btnAdd" data-dismiss="modal">Agregar</button>
      </div>
    </div>
  </div>
  
<script>
	$("#btnAdd").click(function(){
		$.ajax({
					type : "POST",
					url : "<?php echo base_url("index.php/MainPage/addRecord") ?>",
					data : $("#formNva").serialize(),
					success : function(data) {
						alert(data);
					}
				});
	});
</script>