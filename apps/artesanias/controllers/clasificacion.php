
<?php

importar('apps/artesanias/models/clasificacion');
importar('apps/artesanias/views/clasificacion');

class ClasificacionController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM clsificacion";
        $data = $this->model->query($sql);
        $this->view->agregar($data);
    }
    
    public function listar(){
        $sql = "SELECT * C.id, C.descripcion,
            IFNULL (P.descripcion, 'Ninguno') as padre
            FROM clasificacion C LEFT JOIN clasificacion P
            ON C.padre=P.id";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }
    
    public function guardar(){
        $id = $_POST['id']?? 0;
        $descripcion = $_POST['descripcion'];
        $padre   = $_POST['padre'];
        //-- validar datos
        
        //-- asociar al modelo
        $this->model->id=$id;
        $this->model->descripcion = $descripcion;
        $this->model->padre       = $padre;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/clasificacion/listar");
    }
    
    public function eliminar ($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/clasificacion/listar");
    }
    
    public function editar ($id=0){
        $sql = "SELECT * FROM clasificacion";
        $clasificacionListado = $this->model->query($sql);
        $clsificacion = this->model->getById($id);
        
        this->view->editar($clasificaionListado, $clasificacion);
    }

}

?>


