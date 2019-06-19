/*
* seajs.config.pc
*/
// 网站根路径
seajs.root = document.getElementById("seajsConfig") && document.getElementById("seajsConfig").getAttribute("domain") || '';

seajs.config({
	base: seajs.root + "/resources/modules",
	paths: {
		"js" : seajs.root + "/resources/web/js",
	},
	alias: {
		"jquery" 	  : "jquery/1/jquery.js",
	},
	preload:['manifest','seajs-localcache'],
});