<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">
    input{
       padding: 10px;
       border: 1px solid #ddd;
       width: 50px;
       height: 50px;
       text-align: center;
       font-size: 30px;
       text-transform:uppercase;
     }
    </style>

    <form class="" action="test.php" method="post">
      <input  type="text" maxlength=1 id="1" required onkeyup="moveOnMax(this,'a')" />
      <input  type="text" maxlength=1 id="a" required onkeyup="moveOnMax(this,'b')" />
      <input  type="text" maxlength=1 id="b" required onkeyup="moveOnMax(this,'c')" />
      <input  type="text" maxlength=1 id="c" required onkeyup="moveOnMax(this,'d')"/>
      <input  type="text" maxlength=1 id="d" required onkeyup="moveOnMax(this,'e')" />
      <input  type="text" maxlength=1 id="e" required onkeyup="moveOnMax(this,'g')"/>
      <input  type="hidden" maxlength=1 id="g"/>
      <button type="submit" name="button">Submit</button>
    </form>

    <script type="text/javascript">
      moveOnMax = function (field, nextFieldID) {
        if (field.value.length == 1) {
            document.getElementById(nextFieldID).focus();
        }
        $(document).ready(function(){
          var a = document.getElementById("1").value;
          var b = document.getElementById("a").value;
          var c = document.getElementById("b").value;
          var d = document.getElementById("c").value;
          var e = document.getElementById("d").value;
          var f = document.getElementById("e").value;
          //alert(f);
          var final = a.concat(b,c,d,e,f).toUpperCase().toString();
          var text_code1 = text_code.toString();
          document.getElementById("text_c2").innerHTML = text_code1;
          document.getElementById("text_c1").innerHTML = final;

          if(text_code1 == final){
            document.getElementById("result").innerHTML = "t";
          }
          else {
            document.getElementById("result").innerHTML = "f";
          }
        });
      }
    </script>
  </body>
</html>
