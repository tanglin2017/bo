<?php
/**************************************************
*  Created:  2011-05-02
*
*  文件上传类
*
*  120256358@qq.com
*
***************************************************/
class upload{
	private $allow_types = array('swf', 'flv');
	private $save_path;
	private $upload_size;  // 5242880 5M in bytes
	private $save_filename_type; //0 表示用上传的原名,1 表示按上传时间命名
	public  $error = '';
	public  $filename = '';
	
	public function __construct($save_path = 'upfiles/',$max_size=5242880,$save_type=0){
	    $this->save_path = $save_path;
		$this->upload_size = $max_size;
		$this->save_fielname_type = $save_type;
	}
	
	public function set_allowtype($extarr){
	   unset($this->allow_types);
	   $this->allow_types = $extarr;
	}
	
	public function set_max_size($max_size){
	   $this->upload_size = $max_size;
	}

	public function set_save_filename($save_type){
	   $this->save_filename_type = $save_type;
	}
		
	public function do_upload($field){
		// Settings
		$save_path = $this->save_path;	// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
		$upload_name = $field;
		$max_file_size_in_bytes = $this->upload_size;				
		$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)  
		
		$POST_MAX_SIZE = ini_get('post_max_size');
		$unit = strtoupper(substr($POST_MAX_SIZE, -1));
		$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));
		if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
			header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in SWFUpload
			echo "POST 已超出最大允许的大小.";
			return;
		}
		
		// Other variables	
		$MAX_FILENAME_LENGTH = 260;
		$file_name = "";
		$save_name = "";
		$file_extension = "";
		$uploadErrors = array(
			0=>"文件上传成功",
			1=>"上传的文件超过了php.ini中upload_max_filesize大小",
			2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
			3=>"上传的文件只有部分被上传",
			4=>"没有文件被上传",
			6=>"缺少一个临时文件夹"
		);
		
		
		// 验证上传
		if (!isset($_FILES[$upload_name])) {
			$this->HandleError("没有发现上传文件\$_FILES for " . $upload_name);
			return;
		} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
			$this->HandleError($uploadErrors[$_FILES[$upload_name]["error"]]);
			return;
		} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
			$this->HandleError("Upload failed is_uploaded_file test.");
			return;
		} else if (!isset($_FILES[$upload_name]['name'])) {
			$this->HandleError("文件没有名称.");
			return;
		} else if(!$this->validate_ext($_FILES[$upload_name]['name'],$this->allow_types)){
			$this->HandleError("上传的文件不合法");
			return;
		}

		// 验证文件的大小
		$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
		if (!$file_size || $file_size > $max_file_size_in_bytes) {
			$this->HandleError("文件超过允许上传的大小");
			return;
		}
		
		if ($file_size <= 0) {
			$this->HandleError("文件大小小于0");
			return;
		}
		
		
		// Validate file name (for our purposes we'll just remove invalid characters)
		//$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
		$file_name = basename($_FILES[$upload_name]['name']);
		if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
			$this->HandleError("Invalid file name");
			return;
		}
		//保存上传文件
		switch($this->save_filename_type){
		   case 0 : 
		      $save_name = $file_name;
			  break;
		   case 1 : 
			  $path_info = pathinfo($file_name);
			  $file_extension = $path_info["extension"];		   
		      $datetime = date("Y-m-d H:i:s"); 
              $time = str_replace("-","",str_replace(":","",str_replace(" ","",$datetime))); 
		      //$save_name = md5($time.rand(10,10000)) . "." . $file_extension;
              $save_name = $time. "." . $file_extension;
			  break;
		   default :
		   	  $save_name = $file_name;  
		}
		$this->savefile($_FILES[$upload_name]['tmp_name'],$save_path . $save_name);
		$this->filename = $save_name;
	    return $save_path . $save_name;
	}
	// Validate file extension
	public function validate_ext($file,$extension_whitelist){
		$path_info = pathinfo($file);
		$file_extension = $path_info["extension"];
		$is_valid_extension = false;
		foreach ($extension_whitelist as $extension) {
			if (strcasecmp($file_extension, $extension) == 0) {
				$is_valid_extension = true;
				break;
			}
		}
		return $is_valid_extension;
	}
	
	public function savefile($tmp_file,$save_path){	
		// Validate that we won't over-write an existing file
		if (file_exists($save_path)) {
			$this->HandleError("该文件已经存在.");
			return;
		}
		if (!@move_uploaded_file($tmp_file, $save_path)) {
			$this->HandleError("上传的文件不能被保存.");
			return;
		}
	}

	public function HandleError($message) {
		$this->error = $message;
		//echo $this->error;
	}

}
?>