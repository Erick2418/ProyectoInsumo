<?php
class TotalProduccion2 {
	public static $tablename = "producciontotal";
   


	public function TotalProduccion2(){
        $this->id ="";
        $this->total_produccion =0;
        $this->total_hijuelos =0;
        $this->id_Produccion =0;
	}

	public function add(){
	
	}

	public static function delById($id){
		
	}
	public function del(){
	
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
	
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_Produccion=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new TotalProduccion2();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->total_produccion = $r['total_produccion'];
			$data->total_hijuelos = $r['total_hijuelos'];
			$data->id_Produccion = $r['id_Produccion'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		
	}


	public static function getLike($q){
		
	}


}

?>