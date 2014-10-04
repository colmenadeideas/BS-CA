<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form role="form" id="login_form">
   		  <? echo EMAIL;?> <input type="mail" id="email" name="email" required>
    	 <? echo PASSWORD;?> <input type="password" id="password" name="password" required>
    	 <div class="row">
			<div class="col-md-offset-6 col-xm-offset-6 col-xs-offset-6 col-xs-6 col-sm-6 col-md-6">
				<input type="submit" class="btn btn-lg btn-success btn-block send" value="Entrar">
			</div>
		</div>
	</form>
      <div class="modal-footer">
      	      	
        <!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>