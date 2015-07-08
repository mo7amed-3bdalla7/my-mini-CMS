<?php
class databaseModel {
	private function attributes() {
		$string = array ();
		foreach ( $this->fields as $field ) {
			
			if (is_int ( $this->$field ) || is_double ( $this->$field )) {
				$string [] = $field . '=' . $this->$field;
			} else {
				$string [] = $field . "='" . $this->$field . "'";
			}
		}
		
		return implode ( ',', $string );
	}
	public static function read($sql, $type = PDO::FETCH_ASSOC, $class = null) {
		global $dbo;
		$result = $dbo->query ( $sql );
		if ($result) {
			if (null != $class && $type == PDO::FETCH_CLASS) {
				$data = $result->fetchAll ( $type, $class );
			} else {
				$data = $result->fetchAll ( $type );
			}
			
			if (count ( $data ) == 1) {
				$data = array_shift ( $data );
				return $data;
			}
			if (count ( $data ) > 1) {
				
				return $data;
			}
		}
		return false;
	}
	private function add() {
		global $dbo;
		$sql = 'INSERT INTO ' . $this->table_name . ' SET ' . $this->attributes ();
		// echo $sql;
		$affected_rows = $dbo->exec ( $sql );
		if ($affected_rows != false) {
			$this->id = $affected_rows;
		} else {
			return false;
		}
		return true;
	}
	private function update() {
		global $dbo;
		$sql = 'UPDATE  ' . $this->table_name . ' SET ' . $this->attributes () . ' WHERE id=' . $this->id;
		// echo $sql;
		$affected_rows = $dbo->exec ( $sql );
		return ($affected_rows != false) ? true : false;
	}
	public function delete() {
		global $dbo;
		$sql = 'DELETE FROM ' . $this->table_name . ' WHERE id=' . $this->id;
		// echo $sql;
		$affected_rows = $dbo->exec ( $sql );
		return ($affected_rows != false) ? $affected_rows : false;
	}
	public function save() {
		return ($this->id === null) ? $this->add () : $this->update ();
	}
}