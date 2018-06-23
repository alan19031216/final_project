<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <title></title>
  </head>
  <body>


    <a onclick="myFunctionPrint()"><div class="col s6 green waves-effect waves-light btn-large">

    <script type="text/javascript">
       function myFunctionPrint() {
          var mywindow = window.open('', 'PRINT', 'height=400,width=600');
          mywindow.document.write('<html><head><body>');
          mywindow.document.write(document.getElementById("print").innerHTML);
          mywindow.document.write('</body></html>');
          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close();
       }
    </script>
  </body>
</html>
