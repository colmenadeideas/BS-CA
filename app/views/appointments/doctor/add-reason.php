		<div class="field-wrapper form-inline col-sm-5 col-lg-5">
							
			<div class="col-sm-12 col-lg-12">
				<input name="reason" type="text" class="form-control input-lg input-home-doctor" placeholder="Motivo de la consulta" required="required">
			</div>
	
		</div>		

		<textarea class="col-md-12" name="notes" id="" cols="30" rows="10" placeholder="Notas"></textarea>
		
<script id="Available-Days-Template" type="text/template">

	<div class="" style="padding:0 40px ">
		<h2 class="text-center text">Selecciona el día y hora</h2>
		{{#if dates.length}}
			<div class="date-slider" data-slick='{"slidesToShow": 7 , "slidesToScroll": 7 }'>
			
			{{#dates}}
				<div class="column-steps loop-item loop-item-days"  id="practice-{{id}}" data-value="{{id}}">
					<h5>{{weekday}}</h5>
					<h1>{{getDay day}}</h1>
					<h5>{{getMMYY day}}</h5>

					{{#if block.length}}
						<h6>Disponibles</h6>
						{{#block}}
							{{#slots}}
								<a href="#" class="btn btn-default btn-hour timeslot" data-time="{{time}}" data-date="{{day}}">{{time}}</a><br>
							{{/slots}}
						{{/block}}
					{{/if}}
					<div class="hours-day">						
					</div>
				</div>
			{{/dates}}
			<input type="hidden"  name="time" required>
			<input type="hidden"  name="date" required>
		</div>
	</div>
	{{else}}
		<?php //$this -> render('app/board/empty'); ?>
	{{/if}}

</script>

