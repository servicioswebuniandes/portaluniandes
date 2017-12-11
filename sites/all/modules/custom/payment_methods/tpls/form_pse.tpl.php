<?php 
echo drupal_get_js();
echo drupal_get_css();
?>
<section class="container form_creditcard">
	<form id="creditcard-form" class="creditcard-form form-pse" action="/payment/route/processpse" method="post">
		<h3>PSE</h3>
		<div class="input-field form-item">
			<label class="not_label">Nombre del titular</label>
			<input type="text" id="names" name="payer_names" autocomplete="off" placeholder="Nombre del titular" value="<?php echo $method_data['nombreComprador']?> <?php echo $method_data['apellidoComprador']?>"  class="form-control"/>
		</div>
		<div class="input-field form-item select-ico">
			<label class="not_label">Tipo de persona</label>
			<select autocomplete="off" id="client_type" name="payer_client_type" placeholder="Tipo de persona" class="form-control">
				<option selected="selected" value="0">Tipo de persona</option>
				<option value="N"><?php echo 'Persona natural';?></option>
				<option value="J"><?php echo 'Persona jurídica';?></option>
			</select>
		</div>
		<div class="input-field form-item select-ico">
			<label class="not_label">Tipo de documento</label>
			<select autocomplete="off" id="doc_type" name="payer_doc_type" placeholder="Tipo de documento" class="form-control">
				<option selected="selected" value="0">Tipo de documento</option>
				<?php foreach($method_data['extra_info']['doctypes'] as $docId => $docData):?>
					<option value="<?php echo $docId;?>" <?php echo ($docData['eqv'] == $method_data['tipoDocumentoIdentificacion']) ? 'selected="selected"' : '';?>><?php echo $docData['label'];?></option>
				<?php endforeach;?>
			</select>
		</div>
		<div class="input-field form-item">
			<label class="not_label">Número de documento</label>
			<input type="text" id="docnum" name="payer_docnum" autocomplete="off" placeholder="Número de documento" value="<?php echo $method_data['documentoIdentificacion']?>"  class="form-control"/>
		</div>
		<div class="input-field form-item">
			<label class="not_label">Teléfono</label>
			<input type="text" id="phone" name="payer_phone" autocomplete="off" placeholder="Teléfono" value="<?php echo $method_data['telefono']?>"  class="form-control"/>
		</div>
		<div class="input-field form-item select-ico">
			<label class="not_label">Banco</label>
			<select autocomplete="off" id="bank" name="payer_bank" placeholder="Banco" class="form-control">
				<?php foreach($method_data['extra_info']['banks'] as $bankId => $bankLabel):?>
					<option value="<?php echo $bankId;?>"><?php echo $bankLabel;?></option>
				<?php endforeach;?>
			</select>
		</div>
		<input type="hidden" name="token" value="<?php echo $method_data['key']?>" />
		<div class="btn-content">
			<input type="submit" value="Realizar pago" class="btn btn-default btn-credit-card" />
		</div>
	</form>
	<?php $imgUrl = $base_url .'/'. drupal_get_path('module', 'payment_methods') . '/assets/img/load.svg'; ?>
	<img id="load-img" src="<?php echo $imgUrl; ?>" alt="Cargando..." 
		style="
		display:none;
		position: absolute;
		left: 0;
		right: 0;
		text-align: center;
		padding: 40px 0;
		margin: 0 auto;"
	/>
</section>
<script type="text/javascript">
window.addEventListener('load',function(event){
	function resize(){
		var height = document.getElementsByTagName("html")[0].scrollHeight;
		window.parent.postMessage(["setHeight", height], "*");
	}
	resize();
},false);
</script>