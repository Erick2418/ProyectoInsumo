

<?php
class DepresiacionData {
	public static $tablename = "depreciacion";
   


	public function DepresiacionData(){
        $this->id ="";
        $this->id_producto ="";
        $this->meses =0;
 
	}

	public function add($idProducto,$meses){
		$sql = "insert into depreciacion (id_producto,meses) ";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value ( $idProducto, $meses )";
		Executor::doit($sql);
	}
	public static function getById($id){
		$sql = "select meses from ".self::$tablename." where id_producto=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new LotData();
		while($r = $query[0]->fetch_array()){
			$data->meses = $r['meses'];
			$found = $data;
			break;
		}
		return $found;
	}


	 

}

?>