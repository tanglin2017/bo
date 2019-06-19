<?php
if (!defined('IN_GRCMS')) die('Hacking attempt');
/**
 * Page分页类
 * $page_size:每页显示记录数
 * $rs_total :总记录数

 * 语法:
 * new pages($page_size,$rs_total)
 
 * 可用返回值:
 * $offset		(limit便移量: limit 0,20)
 * $page_html	(分页连接: 首页 上一页 下一页 末页)
 */
class pages{
	var $page_size;
	var $rs_total;
	var $page_total;
	var $page;
	var $offset;
	var $url;
	var $pre_page	=	"page";
	var $page_info;
	var $page_html;

	function __construct($page_size = 20,$rs_total){
		$this->page_size	=	$page_size;
		$this->rs_total		=	$rs_total;
		$this->page_total	=	ceil($rs_total/$page_size);
		$this->page			=	$this->get_page();
		$this->offset		=	$this->get_offset();
		$this->url			=	$this->get_url();
		$this->page_info	=	$this->page_info();
		$this->page_html	=	$this->page_html($this->page_info);
	}
	
	//获取当前页码
	private function get_page(){
		$page	=	isset($_GET[$this->pre_page]) ? $this->f_GET($this->pre_page) : 1;
		
		$page	=	$page < 1 ? 1 : $page;
		
		$page	=	$page > $this->page_total ? $this->page_total : $page;
		
		return $page;
	}
	
	//获取当前页的记录偏移量
	private function get_offset(){
		$offset	=	" limit ".($this->page - 1) * $this->page_size.",".$this->page_size;
		return $offset;
	}
	
	//生成翻页html代码
	public function page_html($page_info){
		if (!empty($page_info['first'])){
			if ($this->page=="" || $this->page==1){
				$page_html	=	" <span class='page_first'>".$page_info['first']."</span> ";
			}
			else {
				$page_html	=	" <span class='page_first'><a href='?".$this->url['first']."'>".$page_info['first']."</a></span> ";
			}
		}//首页
		
		if (!empty($page_info['pro'])){
			if ($this->page=="" || $this->page==1){
				$page_html	.=	" <span class='page_pro'>".$page_info['pro']."</span> ";
			}
			else{
				$page_html	.=	" <span class='page_pro'><a href='?".$this->url['pro']."'>".$page_info['pro']."</a></span> ";
			}
		}//上一页
		
		if (!empty($page_info['next'])){
			if ($this->page >= $this->page_total){
				$page_html	.=	" <span class='page_next'>".$page_info['next']."</span> ";
			}
			else{
				$page_html	.=	" <span class='page_next'><a href='?".$this->url['next']."'>".$page_info['next']."</a></span> ";
			}
		}//下一页
		
		if (!empty($page_info['last'])){
			if ($this->page >= $this->page_total){
				$page_html	.=	" <span class='page_last'>".$page_info['last']."</span> ";
			}
			else{
				$page_html	.=	" <span class='page_last'><a href='?".$this->url['last']."'>".$page_info['last']."</a></span>";
			}
		}//最后一页
		
		if (!empty($page_info['t_page'])){
			$page_html	.=	" <span class='t_page'>".str_replace("%i%",$this->page_total,$page_info['t_page'])."</span> ";
		}
		if (!empty($page_info['page'])){
			$page_html	.=	" <span class='now_page'>".str_replace("%i%",$this->page,$page_info['page'])."</span> ";
		}
		if (!empty($page_info['r_total'])){
			$page_html	.=	" <span class='r_page'>".str_replace("%i%",$this->rs_total,$page_info['r_total'])."</span> ";
		}
		return $page_html;
		
	}
	//生成翻页html代码
	public function page_htmlsim($page_info){

		
		if (!empty($page_info['pro'])){
			if ($this->page=="" || $this->page==1){
				$page_html	=	" <span class='disable'>".$page_info['pro']."</span> ";
			}
			else{
				$page_html	=	" <span class='page_pro'><a href='?".$this->url['pro']."'>".$page_info['pro']."</a></span> ";
			}
		}//上一页
		if (!empty($page_info['page'])){
			$page_html	.=	" <span class='now_page'>".str_replace("%i%",$this->page,$page_info['page'])."</span> ";
		}
		if (!empty($page_info['next'])){
			if ($this->page >= $this->page_total){
				$page_html	.=	" <span class='disable'>".$page_info['next']."</span> ";
			}
			else{
				$page_html	.=	" <span class='page_next'><a href='?".$this->url['next']."'>".$page_info['next']."</a></span> ";
			}
		}//下一页


		return $page_html;
		
	}
	//获取当前 URL
	private function get_url(){
		$url_str		=	$_GET;
		$query_string	=	array();
		$str = '';
		foreach($url_str as $key=>$value){
			if ($key == $this->pre_page){
				continue;
			}
			$str	.=	$key."=".$value."&";
		}//end for
		$next_tmp	=	$this->page + 1;
		$pro_tmp	=	$this->page - 1;
		$last	=	$str.$this->pre_page."=".$this->page_total;
		$next	=	$str.$this->pre_page."=".$next_tmp;
		$pro	=	$str.$this->pre_page."=".$pro_tmp;
		$first	=	$str.$this->pre_page."=1";
		
		$query_string	=	array("pro"=>$pro,"next"=>$next,"last"=>$last,"first"=>$first);
		return $query_string;
	}
	
	public function page_info(){
		$arr	=	array(
			"first"	=>	"首页",
			"next"	=>	"下一页",
			"pro"	=>	"上一页",
			"last"	=>	"末页",
			"t_page"=>	" 共 %i% 页 ",
			"page"	=>	" 当前第 %i% 页 ",
			"r_total"=>	" 共 %i% 条 "
		);
		return $arr;
	}
        public function page_infosim(){
		$arr	=	array(
			"next"	=>	"下一页",
			"pro"	=>	"上一页",
			"page"	=>	" 第 %i% 页 "
		);
		return $arr;
	}
        public function page_infoen(){
		$arr	=	array(
			"first"	=>	"Home",
			"next"	=>	"Next page",
			"pro"	=>	"Page up",
			"last"	=>	"The last page",
			//"t_page"=>	" Tocal %i% page ",
			//"page"	=>	" Current %i% page ",
			//"r_total"=>	" Tocal %i% item "
		);
		return $arr;
	}
        //page_info()
	
	//过滤函数
	private function f_Get($GET){
		$GET	=	$_GET[$GET];
		return preg_replace("/[^0-9]+/i","",$GET);
	}
}
?>
