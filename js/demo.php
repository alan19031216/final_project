<!DOCTYPE html>
<html lang="en" dir="ltr">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//js.leapmotion.com/leap-0.4.1.js"></script>

  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">

      .remaining-content span {
        display:none;
      }
    </style>
    <h2>Shortened Text with Show More Link - Jquery</h2>

<div class='forum-content'>
    <div class='comments-space'>The Indian economy is the world's tenth-largest by nominal GDP and third-largest by purchasing power parity. Following market-based economic reforms in 1991, India became one of the fastest-growing major economies; it is considered a newly industrialised country. However, it continues to face the challenges of poverty, corruption, malnutrition, inadequate public healthcare, and terrorism. A nuclear weapons state and a regional power, it has the third-largest standing army in the world and ranks seventh in military expenditure among nations. India is a federal constitutional republic governed under a parliamentary system consisting of 28 states and 7 union territories. India is a pluralistic, multilingual, and multi-ethnic society. It is also home to a diversity of wildlife in a variety of protected habitats.</div>
</div>

<script type="text/javascript">
var showChar = 256;
var ellipsestext = "...";
var moretext = "See More";
var lesstext = "See Less";
$('.comments-space').each(function () {
  var content = $(this).html();
  if (content.length > showChar) {
      var show_content = content.substr(0, showChar);
      var hide_content = content.substr(showChar, content.length - showChar);
      var html = show_content + '<span class="moreelipses">' + ellipsestext + '</span><span class="remaining-content"><span>' + hide_content + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
      $(this).html(html);
  }
});

$(".morelink").click(function () {
  if ($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
  } else {
      $(this).addClass("less");
      $(this).html(lesstext);
  }
  $(this).parent().prev().toggle();
  $(this).prev().toggle();
  return false;
});
</script>

<script type="text/javascript">
javascript:(function(){
function runScript(){
      var e={};
      var t={};
      var n=document.body;
      Leap.loop(function(t){
              var r={};
              var i={};
              for(var s=0, o=t.pointables.length; s!=o; s++){
                      var u=t.pointables[s];
                      var a=e[u.id];
                      var f=n.scrollTop;
                      if(document.hasFocus()){
                              if(u.tipPosition[1]-325>0){n.scrollTop=f-=150}
                              if(u.tipPosition[1]-125>0){n.scrollTop=f-=5}
                              if(u.tipPosition[1]-90<0){n.scrollTop=f+=5}
                      }
              }
      })
}
if(typeof Leap=="undefined"){
      var jsCode=document.createElement("script");
      jsCode.setAttribute("src","https://js.leapmotion.com/0.2.0/leap.min.js");
      jsCode.onload=runScript;document.body.appendChild(jsCode)
}else{
      runScript()
}
}());
</script>
  </body>
</html>
