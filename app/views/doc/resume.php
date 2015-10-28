<div class="container-fluid resume" style="background-color: #f6f6f6;display:none;">	
	<div class="" id="resume-close">X</div>
	<div class="row resume-baner text-center">
		<h4>¿Esta seguro que desea reservar esta cita?</h4>
	</div>

	<fieldset class="col-md-12 resume-fieldset">
		<div class="col-md-3 col-md-offset-2">
			<div class="col-md-12 text-center">
				<div class="col-md-12" id="amount">Total: BsF. 3000</div>
			</div>
			
			<form clas="col-md-10">
				<div class="form-group">
					<div style="height:1px;"></div>
					<label for="email">Nombre</label>
					<input type="text" class="form-control" id="resume-name" placeholder="Nombre" name="name">
				</div>
				<div class="form-group">
					<label for="payment-method">Metodo de pago</label>
					<select class="form-control" id="payment-method">
						<option>Tarjeta de credito</option>
						<option>Tarjeta de debito</option>
						<option>Transferencia bancaria</option>
						<option>Telefono</option>
						<option>Acuerdo con el Doctor</option>
					</select>
				</div>
				<div class="form-group">
					<label for="card-type">Tipo de tarjeta</label>
					<select class="form-control" id="card-type" name="card-type">
						<option>Visa</option>
						<option>Master Card</option>
						<option>Bank of America</option>
						<option>Otro</option>
					</select>	
				</div>
				
				<div class="form-group">
					<label for="email">Numero de tarjeta</label>
					<input type="text" class="form-control" id="card-number" placeholder="Nombre" name="card-number">
				</div>
				<div class="form-group">
					<label class="" style="width:100%;" for="valid throught">Valida hasta:</label>
					<div class="col-md-5 form-group" style="padding-left:0;padding-right:30px;">
						<select class="form-control col-md-5" id="card-mounth" name="card-mounth">
							<option value="">01</option>
							<option value="">02</option>
							<option value="">03</option>
							<option value="">04</option>
							<option value="">05</option>
							<option value="">06</option>
							<option value="">07</option>
							<option value="">08</option>
							<option value="">09</option>
							<option value="">10</option>
							<option value="">11</option>
							<option value="">12</option>
						</select>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-5 form-group">
						<select class="form-control col-md-5" id="card-year" name="card-year">
							<option>2015</option>
							<option>2016</option>
							<option>2017</option>
							<option>2018</option>
						</select>
					</div>
					<div class="form-group">
						<label for="email">Codigo de seguridad</label>
						<input type="text" class="form-control" id="resume-name" placeholder="Codigo de seguridad" name="secure-code">
					</div>
				</div>
				
			</form>
		</div>
		<div class="col-md-4 col-md-offset-1" id="resume-details" style="background:#ececec;padding:20px">
			<div class="col-md-12" style="padding:0">
				<div class="col-md-4 image-circle" style="margin:32px 0;">
					<img src="<?php echo IMG; ?>default-male.png" alt="">
				</div>
				<div class="col-md-8" id="resume-doc-name" style="background-color:#f3f3f3;padding:19px;color:#555;padding-bottom:0;" >
					<h3>Dr. Maria Hernandez Perez</h3>
				</div>
				<div class="col-md-8" id="resume-clinic" style="background-color:#f3f3f3;padding-left:19px;color:#3ED87A;padding-bottom:0;">
					<h4>Centro Policlinico la Viña</h4>
				</div>
				<div class="col-md-8" id="resume-date" style="background-color:#f3f3f3;padding:15px;padding-top:0;text-transform:uppercase;">
					<h2 class="text-circle" style="">20</h2>
					<h2 style="margin-left: 11px;">ENE</h2>
					<h2 style="margin-top:30px;margin-left:5%">9:15 AM</h2>
				</div>
			</div>
			<div class="col-md-12 amount-item">
				<div class="col-md-3 amount-icon">
					<i class="glyphicon glyphicon-flag"></i>
				</div>
				<div class="col-md-6 amount-title">
					<h3>Costos Honorarios</h3>
				</div>
				<div class="col-md-3 amount-cost">BsF. 500</div>
				<div class="col-md-6 amount-description">
					<p>Los costos honorarios es la base que se otorga como prueba pública de respeto, admiración y estima.</p>
				</div>
			</div>
			<div class="col-md-12 amount-item">
				<div class="col-md-3 amount-icon">
					<i class="glyphicon glyphicon-transfer"></i>
				</div>
				<div class="col-md-6 amount-title">
					<h3>Comision de servicio web</h3>
				</div>
				<div class="col-md-3 amount-cost">BsF. 500</div>
				<div class="col-md-6 amount-description">
					<p>Al pagar atravez de Okidoc se generan cargos adicionales, debido a los sistemas de pago de tu region.</p>
				</div>
			</div>
			<div class="col-md-12 amount-resume">
				<div class="col-md-12">
					<div class="col-md-5" id="amount-sub-total-title">
						<h3>Sub-total:</h3>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-5" id="amount-sub-total-cost">
						<h3 class="">BsF. 3800</h3>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-5" id="amount-sub-total-title">
						<h5>I.V.A:</h5>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-5" id="amount-sub-total-cost">
						<h5 class="">BsF. 1252</h5>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-5" id="amount-sub-total-title">
						<h2>TOTAL:</h2>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-5" id="amount-sub-total-cost">
						<h2 class="">BsF. 4252</h2>
					</div>
				</div>
				
				
			</div>
			
		</div>
		<div class="col-md-4 col-md-offset-6" id="resume-buttons">
			<div class="col-md-6">
				<button class="btn btn-white" id="resume-edit">Editar</button>
			</div>
			<div class="col-md-6">
				<button class="btn btn-green right" style="background-color:#3ED87A;color:white; padding: 20px;border-radius: 30px;width: 80%;text-align: center;">Confirmar</button>
			</div>
		</div>
	</fieldset>
</div>