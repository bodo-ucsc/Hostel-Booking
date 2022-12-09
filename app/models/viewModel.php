<?php

class viewModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllrecords($table)
	{
		$res = $this->get($table);
		return $res;
	}

	public function checkData($table, $condition)
	{
		$res = $this->get($table, $condition);
		return $res;
	}

	public function getID($table, $column, $condition)
	{

		$res = $this->getColumnValue($table, $column, $condition);
		return $res;
	}

	public function columnValues($table, $condition, $column = null)
	{
		$res = $this->get($table, $condition);
		return $res;
	}
}
