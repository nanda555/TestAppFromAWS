(function(){tinymce.PluginManager.requireLangPack("gcrcloudstorage");tinymce.create("tinymce.plugins.GcrcloudstoragePlugin",{init:function(a,b){a.addCommand("mceGcrcloudstorage",function(){a.windowManager.open({file:b+"/dialog.htm",width:350+parseInt(a.getLang("gcrcloudstorage.delta_width",0)),height:250+parseInt(a.getLang("gcrcloudstorage.delta_height",0)),inline:1},{plugin_url:b})});a.addButton("gcrcloudstorage",{title:"gcrcloudstorage.desc",cmd:"mceGcrcloudstorage",image:b+"/img/gcrcloudstorage.png"});a.onNodeChange.add(function(d,c,e){c.setActive("gcrcloudstorage",e.nodeName=="IMG")})},createControl:function(b,a){return null},getInfo:function(){return{longname:"Gcrcloudstorage plugin",author:"Ron Stewart, Globalclassroom Inc.",authorurl:"http://globalclassroom.us",infourl:"http://globalclassroom.us",version:"1.0"}}});tinymce.PluginManager.add("gcrcloudstorage",tinymce.plugins.GcrcloudstoragePlugin)})();