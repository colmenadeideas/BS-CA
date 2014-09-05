	<?php if (empty($this->old_password)) { ?>
	<div class="navbar navbar-inverse" role="navigation">
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	<li><a href="<?php echo URL; ?>account/identify"><i class="glyphicon glyphicon-chevron-left"></i> Volver atrás</a></li>
              
           </ul>
          
          <?php $this->render('settings/default/settings-menu'); ?>
            
          
        </div><!--/.nav-collapse -->
      </div>
	<?php } ?>
	