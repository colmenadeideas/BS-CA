<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <button class="btn-lg btn-default" id="register_doctor_button">Soy Medico</button>
		<button class="btn-lg btn-default" id="register_patient_button">Soy Paciente</button>
		<div id="patient"><?php $this->render('site/form/register_patient'); ?></div>
		<div id="doctor"><?php $this->render('site/form/register_doctor'); ?></div>
      </div>
      
    </div>
  </div>
</div>