<?php

interface Data {

	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC);
	public function insert($table, $data);
	public function update($table, $data, $where);
	public function pages($table_name, $begin="0", $pagelimit="20", $add_query = "", $add_link = "");

}