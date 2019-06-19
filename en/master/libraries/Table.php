<?php
if (!defined('IN_GRCMS')) die('Hacking attempt');

class Table
{
	public $data = array();
	public $table_name = '';
	
	/**
	*  保存数据
	*/
	public function save($value = '', $column = 'id')
	{
		if($value != '')
		{
		   $this->_update($value, $column);
		}
		else
		{
		   $flag=$this->_add();
		   return $flag;
		}
	}
	
	protected function _add()
	{
		if(empty($this->data)) return FALSE;

		$db = &DB_driver::get_instance();

		return  $db->insert($this->table_name,$this->data);
	}
	
	protected function _update($value, $column)
	{
		if (empty($this->data)) return FALSE;
		
		$db = &DB_driver::get_instance();
		
		$db->update($this->table_name, $this->data, $column."='" . $value . "'");
		return  TRUE;
	}
}
?>