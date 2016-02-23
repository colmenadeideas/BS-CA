	{{#if practice.length}}
		<div class="practices-slider" data-slick='{"slidesToShow": 3 }'>
		
		{{#practice}}
			<div class="column-steps loop-item clickable practice"  id="practice-{{id}}" data-value="{{id}}">
				<img src="<?php echo IMG; ?>icon-okidoc-hospital.png" class="img-responsive" alt="{{name}}">
				<h4>{{name}}</h4>

				<div class="hours-day">
					{{#schedule}}
					<div class="schedule-hours">
			         <span class="weekday">{{day}}</span> {{scheduleFormat ini_schedule end_schedule}}
			     	</div>
			        {{/schedule}}
				</div>
			</div>
		{{/practice}}
		<input type="hidden"  name="practice" required>
	</div>
	{{else}}
		<?php //$this -> render('app/board/empty'); ?>
	{{/if}}