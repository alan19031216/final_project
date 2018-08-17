<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
      <h3>Search Result</h3>

      <div class="row">
        <div class="buttons">
          <button class="grid">Grid View</button>
          <button class="list">List View</button>
        </div>

        <div class="div col l6">
          <div class="card">
           <div class="card-image">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdDMVgUs6NBpsF2W8c7bx3tjGYyEGhmqGqcrnKIhX5GprCQaTJBQ" height="100%">
           </div>
           <div class="card-stacked">
             <div class="card-content">
               <span class="card-title">Card Title</span>
               <p>I am a very simple card. I am good at containing small bits of information.</p>
             </div>
             <div class="card-action">
               <a href="#">This is a link</a>
             </div>
           </div>
         </div>
        </div>

        <div class="div col l6">
          <div class="card">
           <div class="card-image">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdDMVgUs6NBpsF2W8c7bx3tjGYyEGhmqGqcrnKIhX5GprCQaTJBQ" height="100%">
           </div>
           <div class="card-stacked">
             <div class="card-content">
               <span class="card-title">Card Title</span>
               <p>I am a very simple card. I am good at containing small bits of information.</p>
             </div>
             <div class="card-action">
               <a href="#">This is a link</a>
             </div>
           </div>
         </div>
        </div>

      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
      //alert($('[id=search_result]').length);
    //$('#search_result').addClass('col s12 m6');
    $('button').click(function(e) {
      var length = $('[id=x1]').length;
      if ($(this).hasClass('grid')) {
        $('div .div').removeClass('col l12').addClass('col l6');
        $('div div .card').removeClass('card horizontal').addClass('card');
      } else if ($(this).hasClass('list')) {
        $('div .div').removeClass('col l6').addClass('col l12');
        $('div div .card').removeClass('card').addClass('card horizontal');
      }
    });
    })
    </script>
  </body>
</html>
