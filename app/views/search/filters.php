<script id="Search-Filters-Template" type="text/template">
	<div class="search-filters-area">
		<div class="container">
			<span class="filterby"> <i class="fa fa-search"></i> &nbsp; FILTRAR POR &nbsp;</span>
			
			{{#filters}}
			<button type="button" id="filter-term-{{@index}}" class="btn btn-default btn-filter" data-term="{{term}}" >{{term}} <i class="fa fa-close"></i>
			</button>
			{{/filters}}
		</div>
	</div>
</script>