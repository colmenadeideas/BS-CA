

            <div class="col-md-12" style="">
                <div class="title-header text-center col-md-12">
                    <h1>Notificationes</h1>
                </div>
                <img  src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle" />
            </div>
            <div class="col-md-12 text-center">
                <h2><?php echo $this->userdata[0]['name']; ?> <small> ( <i class="glyphicon glyphicon-user"></i> <?php echo $this->userdata[0]['rif']; ?> )</small></h2>
                <h5>Paciente</h5>
                <h4 class="">4 consultas realizadas</h4>
            </div>
            <div class="account-wall col-md-11 col-md-offset-1">
                <div class="col-md-5 check-list col-md-offset-1">
                    <h4>Al hacer nueva reserva</h4>
                    <a class="select-all">Select all</a> / 
                    <a class="unselect-all">Unselect all</a>

                    <div class="checkbox">
                        <label><input type="checkbox" value="movil">Movil</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="web">Web</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="mail">Mail</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="desktop" disable>Desktop</label>
                    </div>

                </div>
               <div class="col-md-5 check-list">
                    <h4>Al hacer cambios en reserva</h4>
                    <a class="select-all">Select all</a> / 
                    <a class="unselect-all">Unselect all</a>
                    <div class="checkbox">
                        <label><input type="checkbox" value="movil">Movil</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="web">Web</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="mail">Mail</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="desktop" disable>Desktop</label>
                    </div>
                </div>
                <div class="col-md-5 check-list col-md-offset-1">
                    <h4>Alerta de consultas</h4>
                    <a class="select-all">Select all</a> / 
                    <a class="unselect-all">Unselect all</a>
                    <div class="checkbox">
                        <label><input type="checkbox" value="movil">Movil</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="web">Web</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="mail">Mail</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="desktop" disable>Desktop</label>
                    </div>
                </div>
                <div class="col-md-5 check-list">
                    <h4>Recomendaciones</h4>
                    <a class="select-all">Select all</a> / 
                    <a class="unselect-all">Unselect all</a>
                    <div class="checkbox">
                        <label><input type="checkbox" value="movil">Movil</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="web">Web</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="mail">Mail</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="desktop" disable>Desktop</label>
                    </div>
                </div>
                <div class="col-md-5 check-list col-md-offset-1">
                    <h4>Alerta de recipe</h4>
                    <a class="select-all">Select all</a> / 
                    <a class="unselect-all">Unselect all</a>
                    <div class="checkbox">
                        <label><input type="checkbox" value="movil">Movil</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="web">Web</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="mail">Mail</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="desktop" disable>Desktop</label>
                    </div>
                </div>
                <div class="col-md-5 check-list">
                    <h4>Promociones y Actulizaciones</h4>
                    <a class="select-all">Select all</a> / 
                    <a class="unselect-all">Unselect all</a>
                    <div class="checkbox">
                        <label><input type="checkbox" value="movil">Movil</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="web">Web</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="mail">Mail</label>
                    </div>
                    <div class="checkbox disabled">
                        <label><input type="checkbox" value="desktop" disable>Desktop</label>
                    </div>
                </div>
                
                <button id="send" class="btn btn-lg btn-primary col-md-offset-1" style="margin-top: 50px;" type="submit">Guardar cambios</button>

                <div class="clear" style="height:20px"></div>
				<div id="msg"><div id="response"></div><div class="b-close"></div></div>	
            </div>
            <script>checkall()</script>