function delLine(obj)
{
    $(obj).parent().parent().remove();
}

function addLine()
{
   N = $('#img_lists');
   if(N.find("tr").length <= 20){
       N.append("<tr class=\"tdbg\"><td ><a  href=\"javascript:;\" onClick=\"delLine(this)\" title=\"删除\">[-]</a></td><td ><strong>课程代码：</strong><input type=\"text\" name=\"courseid[]\" size=\"20\" /></td><td ><strong>课程名称：</strong><input type=\"text\" name=\"coursename[]\" size=\"50\"/></td></tr> ");
   } else {
	  alert('条数超过20条,一次最多添加20条');   
  }
}
function addLineb()
{
   N = $('#img_lists');
   if(N.find("tr").length <= 30){
       N.append("<tr ><td height=\"27\" ><a  href=\"javascript:;\" onClick=\"delLine(this)\" title=\"删除\">[-]</a></td><td width=\"242\" ><strong>课程代码：</strong><input type=\"text\" name=\"courseid[]\" size=\"10\" /></td><td colspan=\"3\"><strong>课程名称：</strong><input type=\"text\" name=\"coursename[]\" size=\"40\"  style=\"height:20px;\"/></td></tr>");
   } else {
	  alert('条数超过30条,一次最多添加30条');   
  }
}
function addLines()
{
   N = $('#img_lists');
   if(N.find("tr").length <= 20){
       N.append("<tr class=\"tdbg\"><td ><a  href=\"javascript:;\" onClick=\"delLine(this)\" title=\"删除\">[-]</a></td><td ><strong>课程代码：</strong><input type=\"text\" name=\"courseid[]\" size=\"20\" /></td><td ><strong>课程名称：</strong><input type=\"text\" name=\"coursename[]\" size=\"30\"/></td><td width=\"236\" ><strong>合格时间：</strong><input type=\"text\" name=\"passtime[]\" size=\"20\" onfocus=\"WdatePicker({dateFmt:'yyyy-MM-dd'})\" class=\"Wdate\" readonly/></td><td width=\"260\" ><strong>成绩：</strong><input type=\"text\" name=\"score[]\" size=\"10\"/></td></tr>");
        } else {
	  alert('条数超过20条,一次最多添加20条');   
  }
}
function dropAlbumImg(table,id,nodeobj)
{
$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "del_family_info", db_table:table, id : id},
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