<form id="form-search-doctor" role="form" class="form-inline"  method="post" action="">
	<input name="search_term" class="form-control input-lg input-home-doctor" placeholder="<?php echo SITE__SEARCH_PLACEHOLDER_NAME;?>" required="required" ><!-- &nbsp;&nbsp; -->
	<input name="city" class="form-control input-lg input-home-location" placeholder="<?php echo SITE__SEARCH_PLACEHOLDER_LOCATION;?>" required="required" /><!-- &nbsp;&nbsp; -->

	<input name="city_value" type="hidden">
	<input name="type" type="hidden">
	
	<button class="btn btn-lg btn-green send"><i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;<?php echo SITE__SEARCH_BUTTON; ?></button>
</form>