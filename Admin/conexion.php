<?php
    class Conexion
    {
        private $conexion;
        private $bd = "db_PetCollar.";//Nombre de la base de datos
        private $query;

        public function __CONSTRUCT()
        {
            $this->conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        } 

        public function filtradoEstadistica($coleccion, $condicion, $valor)
        {
            $this->query = new MongoDB\Driver\Query([$condicion => $valor]);
            $cursor = $this->conexion->executeQuery($this->bd.$coleccion, $this->query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        }

        public function filtrado($coleccion, $Usuario)
        {
            $this->query = new MongoDB\Driver\Query(['Usuario_Mascota' => $Usuario]);
            $lista = array();
            $cursor = $this->conexion->executeQuery($this->bd.$coleccion, $this->query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        }

        public function filtradoCliente($coleccion, $Usuario)
        {
            $this->query = new MongoDB\Driver\Query(['Usuario' => $Usuario]);
            $lista = array();
            $cursor = $this->conexion->executeQuery($this->bd.$coleccion, $this->query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        }

        public function listado($coleccion)
        {
            $this->query = new MongoDB\Driver\Query([]);
            $lista = array();
            $cursor = $this->conexion->executeQuery($this->bd.$coleccion, $this->query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        }

        public function insertMascota($coleccion, $Usuario, $Nom, $Raza, $Tam, $Fecha, $Sexo)
        {
            $this->query = new MongoDB\Driver\BulkWrite;
            $this->query->insert(['Usuario_Mascota'=>$Usuario, 'Nombre'=>$Nom, 'Raza'=>$Raza, 'Tamanio'=>$Tam, 'FechaNacimiento'=>$Fecha, 'Sexo'=>$Sexo]);
            $this->conexion->executeBulkWrite($this->bd.$coleccion, $this->query);
        }

        public function insertCliente($coleccion, $Usuario, $ap, $am, $Nom, $tel, $email, $cp, $dir)
        {
            $this->query = new MongoDB\Driver\BulkWrite;
            $this->query->insert(['Usuario'=>$Usuario, 'Nombre'=>$Nom, 'APaterno'=>$ap, 'AMaterno'=>$am, 'Tel'=>$tel, 'Email'=>$email, 'CodPostal'=>$cp, 'Localidad'=>$dir]);
            $this->conexion->executeBulkWrite($this->bd.$coleccion, $this->query);
        }

        public function updateMascota($coleccion, $Usuario, $Nom, $Raza, $Tam, $Sexo)
        {
            $this->query = new MongoDB\Driver\BulkWrite;
            $this->query->update(['Usuario_Mascota'=>$Usuario], ['$set' => ['Nombre'=>$Nom, 'Raza'=>$Raza, 'Tamanio'=>$Tam, 'Sexo'=>$Sexo]]);
            $this->conexion->executeBulkWrite($this->bd.$coleccion, $this->query);
        }

        public function updateCliente($coleccion, $Usuario, $ap, $am, $Nom, $tel, $email, $cp, $dir)
        {
            $this->query = new MongoDB\Driver\BulkWrite;
            $this->query->update(['Usuario'=>$Usuario],['$set' => ['Nombre'=>$Nom, 'APaterno'=>$ap, 'AMaterno'=>$am, 'Tel'=>$tel, 'Email'=>$email, 'CodPostal'=>$cp, 'Localidad'=>$dir]]);
            $this->conexion->executeBulkWrite($this->bd.$coleccion, $this->query);
        }

        public function delete($coleccion, $Nombre)
        {
            $this->query = new MongoDB\Driver\BulkWrite;
            $this->query->delete(['Usuario_Mascota'=> $Nombre]);
            $this->conexion->executeBulkWrite($this->bd.$coleccion, $this->query);
        }

        public function deleteCliente($coleccion, $Nombre)
        {
            $this->query = new MongoDB\Driver\BulkWrite;
            $this->query->delete(['Usuario'=> $Nombre]);
            $this->conexion->executeBulkWrite($this->bd.$coleccion, $this->query);
        }

    }
?>
