<?php 
echo drupal_get_js();
echo drupal_get_css();
?>
<section class="container form_creditcard">
	<form id="creditcard-form" class="creditcard-form form-card" action="/payment/route/processcard" method="post">
		<h3>Tarjeta de crédito</h3>
		<div class="input-field form-item">
			<label class="not_label">Nombres y apellidos</label>
			<input type="text" id="names" name="payer_names" autocomplete="off" placeholder="Nombres y apellidos" value="<?php echo $method_data['nombreComprador']?> <?php echo $method_data['apellidoComprador']?>"  class="form-control"/>
		</div>
		<div class="input-field form-item">
			<label class="not_label">Número de documento</label>
			<input type="text" id="docnum" name="payer_docnum" autocomplete="off" placeholder="Número de documento" value="<?php echo $method_data['documentoIdentificacion']?>"  class="form-control"/>
		</div>
		<div class="input-field form-item">
			<label class="not_label">Número de tarjeta</label>
			<input type="text" id="card" name="payer_card" autocomplete="off" placeholder="Número de tarjeta" value="" class="form-control"/>
			<input type="hidden" id="cardtype" name="payer_cardtype" autocomplete="off" class="form-control "/>
		</div>

		<div class="input-field form-item">
			<label class="not_label">CCV</label>
			<input type="text" id="ccv" name="payer_ccv" autocomplete="off" placeholder="CCV" class="ccv-4 form-control" value=""/>
		</div>
		<div class="input-field form-item">
			<label class="not_label">Fecha de expiración</label>
			<div class="select_item-x2 select-ico">
				<select autocomplete="off" id="cardmonth" name="payer_cardmonth" placeholder="Mes" class="form-control">
					<option value="0" selected="selected">Mes</option>
					<?php for($i = 1; $i <= 12; $i++){?>
					<?php $month = str_pad($i, 2, '0', STR_PAD_LEFT);?>
					<option value="<?php echo $month?>"><?php echo $month;?></option>
					<?php }?>
				</select>
				<select autocomplete="off" id="cardyear" name="payer_cardyear" placeholder="Año" class="form-control">
					<option value="0" selected="selected" >Año</option>
					<?php for($i = 0; $i < 15; $i++){?>
					<?php $year = $i+date("Y");?>
					<option value="<?php echo $year?>"><?php echo $year;?></option>
					<?php }?>
				</select>
			</div> <!-- select-item-x2 -->
		</div>
		<?php if($need_installments): ?>
		<div class="input-field form-item select-ico">
			<label class="not_label">Cuotas</label>
			<select autocomplete="off" id="installments" name="payer_installments" placeholder="Cuotas" class="form-control">
				<option value="0" selected="selected" >Cuotas</option>
				<?php for($i = 1; $i <= 24; $i++){?>
				<option value="<?php echo $i?>"><?php echo $i;?></option>
				<?php }?>
			</select>
		</div>
		<?php endif;?>		
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