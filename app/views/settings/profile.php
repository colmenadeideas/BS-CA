

            <div class="col-md-12" style="">
                <div class="title-header text-center col-md-12">
                    <h1> Mi Perfil</h1>
                </div>
                <img  src="<?php echo IMG;?>default-male.png" class="img-responsive img-circle" />
            </div>
            <div class="col-md-12 text-center">
                <h2><?php echo $this->userdata[0]['name']; ?> <small> ( <i class="glyphicon glyphicon-user"></i> <?php echo $this->userdata[0]['rif']; ?> )</small></h2>
                <h5>Paciente</h5>
                <h4 class="">4 consultas realizadas</h4>
            </div>
            <div class="account-wall col-md-11 col-md-offset-1">
                <div id="basic-settings">
                    <div class="col-md-6">
                        <div class="col-md-12 ">
                            <div class="col-md-12 inline-edit">
                                <label for="">Email</label>
                                <i class="glyphicon glyphicon-envelope"></i> <h4 class="" id="email"><?php echo $this->userdata[0]['email']; ?></h4><i></i>
                            </div>
                            <div class="col-md-12 inline-edit">
                                <label for="">Telefono</label>
                                <i class="glyphicon glyphicon-phone"></i><h4 class="" id="phone">  <?php echo $this->userdata[0]['phone']; ?>+58 412-6475090 &nbsp;&nbsp;&nbsp;</h4><i ></i>
                            </div>
                            <div class="col-md-12 inline-edit">
                                <label for="">Direccion</label>
                                <i class="glyphicon glyphicon-map-marker"></i><h4 class="" id="location">Urb. La Viña, Calle 34... &nbsp;&nbsp;&nbsp;</h4><i></i>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="col-md-12 inline-edit">
                                <label for="">Sexo</label>
                               <i class="glyphicon glyphicon-tree-deciduous"></i><h4 class="" id="sex"> Femenino &nbsp;</h4><i class=""></i>
                            </div>
                            <div class="col-md-12 inline-edit">
                                <label for="">Seguro</label>
                                <i class="glyphicon glyphicon-lock"></i><h4 class="" id="ensurance"> Seguros Cualitas &nbsp;&nbsp;&nbsp;</h4><i class=""></i>
                                
                            </div>
                            <div class="col-md-12 inline-edit">
                                <label for="">Idioma</label>
                                <i class="glyphicon glyphicon-globe"></i><h4 class="" id="language">  Spanglish &nbsp;&nbsp;&nbsp;</h4><i class=""></i>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
                
                
            <div class="clear" style="height:20px"></div>
            <div id="msg"><div id="response"></div><div class="b-close"></div></div>    
            </div>
            <div class="col-md-12 text-center">
                <p>Para editar algun dato, haga click sobre este, y edite</p>
            </div>
            
<script>editable();</script>

