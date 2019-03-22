<?php
include("class_registro_dal.php");
//se guardan los datos del formulario en variables con el emtodo $_POST

$matricula=$_POST["imatricula"];
$nombre=$_POST["inombre"];
$correo=$_POST["icorreo"];
$telefono=$_POST["itelefono"];
$grado=$_POST["sgrado"];
$carrera=$_POST["scarrera"];
$materias=$_POST["smaterias"];
$estatus=$_POST["sestatus"];

echo "Los datos $matricula , $nombre , $correo , $telefono , $grado , $carrera , $materias , $estatus se registraron!"."\n";


//Se crea un objeto con el constructor de class_registro mandando los datos del formulario como parametros
$obj=new registro($matricula,$nombre,$correo,$telefono,$grado,$carrera,$materias,$estatus);
//Se manda ese objeto creado($obj) mandando llamar a la funcion insertar
$obj2=new registro_dal();
$resultado2=$obj2-> insertar($obj);
print($resultado2);


/*
//trae un campo por matricula
$obj3=new registro_dal();
$resultado3=$obj3->  get_datos_by_matricula(13214207);
print_r($resultado3);
*/

/*
//trae la tabla alumnos
$obj4=new registro_dal();
$resultado4=$obj4-> get_datos_lista_alumnos();
print_r($resultado4);
*/
?>
