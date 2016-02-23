<script id="Available-Days-Template" type="text/template">

	<div class="" style="padding:0 40px ">
		<h2 class="text-center text">Selecciona el día y hora</h2>
		{{#if dates.length}}
			<div class="date-slider" data-slick='{"slidesToShow": 7 , "slidesToScroll": 7 }'>
			
			{{#dates}}
				<div class="column-steps loop-item loop-item-days {{#if day_in.length}}loop-item-in{{/if}}"  id="practice-{{id}}" data-value="{{id}}">
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
						{{#if slots.length}}
							hay
						{{else}}
							no hay
						{{/if}}
					{{/if}}
					<div class="hours-day">						
					</div>
				</div>
			{{/dates}}
			<input type="text"  name="time" required>
			<input type="hidden"  name="date" required>
		</div>
	</div>
	{{else}}
		<?php //$this -> render('app/board/empty'); ?>
	{{/if}}

</script>
