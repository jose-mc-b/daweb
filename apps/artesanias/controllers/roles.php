
<?php

importar('apps/artesanias/models/roles');
importar('apps/artesanias/views/roles');

class RolesController extends Controller  {

   public function agregar(){
        $sql = "SELECT * FROM roles";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }
	
	public function listar	($formato=""){
        $sql = "SELECT R.id, R.descripcion  
            FROM roles R ";
        $data = $this->model->query($sql);
		if (empty($formato)){
			$this->view->listar($data);
		}
		else if(strtolower($formato)=="json") {
            echo json_encode($data);
		}
    }
	
	public function guardar(){
        $id          = $_POST['id']?? 0;
        $descripcion = $_POST['descripcion'];
	
        //--- validar datos
 
        //--- asociar al modelo
        $this->model->id=$id;
        $this->model->descripcion = $descripcion;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/roles/listar");
     }
 
	
	public function eliminar($id){
		 $this->model->delete($id);
        HTTPHelper::go("/artesanias/roles/listar");
	}
	
		
	   public function editar($id=0){
		   
        $sql= "SELECT  R.id, R.descripcion
            FROM roles R";
        $rolesListado = $this->model->query($sql);
        $roles = $this->model->getById($id);
        $this->view->editar($rolesListado, $roles);
    }
	

}

?>


