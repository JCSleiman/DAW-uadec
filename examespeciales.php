<?php require_once "class_registro_dal.php";
$ml_crr = new registro_dal();
$ml = $ml_crr->get_datos_lista_materias();
$crr = $ml_crr->get_datos_lista_carreras();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form  action = "testt_db.php" method="POST" name="RegistroForm" class="register-form" id="register-form">
                        <h1>Examenes Especiales</h1>
                        <div class="form-group">
                            <label for="matricula">Matricula :</label>
                            <input type="text" maxlength="8" onkeypress="validar_mtr(event);" name="imatricula" id="imatricula" placeholder="Ingresa tu Matricula" />
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre :</label>
                            <input type="text" onkeypress=" return soloLetras(event);" name="inombre" id="inombre"  placeholder="Ingresa tu Nombre completo" maxlength="35"/>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo :</label>
                            <input type="text" name="icorreo" id="icorreo"  placeholder="Ingresa tu Correo Electronico"/>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono :</label>
                            <input type="text" name="itelefono" id="itelefono" pattern="[0-9]{10}" maxlength="10" onkeypress="validar_mtr(event);"  placeholder="Ingresa tu Telefono"/>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="grado">Grado :</label>
                                <div class="form-select">
                                    <select name="sgrado" id="igrado">
                                        <option value="0" disabled selected>Ingresa tu Grado</option>
                                        <option value="1">1er Semestre</option>
                                        <option value="2">2do Semestre</option>
                                        <option value="3">3er Semestre</option>
                                        <option value="4">4to Semestre</option>
                                        <option value="5">5to Semestre</option>
                                        <option value="6">6to Semestre</option>
                                        <option value="7">7mo Semestre</option>
                                        <option value="8">8vo Semestre</option>
                                        <option value="9">9no Semestre</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="carrera">Carrera :</label>
                                <div class="form-select">
                                    <select name="scarrera" id="icarrera">
                                        <option value="0" disabled selected>Ingresa tu Carrera: </option>
                                        <?php 
                                            foreach ($crr as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value[0] ?>"><?php echo $value[1]  ?></option>
                                                <?php  }  ?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="materias">Materias :</label>
                                <div class="form-select">
                                    <select name="smaterias" id="imaterias">
                                        <option value="0" disabled selected>Ingresa la Materia: </option>
                                        <?php 
                                            foreach ($ml as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value[0] ?>"><?php echo $value[1]  ?></option>
                                                <?php  }  ?>   
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="estatus">Estatus :</label>
                                <div class="form-select">
                                    <select name="sestatus" id="iestatus">
                                        <option value="0" disabled selected>Ingresa tu Estatus: </option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea">Observaciones :</label>
                            <textarea rows="5" cols="72" class="textarea" name="message" placeholder="Sus comentarios aqui..."></textarea>
                        </div>
                        <div class="form-submit">
                            <div class="g-recaptcha" data-sitekey="6Le6F5EUAAAAAOV_EpHQx1OqNT6LND0iWd533EdL"></div>
                            <br>
                        </div>
                        <input type="reset" value="Limpiar" class="submit" name="reset" id="reset" />
                        <input type="submit" value="Registrar" onclick="valida_alumno()" class="submit" name="submit" id="submit" />
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>