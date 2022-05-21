<?php

namespace App\Models;

use CodeIgniter\Model;

class Estudiante_Model extends Model
{
    protected $table      = 'estudiante'; //tabla
    protected $primaryKey = 'estudiante_id';   //clave principal

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';   //arreglo que usaremos para traer los datos
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'nombre_corto', 'activo'];  //las filas de la tabla unidades, ya no se pone id, xq ya está arriba

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';    //crear fila
    protected $updatedField  = 'fecha_edit';    //modificar
    protected $deletedField  = 'deleted_at';    //eliminar

    //reglas de validaciones
    protected $validationRules    = []; 
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

?>