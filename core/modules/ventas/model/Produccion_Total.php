<?php
class TotalProduccion {
	public static $tablename = "producciontotal";

	public function TotalProduccion(){
        $this->id ="";
        $this->total_produccion ="";
        $this->total_hijuelos =0;
        $this->id_Produccion =0;
	}

	public function add(){

		$sql = "insert into producciontotal (total_produccion,total_hijuelos,id_Produccion) ";
        $sql .= "value (\"$this->total_produccion\",\"$this->total_hijuelos\",\"$this->id_Produccion\")";
		Executor::doit($sql);

        $stado= "FINALIZADO";

		$sql = "UPDATE  production SET estadoProduccion= \"$stado\" where id=$this->id_Produccion";
		echo $sql;
        die();
        Executor::doit($sql);


	}

	public static function delById($id){
	/*	$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);*/
	}
	public function del(){
	/*	//$sql = "delete from ".self::$tablename." where id=$this->id";
		$sql = "update ".self::$tablename." set condicion=0 where id=$this->id";
		
		Executor::doit($sql);*/
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		//$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
	/*	$sql = "update ".self::$tablename." set name=\"$this->name\",num_lot=\"$this->num_lot\",dimension=\"$this->dimension\" where id=$this->id";
		
		Executor::doit($sql);*/
	}


	public static function getById($id){
	/*	$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new LotData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->num_lot = $r['num_lot'];
			$data->dimension = $r['dimension'];
			$found = $data;
			break;
		}
		return $found;*/
	}



	public static function getAll(){
	/*	$sql = "select * from ".self::$tablename." where condicion = 1";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new LotData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->num_lot = $r['num_lot'];
            $array[$cnt]->dimension = $r['dimension'];
            
			$cnt++;
		}
		return $array;*/
	}


	public static function getLike($q){
		/*$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CategoryData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;*/
	}


}

?>