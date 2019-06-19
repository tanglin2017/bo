<?php 
function scan_dir($path='./',$order=0)
{
	$path = opendir($path);
	$array = array();
	while(false !== ($filename = readdir($path))){
		$filename != '.' && $filename != '..' && $array[] = $filename;
	}
	$order == 0 ? sort($array) : rsort($array);
	closedir($path);
	return $array;
}

function get_size($path)
{
	if(is_dir($path)){
		$dir = opendir($path);
		while($file = readdir($dir)){
			is_file($path.'/'.$file) && $size += filesize($path.'/'.$file);
			is_dir($path.'/'.$file) && $file != '.' && $file != '..' && $size += get_size($path.'/'.$file);
		}
		return $size;
	} elseif (is_file($path)){
		return filesize($path);
	} else {
		return 0;	
	}
}
function remove_dir($path)
{
	$result = true;
	if (substr($path, -1, 1) != "/") $path .= "/"; 
	foreach (glob($path."*") as $file){ 
		if (is_file($file)){ 
			if(!@unlink($file)) $result = false; 
		} elseif (is_dir($file)){ 
			remove_dir($file); 
		} 
	} 
	if (is_dir($path)){ 
		if(!@rmdir($path)) $result = false; 
	}
	return $result;
}
function copy_dir($srcdir,$dstdir,$overwrite = true) 
{
	$num = 0;
	if(!is_dir($dstdir)) mkdir($dstdir);
	if($curdir = opendir($srcdir)) {
		while($file = readdir($curdir)) {
			if($file != '.' && $file != '..') {
				$srcfile = $srcdir . '\\' . $file;
				$dstfile = $dstdir . '\\' . $file;
				if(is_file($srcfile)){
					if(!is_file($dstfile) || $overwrite) {
						if(copy($srcfile,$dstfile)) {
							$num++;
						} else {
							return false;
						}
					}                  
				} else if(is_dir($srcfile)) {
					$num += copydir($srcfile,$dstfile,$overwrite);
				}
			}
		}
		closedir($curdir);
	}
	return $num;
}
?>