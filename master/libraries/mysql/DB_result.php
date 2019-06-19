<?php
if (!defined('IN_GRCMS')) die('Hacking attempt');
class DB_result
{
	public $conn_id		          = NULL;
	public $result_id		      = NULL;
	public $result_array	      = array();
	public $result_object	      = array();
    //public $custom_result_object = array();
	public $current_row	      = 0;
	public $num_rows		      = 0;
	//public $row_data		      = NULL;
	
	/**
	 *
	 * @权限	public
	 * @参数	string	对象或数组
	 * @返回	mixed	记录集数组或对象
	 */
	public function result($type = 'object')
	{
		if ($type == 'array')
		{
			return $this->result_array();
		}
		else if ($type == 'object')
		{
			return $this->result_object();
		}
	}	
	// --------------------------------------------------------------------

	/**
	 * 返回数据集对象
	 *
	 * @access	public
	 * @return	object
	 */
	public function result_object()
	{
		if (count($this->result_object) > 0)
		{
			return $this->result_object;
		}

		if ($this->result_id === FALSE OR $this->num_rows() == 0)
		{
			return array();
		}

		$this->_data_seek(0);
		while ($row = $this->_fetch_object())
		{
			$this->result_object[] = $row;
		}

		return $this->result_object;
	}

	// --------------------------------------------------------------------

	/**
	 * 生成数据集数组
	 *
	 * @access	public
	 * @return	array
	 */
	public function result_array()
	{
		if (count($this->result_array) > 0)
		{
			return $this->result_array;
		}

		if ($this->result_id === FALSE OR $this->num_rows() == 0)
		{
			return array();
		}

		$this->_data_seek(0);
		while ($row = $this->_fetch_assoc())
		{
			$this->result_array[] = $row;
		}

		return $this->result_array;
	}


	// --------------------------------------------------------------------

	/**
	 * 返回数据集某一行记录
	 *
	 * @access	public
	 * @param	string
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
	 */
	public function row($type = 'object', $n = 0)
	{
		if ( ! is_numeric($n))
		{
			if ( ! is_array($this->row_data))
			{
				$this->row_data = $this->row_array(0);
			}

			if (array_key_exists($n, $this->row_data))
			{
				return $this->row_data[$n];
			}
			$n = 0;
		}

		if ($type == 'object') return $this->row_object($n);
		else if ($type == 'array') return $this->row_array($n);
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * @access	public
	 * @return	object
	 */
	public function set_row($key, $value = NULL)
	{
		if ( ! is_array($this->row_data))
		{
			$this->row_data = $this->row_array(0);
		}

		if (is_array($key))
		{
			foreach ($key as $k => $v)
			{
				$this->row_data[$k] = $v;
			}

			return;
		}

		if ($key != '' AND ! is_null($value))
		{
			$this->row_data[$key] = $value;
		}
	}
	// --------------------------------------------------------------------

	/**
	 * 返回一个结果行 - 对象的版本
	 *
	 * @access	public
	 * @return	object
	 */
	public function row_object($n = 0)
	{
		$result = $this->result_object();

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
	 * 返回一个结果行 - 数组的版本
	 *
	 * @access	public
	 * @return	array
	 */
	public function row_array($n = 0)
	{
		$result = $this->result_array();

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}


	// --------------------------------------------------------------------

	/**
	 * 返回记录的第一行
	 *
	 * @access	public
	 * @return	object
	 */
	public function first_row($type = 'object')
	{
		$result = $this->result($type);

		if (count($result) == 0)
		{
			return $result;
		}
		return $result[0];
	}

	/**
	 * 返回记录集的行数
	 *
	 * @access	public	 
	 * @return int
	 */
	public function num_rows()
	{
		return @mysql_num_rows($this->result_id);
	}
	
	// --------------------------------------------------------------------

	/**
	 * 返回记录最后一行
	 *
	 * @access	public
	 * @return	object
	 */
	public function last_row($type = 'object')
	{
		$result = $this->result($type);

		if (count($result) == 0)
		{
			return $result;
		}
		return $result[count($result) -1];
	}
	
	/**
	 * 移动指针
	 *
	 * @access	private
	 * @return	array
	 */
	private function _data_seek($n = 0)
	{
		return mysql_data_seek($this->result_id, $n);
	}
			

	// --------------------------------------------------------------------

	/**
	 * associative 数组
	 *
	 * 返回数组结果集
	 *
	 * @access	private
	 * @return	array
	 */
	private function _fetch_assoc()
	{
		return mysql_fetch_assoc($this->result_id);
	}

	// --------------------------------------------------------------------

	/**
	 * 记录集 - 对象
	 *
	 * Returns the result set as an object
	 *
	 * @access	private
	 * @return	object
	 */
	private function _fetch_object()
	{
		return mysql_fetch_object($this->result_id);
	}	

	/**
	 * 释放记录集 
	 *
     * @return	null
	 */    
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			mysql_free_result($this->result_id);
			$this->result_id = NULL;
		}
	}
	
	public function __destruct() 
	{   
	   $this->free_result();
	   $this->conn_id = NULL;
	}		
}
?>