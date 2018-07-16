// JavaScript Document

 function getNames(obj,name,tij)
 { 
  var p = document.getElementById(obj);
  var plist = p.getElementsByTagName(tij);
  var rlist = new Array();
  for(i=0;i<plist.length;i++)
  {
   if(plist[i].getAttribute("name") == name)
   {
    rlist[rlist.length] = plist[i];
   }
  }
  return rlist;
 }

  function butong_net(obj,name)
  {
   var p = obj.parentNode.getElementsByTagName("li");
   var p1 = getNames(name,"f","div");
   for(i=0;i<p1.length;i++)
   {
    if(obj==p[i])
    {
     p[i].className = "s";
     p1[i].className = "dis";
    }
    else
    {
     p[i].className = "";
     p1[i].className = "undis";
    }
   }
  }