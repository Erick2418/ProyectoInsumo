<?php
class NovedadData {
	public static $tablename = "novelty";
   


	public function NovedadData(){
        $this->id ="";
        $this->fecha_novedad ="";
        $this->id_produccion =0;
		$this->id_subProduccion	=0;
        $this->id_tipoNovedad=0;
        $this->descripcion =0;
        $this->valor =0;
	}


	public function add(){
 
		$sql = "insert into novelty (fecha_novedad,id_produccion,id_subProduccion,id_tipoNovedad,descripcion,valor ) ";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value (\"$this->fecha_novedad\",\"$this->id_produccion\",\"$this->id_subProduccion\",\"$this->id_tipoNovedad\",\"$this->descripcion\",\"$this->valor\")";
		echo $sql;
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		//$sql = "delete from ".self::$tablename." where id=$this->id";
		$sql = "update ".self::$tablename." set condicion=0 where id=$this->id";
		
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		//$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		$sql = "update ".self::$tablename." set name=\"$this->name\",num_lot=\"$this->num_lot\",dimension=\"$this->dimension\" where id=$this->id";
		
		Executor::doit($sql);
	}


	 

	public function updateNovedad(){
		//$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		$sql = "UPDATE novelty SET fecha_novedad=\"$this->fecha_novedad\", id_tipoNovedad=\"$this->id_tipoNovedad\", descripcion=\"$this->descripcion\", valor= $this->valor where id=$this->id";
		echo $sql;
	//	die();
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NovedadData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->num_lot = $r['num_lot'];
			$data->dimension = $r['dimension'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." where condicion = 1";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new NovedadData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->num_lot = $r['num_lot'];
            $array[$cnt]->dimension = $r['dimension'];
            
			$cnt++;
		}
		return $array;
	}



	public static function getAllNovedd(){
		$sql = "select * from ".self::$tablename." ";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new NovedadData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fecha_novedad = $r['fecha_novedad'];
			$array[$cnt]->id_produccion = $r['id_produccion'];
            $array[$cnt]->id_subProduccion = $r['id_subProduccion'];
			$array[$cnt]->id_subProduccion = $r['id_subProduccion'];
            $array[$cnt]->id_tipoNovedad = $r['id_tipoNovedad'];
            $array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->valor = $r['valor'];

			$cnt++;
		}
		return $array;
	}

	public static function getNovedadById($id){

		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NovedadData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->fecha_novedad = $r['fecha_novedad'];
			$data->id_produccion = $r['id_produccion'];
			$data->id_subProduccion = $r['id_subProduccion'];
			$data->id_tipoNovedad = $r['id_tipoNovedad'];
			$data->descripcion = $r['descripcion'];
			$data->valor = $r['valor'];
			$found = $data;
			break;
		}
		return $found;
	}



	
 

	public static function getAllNovedades($idProduccion){
		$sql = "SELECT * FROM novelty WHERE status = 1 AND id_subProduccion = $idProduccion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new NovedadData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fecha_novedad = $r['fecha_novedad'];
			$array[$cnt]->id_produccion = $r['id_produccion'];
            $array[$cnt]->id_subProduccion = $r['id_subProduccion'];
			$array[$cnt]->id_tipoNovedad = $r['id_tipoNovedad'];
			$array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->valor = $r['valor'];
			$cnt++;
		}
		return $array;
	}

	
	public static function getAllNovedadesByProduccion($idProduccion){
		$sql = "SELECT * FROM novelty WHERE status = 1 AND id_Produccion = $idProduccion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new NovedadData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fecha_novedad = $r['fecha_novedad'];
			$array[$cnt]->id_produccion = $r['id_produccion'];
            $array[$cnt]->id_subProduccion = $r['id_subProduccion'];
			$array[$cnt]->id_tipoNovedad = $r['id_tipoNovedad'];
			$array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->valor = $r['valor'];
			$cnt++;
		}
		return $array;
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

	
    public function idLaborGET($idProduccion, $idLabores){
		$sql = "SELECT id FROM subproduccion WHERE idProduccion = $idProduccion AND id_labores = $idLabores";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		$r = $query[0]->fetch_array();
		return $r;
	}
    


}

?>