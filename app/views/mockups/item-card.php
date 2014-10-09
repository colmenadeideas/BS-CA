<script id="item-card-list" type="text/template">
	<div class="col-lg-4 col-md-4">
		<div class="item-card">		
			<div class="default-pic">
				<img src="<?php echo IMG; ?>default-male.png" class="img-responsive img-circle">
			</div>
			<div class="item-head">
				<h4>Ginecología & Obstetricia</h4>
				<h1>{{colors.0}}</h1>
			</div>
			<div class="info">
				&nbsp;
				<ul class="clinics-list">
					<li>Centro Policlínico La Viña</li>
					<li>Maternidad del Este</li>
					<li>Maternidad del Este</li>
					<li>Centro Policlínico La Viña</li>
					<li>Maternidad del Este</li>
					
				</ul>
			</div>
			<div class="col-lg-5 col-md-5">
				<input id="input-1" class="rating" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
			</div>
			<div class="col-lg-7 col-md-7 text-right">
					<button type="button" class="btn btn-default btn-moreinfo right">
						VER <i class="fa fa-plus	"></i>
					</button>
					<button type="button" class="btn btn-default btn-book right">
						PEDIR CITA
					</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

   
    <ul>
        {{persons|sort>lastName}}
            <li>{{lastName}}, {{firstName}}</li>
        {{/persons}}
    	<li>Favorite color: {{colors.0}}</li>
    </ul>
</script>