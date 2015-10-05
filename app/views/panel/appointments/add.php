<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
	<h2 class="text-center forms">Agregar Cita</h2>
	
	<form id="appointment-add" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="0" data-stepfoward="2" action="" novalidate="novalidate" method="post" class="light-form stepform1">
		<!--extra data-->
		<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
		<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>

		<div class="col-sm-12 col-lg-12">
			<input name="name" type="text" id="appointment-add-name" class="form-control input-lg input-home-doctor" placeholder="Buscar paciente..." required="required">
		</div>
		<div class="field-wrapper form-inline col-sm-5 col-lg-5">
			
			<div class="col-sm-12 col-lg-12">
				<input name="clinic" type="text" class="form-control input-lg input-home-doctor" placeholder="Clinica" required="required">
			</div>	
			<div class="col-sm-12 col-lg-12">
				<input name="reason" type="text" class="form-control input-lg input-home-doctor" placeholder="Motivo de la consulta" required="required">
			</div>
	
		</div>
		<div class="col-sm-1" style="height:200px;"></div>
		<div class="col-sm-5 col-lg-5">
			<input name="date" type="text" class="form-control input-lg input-home-doctor calendar" placeholder="Seleccione una fecha" required="required">
		</div>
		<div class="col-sm-5 col-lg-5">
			<input name="date" type="text" class="form-control input-lg input-home-doctor hour-picker" placeholder="Seleccione una hora" required="required">
		</div>

		<textarea class="col-md-12" name="notes" id="" cols="30" rows="10" placeholder="Notas"></textarea>
		<div class="text-right col-sm-9 col-lg-9 button-area">
			<input type="submit" name="submit" class="next btn btn-info btn-lg" value="Guardar y nuevo" > 
		</div>
		<div class="text-right col-sm-3 col-lg-3 button-area">
			<input type="submit" name="submit" class="next btn btn-info btn-lg" value="Guardar" > 
		</div>
	</form>



</div>

<style>


/* Date Trigger (Icon) */
#datecontainer .ui-datepicker-trigger {
	float: left;
	display: table;
	cursor: pointer;
	margin: 3px 5px;
}
/* Calendar Container */
#ui-datepicker-div {
	width: auto;
	height: auto;
	margin: 5px auto 0;
	font: 9pt Arial, sans-serif;
	-webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
	-moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
	box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
	background: #1e5799; /* Old browsers */
	background: -moz-linear-gradient(top,  #1e5799 0%, #2989d8 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1e5799), color-stop(100%,#2989d8)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #1e5799 0%,#2989d8 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #1e5799 0%,#2989d8 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #1e5799 0%,#2989d8 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #1e5799 0%,#2989d8 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#2989d8',GradientType=0 ); /* IE6-9 */
}
#ui-datepicker-div a {
	text-decoration: none;
}
/* Date Picker Header */
.ui-datepicker-header {
	color: #fff;
	font-weight: lighter;
	line-height: 30px;
	border-width: 1px 0 0 0;
	border-style: solid;
	border-color: #111;
}
.ui-datepicker-title {
	text-align: center;	
}

.ui-datepicker-prev {
	float: left;
	background-position: center -30px;
}
.ui-datepicker-next {
	float: right;
}
.ui-datepicker-prev, .ui-datepicker-next {
	display: inline-block;
	width: 30px;
	height: 30px;
	text-align: center;
	cursor: pointer;
	background-image: url('../img/arrow.png');
	background-repeat: no-repeat;
	line-height: 550%;
	overflow: hidden;
}
.ui-datepicker-month {
    position: relative;
    padding-right: 15px;
    color: #fff;
   }
/* Date Picker Table */
.ui-datepicker table {
	width: 100%;
}
.ui-datepicker thead {
	background-color: #f7f7f7;
	background-image: -moz-linear-gradient(top,  #f7f7f7 0%, #f1f1f1 100%);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#f1f1f1));
	background-image: -webkit-linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	background-image: -o-linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	background-image: -ms-linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	background-image: linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#f1f1f1',GradientType=0 );
	border-bottom: 1px solid #bbb;
}
.ui-datepicker th {
	text-transform: uppercase;
	font-size: 6pt;
	padding: 5px 0;
	color: #666666;
	text-shadow: 1px 0px 0px #fff;
	filter: dropshadow(color=#fff, offx=1, offy=0);
}
.ui-datepicker tbody td {
	padding: 0;
	border-right: 1px solid #bbb;
}
.ui-datepicker tbody td:last-child {
	border-right: 0px;
}
.ui-datepicker tbody tr {
	border-bottom: 1px solid #bbb;
}
.ui-datepicker tbody tr:last-child {
	border-bottom: 0px; 
}
.ui-datepicker td span, .ui-datepicker td a {
	display: inline-block;
	font-weight: bold;
	text-align: center;
	width: 30px;
	height: 30px;
	line-height: 30px;
	color: #666666;
}
/* Date Picker Hover & Active */
.ui-datepicker-calendar .ui-state-default {
	background: #ededed;
	background: -moz-linear-gradient(top,  #ededed 0%, #dedede 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ededed), color-stop(100%,#dedede));
	background: -webkit-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: -o-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: -ms-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: linear-gradient(top,  #ededed 0%,#dedede 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#dedede',GradientType=0 );
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
	-moz-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
	box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
}
.ui-datepicker-calendar .ui-state-hover {
	background: #f7f7f7;
}
.ui-datepicker-calendar .ui-state-active {
	background: #6eafbf;
	-webkit-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	-moz-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	color: #e0e0e0;
	text-shadow: 0px 1px 0px #4d7a85;
	filter: dropshadow(color=#4d7a85, offx=0, offy=1);
	border: 1px solid #55838f;
	position: relative;
	margin: -1px;
}
.ui-datepicker-calendar td:first-child .ui-state-active {
	width: 29px;
	margin-left: 0;
}
.ui-datepicker-calendar td:last-child .ui-state-active {
	width: 29px;
	margin-right: 0;
}
.ui-datepicker-calendar tr:last-child .ui-state-active {
	height: 29px;
	margin-bottom: 0;
}
.ui-datepicker-unselectable .ui-state-default {
	background: #f4f4f4;
	color: #b4b3b3;
}
</style>