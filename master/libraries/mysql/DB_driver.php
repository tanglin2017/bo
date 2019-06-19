<?php
if (!defined('IN_GRCMS')) die('Hacking attempt');
/**
 * MYSQL 数据库类
 */
class DB_driver
{
	private static $instance; //数据库驱动实例句柄	
	private  $username;   
	private  $password;
	private  $hostname;
	private  $database;
	private  $port           =  '';
	private  $char_set       =  'utf8';
	public   $conn_id        =  false;
	public   $result_id      =  false;
	public   $delete_hack    =  true;
	public   $pconnect       =  false;
	
	private  $use_set_names;

	
	public function __construct($hostname, $username, $password, $database, $charset)
	{
		//if(self::$instance) return self::$instance;
		
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->char_set = $charset;
		$this->initialize();
		self::$instance = & $this;
	}
	//防止克隆该类的对象
	private function __clone()
	{}
	//获得该类的对象
	public static function getInstance()
	{
		static $DB_driver = NULL;
		if($DB_driver == NULL)
		{
			$DB_driver = new DB_driver();
		}
		return $DB_driver;
	}
	private  function initialize()
	{
		if (is_resource($this->conn_id) || is_object($this->conn_id))
		{
			return TRUE;
		}		
		$this->conn_id = ($this->pconnect == FALSE) ? $this->db_connect() : $this->db_pconnect();
		
		// 没有数据库连接资源? 提示错误信息
		if ( ! $this->conn_id)
		{
			exit('error: database connect error!');
		}

		// ----------------------------------------------------------------

		// 选择数据库
		if ($this->database != '')
		{
			if ( ! $this->db_select())
			{
				exit('error: Unable to select database!');
			}
			else
			{
				// We've selected the DB. Now we set the character set
				if ( ! $this->db_set_charset($this->char_set, $this->conn_id))
				{
					exit('error: Unable to select charset!');
				}

				return TRUE;
			}
		}

		return TRUE;		
	}
	/**
	 * 非持久的数据库连接
	 *
	 * @access	private
	 * @return	resource
	 */
	private function db_connect()
	{
		if ($this->port != '')
		{
			$this->hostname .= ':'.$this->port;
		}

		return @mysql_connect($this->hostname, $this->username, $this->password, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * 持久的数据库连接
	 *
	 * @access	private
	 * @return	resource
	 */
    private function db_pconnect()
	{
		if ($this->port != '')
		{
			$this->hostname .= ':'.$this->port;
		}

		return @mysql_pconnect($this->hostname, $this->username, $this->password);
	}	
	
	public function db_select()
	{
		return @mysql_select_db($this->database, $this->conn_id);
	}

	// --------------------------------------------------------------------

	/**
	 * 设置字符集
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	resource
	 */
	public function db_set_charset($charset, $collation)
	{
		if ( ! isset($this->use_set_names))
		{
			$this->use_set_names = (version_compare(PHP_VERSION, '5.2.3', '>=') && version_compare(mysql_get_server_info(), '5.0.7', '>=')) ? FALSE : TRUE;
		}

		if ($this->use_set_names === TRUE)
		{
			return @mysql_query("SET NAMES  '".$this->escape_str($charset)."'", $this->conn_id);
		}
		else
		{
			return @mysql_set_charset($charset, $this->conn_id);
		}
	}
	
	public static function &get_instance()
	{
		return self::$instance;
	}

	/**
	 * 执行sql语句
	 *
	 * @param String $sql
	 * @param Bool $return_object 是否返回数据集对象
	 * @return Result对象 或者 资源类型
	 */
	public function query($sql, $return_object = TRUE)
	{
		if($this->result_id) {
			$this->result_free();
		}
		//执行查询
		$this->result_id = $this->_execute($sql);
		if ($return_object)
		{
		   $RES = new DB_result();
		   $RES->conn_id	= $this->conn_id;
		   $RES->result_id	= $this->result_id;
		   $RES->num_rows	= $RES->num_rows();
		   return $RES;
		}
		else
		{
		   return $this->result_id;	
		}

		
	}

	/**
	 * 执行查询语句
	 *
	 * @access	private called by the base class
	 * @param	string	an SQL query
	 * @return	resource
	 */
	private function _execute($sql)
	{
		$sql = $this->_prep_query($sql);
		return @mysql_query($sql, $this->conn_id);
	}	
	
	/**
	 * 过滤sql语句
	 *
	 * @param string $sql
	 * @return string $sql
	 */
	private function _prep_query($sql)
	{
		// "DELETE FROM TABLE" returns 0 affected rows This hack modifies
		// the query so that it returns the number of affected rows
		if ($this->delete_hack === TRUE)
		{
			if (preg_match('/^\s*DELETE\s+FROM\s+(\S+)\s*$/i', $sql))
			{
				$sql = preg_replace("/^\s*DELETE\s+FROM\s+(\S+)\s*$/", "DELETE FROM \\1 WHERE 1=1", $sql);
			}
		}

		return $sql;
	}	
	
	
	public function insert($table, $data)
	{    //插入数据
        if(!is_array($data)){
		    return false;
		}
		
		$fields = array();
		$values = array();
		 
		foreach($data as $key=>$val){
			$fields[] = $key;
			$values[] = $this->escape($val);		
		}
		$insert_str = $this->_insert($table, $fields, $values);
                //echo $insert_str;exit;
    		if(!mysql_query($insert_str,$this->conn_id))
		{
                    exit(mysql_errno() . ": " . mysql_error() . "\n");		
		}else{
                    return mysql_insert_id();
                }
	}
	
	private function _insert($table, $keys, $values)
	{
		return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES (".implode(', ', $values).")";
	}	
	
	public function update($table, $data, $where)
	{    //更新数据
		if ($where == '')
		{
			return false;
		}

		$fields = array();
		foreach ($data as $key => $val)
		{
			$fields[$key] = $this->escape($val);
		}

		if ( ! is_array($where))
		{
			$dest = array($where);
		}
		else
		{
			$dest = array();
			foreach ($where as $key => $val)
			{
				$prefix = (count($dest) == 0) ? '' : ' AND ';

				if ($val !== '')
				{
					if ( ! $this->$key)
					{
						$key .= ' =';
					}

					$val = ' '.$this->escape($val);
				}

				$dest[] = $prefix.$key.$val;
			}
		}

		$update_str = $this->_update($table, $fields, $dest);
		
		if(!mysql_unbuffered_query($update_str,$this->conn_id))
		{
            exit(mysql_errno() . ": " . mysql_error() . "\n");		
		}
	}

	private function _update($table, $values, $where, $orderby = array(), $limit = FALSE)
	{
		foreach ($values as $key => $val)
		{
			$valstr[] = $key . ' = ' . $val;
		}

		$limit = ( ! $limit) ? '' : ' LIMIT '.$limit;

		$orderby = (count($orderby) >= 1)?' ORDER BY '.implode(", ", $orderby):'';

		$sql = "UPDATE ".$table." SET ".implode(', ', $valstr);

		$sql .= ($where != '' AND count($where) >=1) ? " WHERE ".implode(" ", $where) : '';

		$sql .= $orderby.$limit;

		return $sql;
	}
	
	public function delete($table, $where = array())
	{  /*删除数据
	   //保留函数功能
	   $conditions = '';
	   if (is_array($where))
	   {
	   	   
	   }
	   return "DELETE FROM ".$table.$conditions;
      */
	}
	
	public function insert_id()
	{
		return @mysql_insert_id($this->conn_id);
	}
	
	
	/**
	* 查询影响的行数
	*
	* @access	public
	* @return	integer
	*/
	public function affected_rows()
	{
		return @mysql_affected_rows($this->conn_id);
	}  	
	
	/**
	 * 释放记录集资源
	 * return void
	 */
	public function result_free()
	{
	   if (is_resource($this->result_id) || is_object($this->result_id))
	   {
		  @mysql_free_result($this->result_id);
		  $this->result_id = FALSE;
	   }
	   
	}
	
	/**
	 * 关闭数据库连接
	 * return void
	 */	
	public function close()
	{
		if (is_resource($this->conn_id) or is_object($this->conn_id))
		{ 
		    mysql_close($this->conn_id);
		    unset($this->conn_id);
		    $this->conn_id = FALSE;
		}
	}
	// --------------------------------------------------------------------

	/**
	 * 智能转义字符串
	 *
	 * Escapes data based on type
	 * Sets boolean and null types
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	public function escape($str)
	{
		if (is_string($str))
		{
			$str = "'".$this->escape_str($str)."'";
		}
		elseif (is_bool($str))
		{
			$str = ($str === FALSE) ? 0 : 1;
		}
		elseif (is_null($str))
		{
			$str = 'NULL';
		}

		return $str;
	}	
	
	// --------------------------------------------------------------------

	/**
	 * 转义字符串
	 *
	 * @access	public
	 * @param	string
	 * @param	bool	是否字符串将使用在LIKE条件
	 * @return	string
	 */
	public function escape_str($str, $like = FALSE)
	{
		if(get_magic_quotes_gpc()) return $str;
		if (is_array($str))
		{
			foreach ($str as $key => $val)
	   		{
				$str[$key] = $this->escape_str($val, $like);
	   		}

	   		return $str;
	   	}

		if (function_exists('mysql_real_escape_string') AND is_resource($this->conn_id))
		{
			$str = mysql_real_escape_string($str, $this->conn_id);
		}
		elseif (function_exists('mysql_escape_string'))
		{
			$str = mysql_escape_string($str);
		}
		else
		{
			$str = addslashes($str);
		}

		// escape LIKE condition wildcards
		if ($like === TRUE)
		{
			$str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
		}

		return $str;
	}	
	
	/**
	 * Version 
	 *
	 * @access	public
	 * @return	string
	 */
	public function _version()
	{
		return "SELECT version() AS ver";
	}		

	public function __destruct() 
	{
		$this->result_free();
		$this->close();
	}
}