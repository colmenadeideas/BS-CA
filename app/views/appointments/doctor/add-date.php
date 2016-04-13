<form id="appointments" data-tempkey="<?php echo $this->tempkey; ?>" data-action="add" data-stepback="1" data-stepfoward="3" action="" novalidate="novalidate" method="post" class="light-form stepform1">
	<!--extra data-->
	<input type="hidden"  id="id_doctor" name="id_doctor" value="<?php echo $this->userdata['id']; ?>" required>
	<input type="hidden"  name="tempkey" value="<?php echo $this->tempkey; ?>" required>

	<input type="hidden"  name="practice" value="<?php echo $this->tempdata['practice']; ?>">
	<input type="hidden"  name="selectedDate" required>
	<div id="calendar" data-toggle="calendar" ></div>

</form>