<?php

class ProductosView  {
	

	public function agregar($artesanos=[], $clasificacion=[]){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/productos_agregar.html"); 
        $html = Template($str)->render_regex('LISTADO_ARTESANOS', $artesanos);
        $html = Template($html)->render_regex('LISTADO_CLASIFICACION', $clasificacion);
        print Template('Agregar productos')->show($html);
    } 

    public function listar($list=array()) {
        
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/productos_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_PRODUCTOS', $list);

        print Template('Listado de productos')->show($html);
    }
	
	 public function editar($list=[], $productos){
		 
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/productos_editar.html"); 
        $html = Template($str)->render_regex('LISTADO_PRODUCTOS', $list);
        $html = Template($html)->render($productos);
        print Template('Editar productos')->show($html);
    } 

}

?>