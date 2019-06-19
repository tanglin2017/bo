function delLine(obj)
{
    $(obj).parent().parent().remove();
}


function addImg()
{
   N = $('#img_list');
   if(N.find("tr").length <= 10){
       N.append("<tr><td><a  href=\"javascript:;\" onclick=\"delLine(this)\">[删除]</a><input placeholder=\"图片标题\" name=\"gallery_desc[]\" type=\"text\" size=\"40\"  class=\"dfinput\"><input type=\"file\" name=\"gallery_file[]\" class=\"dfinput55\">排序<input value=\"100\" name=\"gallery_px[]\" type=\"text\" style=\"width: 50px;\" class=\"dfinput\"></td></tr>");
   } else {
	  alert('图片数量不能超过10张,一次最多添加10张');   
  }
}

function addImga()
{
   N = $('#img_list2');
   if(N.find("tr").length <= 10){
       N.append("<tr><td><a  href=\"javascript:;\" onclick=\"delLine(this)\">[-]</a></td><td>图片描述 <input name=\"jb_desc[]\" type=\"text\" size=\"40\" maxlength=\"80\"></td><td>上传图片 <input type=\"file\" name=\"jb_file[]\"></td></tr>");
   } else {
	  alert('图片数量不能超过10个,一次最多添加10个');   
  }
}

function addImg3()
{
   N = $('#img_list3');
   if(N.find("tr").length <= 10){
       N.append("<tr><td><a  href=\"javascript:;\" onclick=\"delLine(this)\">[-]</a></td><td>图片描述 <input name=\"case_desc[]\" type=\"text\" size=\"40\" maxlength=\"80\"></td><td>上传图片 <input type=\"file\" name=\"case_file[]\"></td></tr>");
   } else {
	  alert('图片数量不能超过10个,一次最多添加10个');   
  }
}

function addImgs()
{
   N = $('#img_list');
   if(N.find("tr").length <= 10){
       N.append("<tr><td><a  href=\"javascript:;\" onclick=\"delLine(this)\">[-]</a></td><td>图片描述 <input name=\"gallery_desc[]\" type=\"text\" size=\"40\" maxlength=\"80\"></td><td>上传小图文件 <input type=\"file\" name=\"gallery_file[]\"></td><td>上传大图文件 <input type=\"file\" name=\"gallery_files[]\"></td></tr>");
   } else {
	  alert('图片数量不能超过10个,一次最多添加10个');   
  }
}
function addlinks(){
    N = $('#links_list');
     if(N.find("tr").length <= 4){
        N.append("<tr><td><a  href=\"javascript:;\" onClick=\"delLine(this)\">[-]</a></td><td>标题 <input name=\"linknames[]\" type=\"text\" size=\"30\" ></td><td>链接 <input name=\"linkurls[]\" type=\"text\" size=\"60\" maxlength=\"100\"></td></tr>"); 
     } else {
	  alert('在线购买链接地址一次最多添加4条');   
  }
}
function dropAlbumImg(table,id,nodeobj)
{
$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "del_album_img", db_table:table, id : id},
	  success: function(data){  
	     if(data.error == 0)
		 {
			$(nodeobj).parent().remove();
		 } 
		 //alert(data);	  
	  },
	  dataType: "JSON"
	});
}

function jbimg(table,id,nodeobj)
{
$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "del_jb_img", db_table:table, id : id},
	  success: function(data){  
	     if(data.error == 0)
		 {
			$(nodeobj).parent().remove();
		 } 
		 //alert(data);	  
	  },
	  dataType: "JSON"
	});
}


function caseimg(table,id,nodeobj)
{
$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "del_case_img", db_table:table, id : id},
	  success: function(data){  
	     if(data.error == 0)
		 {
			$(nodeobj).parent().remove();
		 } 
		 //alert(data);	  
	  },
	  dataType: "JSON"
	});
}