<?php

/**
  提示框函数
 */
function msgbox($msg = '', $event = 'BACK', $die = 1) {
    $script = $msg ? 'alert("' . $msg . '");' : NULL;
    //echo $script;exit;
    switch ($event) {
        case 'BACK' : $script .= 'history.back(-1);';
            break;
        case 'NOT' : break;
        case 'CLOSE' : $script .= 'window.opener=null; window.open("","_self"); window.close();';
            break;
        default : $script .= $event . ';';
            break;
    }
    echo '<script type="text/javascript">' . $script . '</script> ';
    $die && exit();
}

/*
 * 对用户输入的数据进行转义
 */

function daddslashes($string, $force = 0) {
    !defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
    if (!MAGIC_QUOTES_GPC || $force) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = daddslashes($val, $force);
            }
        } else {
            $string = addslashes($string);
        }
    }
    return $string;
}

// 防止XSS攻击
function remove_xss($val) {
    // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
    // this prevents some character re-spacing such as <java\0script>
    // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
    // straight replacements, the user should never need these since they're normal characters
    // this prevents like <IMG SRC=@avascript:alert('XSS')>
    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';
    $search .= '~`";:?+/={}[]-_|\'\\';
    for ($i = 0; $i < strlen($search); $i++) {
        // ;? matches the ;, which is optional
        // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
        // search for the hex values
        $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ;
        // 0{0,7} matches '0' zero to seven times
        $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ;
    }
    // now the only remaining whitespace attacks are \t, \n, and \r
    $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
    $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $ra = array_merge($ra1, $ra2);

    $found = true; // keep replacing as long as the previous round replaced something
    while ($found == true) {
        $val_before = $val;
        for ($i = 0; $i < sizeof($ra); $i++) {
            $pattern = '/';
            for ($j = 0; $j < strlen($ra[$i]); $j++) {
                if ($j > 0) {
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';
                    $pattern .= ')*';
                }
                $pattern .= $ra[$i][$j];
            }
            $pattern .= '/i';
            $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
            $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
            if ($val_before == $val) {
                // no replacements were made, so exit the loop
                $found = false;
            }
        }
    }
    return $val;
}

/**
 * 字符串截取
 */
function cut_str($string, $length, $dot = '...', $charset = 'utf-8') {
    if (strlen($string) <= $length) {
        return $string;
    }
    $str = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;', '&nbsp;'), array('&', '"', '<', '>', ' '), $string);
    $strcut = '';
    if (strtolower($charset) == 'utf-8') {
        $n = $tn = $noc = 0;
        while ($n < strlen($str)) {
            $t = ord($str[$n]);
            if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                $tn = 1;
                $n++;
                $noc++;
            } elseif (194 <= $t && $t <= 223) {
                $tn = 2;
                $n += 2;
                $noc += 2;
            } elseif (224 <= $t && $t <= 239) {
                $tn = 3;
                $n += 3;
                $noc += 2;
            } elseif (240 <= $t && $t <= 247) {
                $tn = 4;
                $n += 4;
                $noc += 2;
            } elseif (248 <= $t && $t <= 251) {
                $tn = 5;
                $n += 5;
                $noc += 2;
            } elseif ($t == 252 || $t == 253) {
                $tn = 6;
                $n += 6;
                $noc += 2;
            } else {
                $n++;
            }
            if ($noc >= $length) {
                break;
            }
        }
        if ($noc > $length) {
            $n -= $tn;
        }
        $strcut = substr($str, 0, $n);
    } else {
        for ($i = 0; $i < $length; $i++) {
            $strcut .= ord($str[$i]) > 127 ? $str[$i] . $str[++$i] : $str[$i];
        }
    }
    $strcut = str_replace(array('"', '<', '>'), array('&quot;', '&lt;', '&gt;'), $strcut);
    $strcut != $string && $strcut .= $dot;
    return $strcut;
}

function get_ip() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    } else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else if (!empty($_SERVER["REMOTE_ADDR"])) {
        $cip = $_SERVER["REMOTE_ADDR"];
    } else {
        $cip = '';
    }
    preg_match("/[\d\.]{7,15}/", $cip, $cips);
    $cip = isset($cips[0]) ? $cips[0] : 'unknown';
    unset($cips);
    return $cip;
}

//验证邮箱
function is_mail($email = NULL) {
    if ($email !== NULL && preg_match("/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/", $email, $ret))
        return TRUE;

    return FALSE;
}

function html_chars(&$array, $quote = ENT_QUOTES) {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array[$key] = html_chars($value, $quote);
        }
    } else {
        $array = htmlspecialchars($array, $quote);
    }
    return $array;
}

function sphtml_text($str) {
    $str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU", "", $str);
    $alltext = "";
    $start = 1;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($start == 0 && $str[$i] == ">") {
            $start = 1;
        } else if ($start == 1) {
            if ($str[$i] == "<") {
                $start = 0;
                $alltext .= " ";
            } else if (ord($str[$i]) > 31) {
                $alltext .= $str[$i];
            }
        }
    }
    $alltext = str_replace("　", " ", $alltext);
    $alltext = preg_replace("/&([^;&]*)(;|&)/", "", $alltext);
    $alltext = preg_replace("/[ ]+/s", " ", $alltext);
    return $alltext;
}

function html_text($str, $r = 0) {
    if ($r == 0) {
        return sphtml_text($str);
    } else {
        $str = sphtml_text(stripslashes($str));
        return addslashes($str);
    }
}

function text_html($txt) {
    $txt = str_replace("  ", "　", $txt);
    $txt = str_replace("<", "&lt;", $txt);
    $txt = str_replace(">", "&gt;", $txt);
    $txt = preg_replace("/[\r\n]{1,}/isU", "<br/>\r\n", $txt);
    return $txt;
}

function format_textarea($string) {
    return nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($string)));
}

/**
 * 检查目标文件夹是否存在，如果不存在则自动创建该目录
 *
 * @access      public
 * @param       string      folder     目录路径。不能使用相对于网站根目录的URL
 *
 * @return      bool
 */
function make_dir($folder) {
    $reval = false;

    if (!file_exists($folder)) {
        /* 如果目录不存在则尝试创建该目录 */
        @umask(0);

        /* 将目录路径拆分成数组 */
        preg_match_all('/([^\/]*)\/?/i', $folder, $atmp);

        /* 如果第一个字符为/则当作物理路径处理 */
        $base = ($atmp[0][0] == '/') ? '/' : '';

        /* 遍历包含路径信息的数组 */
        foreach ($atmp[1] AS $val) {
            if ('' != $val) {
                $base .= $val;

                if ('..' == $val || '.' == $val) {
                    /* 如果目录为.或者..则直接补/继续下一个循环 */
                    $base .= '/';

                    continue;
                }
            } else {
                continue;
            }

            $base .= '/';

            if (!file_exists($base)) {
                /* 尝试创建目录，如果创建失败则继续循环 */
                if (@mkdir(rtrim($base, '/'), 0777)) {
                    @chmod($base, 0777);
                    $reval = true;
                }
            }
        }
    } else {
        /* 路径已经存在。返回该路径是不是一个目录 */
        $reval = is_dir($folder);
    }

    clearstatcache();

    return $reval;
}

/**
 * 检查文件类型
 *
 * @access      public
 * @param       string      filename            文件名
 * @param       string      realname            真实文件名
 * @param       string      limit_ext_types     允许的文件类型
 * @return      string
 */
function check_file_type($filename, $realname = '', $limit_ext_types = '') {
    if ($realname) {
        $extname = strtolower(substr($realname, strrpos($realname, '.') + 1));
    } else {
        $extname = strtolower(substr($filename, strrpos($filename, '.') + 1));
    }

    if ($limit_ext_types && stristr($limit_ext_types, '|' . $extname . '|') === false) {
        return '';
    }

    $str = $format = '';

    $file = @fopen($filename, 'rb');
    if ($file) {
        $str = @fread($file, 0x400); // 读取前 1024 个字节
        @fclose($file);
    } else {
        if (stristr($filename, ROOT_PATH) === false) {
            if ($extname == 'jpg' || $extname == 'jpeg' || $extname == 'gif' || $extname == 'png' || $extname == 'doc' ||
                    $extname == 'xls' || $extname == 'txt' || $extname == 'zip' || $extname == 'rar' || $extname == 'ppt' ||
                    $extname == 'pdf' || $extname == 'rm' || $extname == 'mid' || $extname == 'wav' || $extname == 'bmp' ||
                    $extname == 'swf' || $extname == 'chm' || $extname == 'sql' || $extname == 'cert' || $extname == 'pptx' ||
                    $extname == 'xlsx' || $extname == 'docx') {
                $format = $extname;
            }
        } else {
            return '';
        }
    }

    if ($format == '' && strlen($str) >= 2) {
        if (substr($str, 0, 4) == 'MThd' && $extname != 'txt') {
            $format = 'mid';
        } elseif (substr($str, 0, 4) == 'RIFF' && $extname == 'wav') {
            $format = 'wav';
        } elseif (substr($str, 0, 3) == "\xFF\xD8\xFF") {
            $format = 'jpg';
        } elseif (substr($str, 0, 4) == 'GIF8' && $extname != 'txt') {
            $format = 'gif';
        } elseif (substr($str, 0, 8) == "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A") {
            $format = 'png';
        } elseif (substr($str, 0, 2) == 'BM' && $extname != 'txt') {
            $format = 'bmp';
        } elseif ((substr($str, 0, 3) == 'CWS' || substr($str, 0, 3) == 'FWS') && $extname != 'txt') {
            $format = 'swf';
        } elseif (substr($str, 0, 4) == "\xD0\xCF\x11\xE0") {   // D0CF11E == DOCFILE == Microsoft Office Document
            if (substr($str, 0x200, 4) == "\xEC\xA5\xC1\x00" || $extname == 'doc') {
                $format = 'doc';
            } elseif (substr($str, 0x200, 2) == "\x09\x08" || $extname == 'xls') {
                $format = 'xls';
            } elseif (substr($str, 0x200, 4) == "\xFD\xFF\xFF\xFF" || $extname == 'ppt') {
                $format = 'ppt';
            }
        } elseif (substr($str, 0, 4) == "PK\x03\x04") {
            if (substr($str, 0x200, 4) == "\xEC\xA5\xC1\x00" || $extname == 'docx') {
                $format = 'docx';
            } elseif (substr($str, 0x200, 2) == "\x09\x08" || $extname == 'xlsx') {
                $format = 'xlsx';
            } elseif (substr($str, 0x200, 4) == "\xFD\xFF\xFF\xFF" || $extname == 'pptx') {
                $format = 'pptx';
            } else {
                $format = 'zip';
            }
        } elseif (substr($str, 0, 4) == 'Rar!' && $extname != 'txt') {
            $format = 'rar';
        } elseif (substr($str, 0, 4) == "\x25PDF") {
            $format = 'pdf';
        } elseif (substr($str, 0, 3) == "\x30\x82\x0A") {
            $format = 'cert';
        } elseif (substr($str, 0, 4) == 'ITSF' && $extname != 'txt') {
            $format = 'chm';
        } elseif (substr($str, 0, 4) == "\x2ERMF") {
            $format = 'rm';
        } elseif ($extname == 'sql') {
            $format = 'sql';
        } elseif ($extname == 'txt') {
            $format = 'txt';
        } elseif ($extname == 'flv') {
            $format = 'flv';
        } elseif ($extname == 'doc') {
            $format = 'doc';
        } elseif ($extname == 'docx') {
            $format = 'docx';
        } elseif ($extname == 'xls') {
            $format = 'xls';
        } elseif ($extname == 'xlsx') {
            $format = 'xlsx';
        } elseif ($extname == 'zip') {
            $format = 'zip';
        } elseif ($extname == 'rar') {
            $format = 'rar';
        }
    }

    if ($limit_ext_types && stristr($limit_ext_types, '|' . $format . '|') === false) {
        $format = '';
    }

    return $format;
}

/**
 * 将上传文件转移到指定位置
 *
 * @param string $file_name
 * @param string $target_name
 * @return blog
 */
function move_upload_file($file_name, $target_name = '') {
    if (function_exists("move_uploaded_file")) {
        if (move_uploaded_file($file_name, $target_name)) {
            @chmod($target_name, 0755);
            return true;
        } else if (copy($file_name, $target_name)) {
            @chmod($target_name, 0755);
            return true;
        }
    } elseif (copy($file_name, $target_name)) {
        @chmod($target_name, 0755);
        return true;
    }
    return false;
}

/**
 * 获得当前格林威治时间的时间戳
 *
 * @return  integer
 */
function gmtime() {
    return (time() - date('Z'));
}

if (!function_exists('array_remove_empty')) {

    /**
     * 移除内容为空的数字元素
     *
     * @param array $array
     *
     * @return array
     */
    function array_remove_empty($array) {
        if (!is_array($array))
            return $array;
        $newArray = array();
        foreach ($array as $key => $value) {
            if (str_replace(' ', '', $value) == '')
                continue;
            elseif (is_array($value))
                $newArray[$key] = array_remove_empty($value);
            else
                $newArray[$key] = $value;
        }
        return $newArray;
    }

}

/**
 * 相册上传
 *
 * @return  void
 */
function gallery_img($info_lm, $image_files, $image_descs) {
    $albumNum = 0;
    foreach ($image_descs AS $key => $img_desc) {
        /* 是否成功上传 */
        $flag = false;
        if (isset($image_files['error'])) {
            if ($image_files['error'][$key] == 0) {
                $flag = true;
            }
        } else {
            if ($image_files['tmp_name'][$key] != 'none') {
                $flag = true;
            }
        }

        if ($flag) {
            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
            if (isset($image_files['error'])) {
                $upload['error'] = $image_files['error'][$key];
            }
            $img_original = $GLOBALS['image']->upload_image($upload);
            if ($img_original === false) {
                msgbox($GLOBALS['image']->error_msg(), "BACK");
            }
            $img_url = $img_original;
            /* 把图片url 和 描述 添加到数据库中 */
            $sql = "INSERT INTO info_album(info_id, img_url, img_desc, wtime) VALUES($info_lm, '$img_url', '$img_desc', " . strtotime(date("Y-m-d H:i:s")) . ")";
            $GLOBALS['db']->query($sql, false);
            $albumNum++;
        }
    }

    return $albumNum;
}



function gallery_imgpro($info_lm, $image_files, $image_descs,$gallery_px) {
    $albumNum = 0;
    foreach ($image_descs AS $key => $img_desc) {
        /* 是否成功上传 */
        $flag = false;
        if (isset($image_files['error'])) {
            if ($image_files['error'][$key] == 0) {
                $flag = true;
            }
        } else {
            if ($image_files['tmp_name'][$key] != 'none') {
                $flag = true;
            }
        }

        if ($flag) {
            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
			
            if (isset($image_files['error'])) {
                $upload['error'] = $image_files['error'][$key];
            }
            $img_original = $GLOBALS['image']->upload_image($upload);
            if ($img_original === false) {
                msgbox($GLOBALS['image']->error_msg(), "BACK");
            }
            $img_url = $img_original;
            /* 把图片url 和 描述 添加到数据库中 */
            $sql = "INSERT INTO pro_album(pro_id, img_url, img_desc, px, wtime) VALUES($info_lm, '$img_url', '$img_desc', '{$gallery_px[$key]}', " . strtotime(date("Y-m-d H:i:s")) . ")";
            $GLOBALS['db']->query($sql, false);
            $albumNum++;
        }
    }

    return $albumNum;
}
function gallery_upimgpro($gallery_id,$gallery_updesc,$gallery_uppx) {
    foreach ($gallery_id AS $key => $val) {
        $sql = "update pro_album set img_desc='".$gallery_updesc[$key]."',px={$gallery_uppx[$key]} where id={$val}";
        $GLOBALS['db']->query($sql, false);
    } 
}



function case_imgpro($info_lm, $image_files, $image_descs) {
	
    $jbNums = 0;
    foreach ($image_descs AS $key => $img_desc) {
        /* 是否成功上传 */
        $flag3 = false;
        if (isset($image_files['error'])) {
            if ($image_files['error'][$key] == 0) {
                $flag3 = true;
            }
        } else {
            if ($image_files['tmp_name'][$key] != 'none') {
                $flag3 = true;
            }
        }

		
        if ($flag3) {
            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
            if (isset($image_files['error'])) {
                $upload['error'] = $image_files['error'][$key];
            }
            $img_original = $GLOBALS['image']->upload_image($upload);
            if ($img_original === false) {
                msgbox($GLOBALS['image']->error_msg(), "BACK");
            }
            $img_url = $img_original;
            /* 把图片url 和 描述 添加到数据库中 */
            $sql = "INSERT INTO pro_caseimg(pro_id, img_url, img_desc, wtime) VALUES($info_lm, '$img_url', '$img_desc', " . strtotime(date("Y-m-d H:i:s")) . ")";
            $GLOBALS['db']->query($sql, false);
			//echo "#########";
            $jbNums++;
        }
    }

    return $jbNums;
}






























function jb_imgpro($info_lm, $image_files, $image_descs) {
    $jbNum = 0;
    foreach ($image_descs AS $key => $img_desc) {
        /* 是否成功上传 */
        $flag2 = false;
        if (isset($image_files['error'])) {
            if ($image_files['error'][$key] == 0) {
                $flag2 = true;
            }
        } else {
            if ($image_files['tmp_name'][$key] != 'none') {
                $flag2 = true;
            }
        }	
        if ($flag2) {
            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
			
            if (isset($image_files['error'])) {
                $upload['error'] = $image_files['error'][$key];
            }
            $img_original = $GLOBALS['image']->upload_image($upload);
            if ($img_original === false) {
                msgbox($GLOBALS['image']->error_msg(), "BACK");
            }
            $img_url = $img_original;
            /* 把图片url 和 描述 添加到数据库中 */
            $sql = "INSERT INTO pro_jbimg(pro_id, img_url, img_desc, wtime) VALUES($info_lm, '$img_url', '$img_desc', " . strtotime(date("Y-m-d H:i:s")) . ")";
            $GLOBALS['db']->query($sql, false);
            $jbNum++;
        }
    }

    return $jbNum;
}









?>