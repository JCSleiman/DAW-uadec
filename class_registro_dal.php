<?php
include("class_registro.php");
include("class_Db.php");
class registro_dal extends class_Db{

	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}
	//Muestra la tabla alumnos
  function get_datos_lista_alumnos(){

  $elsql = "select Matricula,Nombre,Correo,Telefono,Grado,Id_carrera,Id_materia,Estatus from Especiales order by Matricula";

  //print $elsql;exit;

  $this->set_sql($elsql);
  $lista=NULL;
  $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
  $total_de_registro=mysqli_num_rows($rs);
  $i=0;
  while($renglon=mysqli_fetch_assoc($rs)) {
    $obj_det = new registro(
    $renglon["Matricula"],
    utf8_encode($renglon["Nombre"]),
    utf8_encode($renglon["Correo"]),
    utf8_encode($renglon["Telefono"]),
    utf8_encode($renglon["Grado"]),
    $renglon["Id_carrera"],
    $renglon["Id_materia"],
    $renglon["Estatus"]
    );

    $i++;
    $lista[$i]=$obj_det;
    unset($obj_det);
  }
  mysqli_free_result($rs);
  return $lista;
}

	    //Insertar
  	function insertar($obj){


		$sql = "insert into especiales (";
  		$sql .= "Matricula,";
        $sql .= "Nombre,";
        $sql .= "Correo,";
        $sql .= "Telefono,";
        $sql .= "Grado,";
        $sql .= "Id_carrera,";
        $sql .= "Id_materia,";
        $sql .= "Estatus";
     	$sql .= ") ";
		$sql .= "values(";
    	$sql .= "'".$obj->getMatricula()."',";
        $sql .= "'".$obj->getNombre()."',";
        $sql .= "'".$obj->getCorreo()."',";
        $sql .= "'".$obj->getTelefono()."',";
        $sql .= "'".$obj->getGrado()."', ";
        $sql .= "'".$obj->getId_carrera()."', ";
        $sql .= "'".$obj->getId_materia()."', ";
        $sql .= "'".$obj->getEstatus()."' ";
        $sql .= ")";

				//echo $sql;exit;
				$this->set_sql($sql);
				$this->db_conn->set_charset("utf8");

				mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

				if(mysqli_affected_rows($this->db_conn)==1) {
					print "actualizado"."\n";
						$actualizado=1;

				}else{
						$actualizado=0;
				}
				unset($obj);
				return $actualizado;
		}

		//Existe matricula
		function existeMatricula($Matricula){
		 $Matricula=$this->db_conn->real_escape_string($Matricula);

			 $sql = "select count(*) from Alumnos";
			 $sql .= " where Matricula='$Matricula'";

			 //print $sql;
			 $this->set_sql($sql);
			 $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
			 //$total_de_registro = mysqli_num_rows($rs);
			 $renglon= mysqli_fetch_array($rs);
			 $cuantos= $renglon[0];

			 return $cuantos;
		 }

		 //Actualizar
		  function actualizar($obj){
				/*
		      $sql = "update especiales set";
		      $sql .= "Nombre="."'".$obj->getNombre()."',";
		      $sql .= "Correo="."'".$obj->getCorreo()."',";
		      $sql .= "Telefono="."'".$obj->getTelefono()."',";
		      $sql .= "Grado="."'".$obj->getGrado()."',";
		      $sql .= "Id_carrera="."'".$obj->getId_carrera()."',";
		      $sql .= "Id_materia="."'".$obj->getId_materia()."',";
		      $sql .= "Estatus="."'".$obj->getEstatus()."',";
		      $sql .= "where Matricula ="."'".$obj->getMatricula()."'";
					*/
					$sql = "UPDATE especiales " .
     "SET Nombre = '" . $obj->getNombre() . "'," .
     "Correo = '" . $obj->getCorreo() . "'," .
     "Telefono = '" . $obj->getTelefono() . "'," .
     "Grado = '" . $obj->getGrado() . "'," .
		 "Id_carrera = '" . $obj->getId_carrera() . "'," .
		 "Id_materia = '" . $obj->getId_materia() . "'," .
     "Estatus = '" . $obj->getEstatus() . "'," .
    "where matricula = '" . $obj->getMatricula() . "'";
		      //print $sql;exit;
		      $this->set_sql($sql);
		      $this->db_conn->set_charset("utf8");
		      mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
		      if(mysqli_affected_rows($this->db_conn)==1) {
		        $actualizado=1;
		        print "actualizado"."\n";
		     }
		      else{
		        $actualizado=0;
		     }
		     unset($obj);
		      return $actualizado;
		      }

/*
        //borrar
    function borrar($obj){

        $sql = "delete from Alumnos where Matricula='".$obj->getMatricula()."'";

        //print $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");

        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $insertado=1;
        }else{
            $insertado=0;
        }
        unset($obj);
        return $insertado;
    }

*/

//Muestra un campo d ela tabla alumnos segun la matricula dada
    function get_datos_by_matricula($Matricula){
      $Matricula=$this->db_conn->real_escape_string($Matricula);

        $this->set_sql("select Matricula,Nombre,Correo,Telefono,Grado,Id_carrera,Id_materia,Estatus from Especiales where Matricula='$Matricula'");

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $obj_det=null;
        $renglon = mysqli_fetch_assoc($rs);
        if($total_de_registro>0){
            $obj_det = new registro(
            $renglon["Matricula"],
            utf8_encode($renglon["Nombre"]),
            utf8_encode($renglon["Correo"]),
            utf8_encode($renglon["Telefono"]),
            utf8_encode($renglon["Grado"]),
            $renglon["Id_carrera"],
            $renglon["Id_materia"],
            $renglon["Estatus"]
            );
        }
        return $obj_det;
     }

}
?>
