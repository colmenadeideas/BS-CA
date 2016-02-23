<script id="List-Reasons-Template" type="text/template">
	<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
		<h2 class="text-center text">¿Cuál es el motivo de su consulta?</h2>
		<div class="all-reasons list">		
			

				{{#if practice.length}}
				<div class="reasons-slider" data-slick='{"slidesToShow": 3 }'>
				
				{{#practice}}
					{{#consultation_reasons}}
					<div class="column-steps loop-item clickable reason"  id="reason-{{id}}" data-value="{{id}}" data-initial_interval="{{initial_interval}}" data-reason="{{consultation_reason}}">
						<h4>{{consultation_reason}}</h4>						
					</div>
					{{/consultation_reasons}}
				{{/practice}}
				<input type="hidden"  name="initial_interval" required>
				<input type="hidden"  name="consultation_reason" required>
			</div>
			{{else}}
				<?php //$this -> render('app/board/empty'); ?>
			{{/if}}


		</div>
	</div>
</script>