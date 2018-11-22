<?php
include 'html_php/new_hearder.php';
?>
<title>Category</title>
  <style media="screen">
    th {
      font-weight: bold;
      font-size: 1em;
      text-align: left;
      color: #185875;
      background-color: #DCDCDC;
    }
    td {
      font-weight: normal;
      font-size: 1em;
      box-shadow: 2px 2px 3px -2px #0E1119;
    }
    td:hover {
    background-color: #FFF842;
    color: #403E10;
    font-weight: bold;

    box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
    transform: translate3d(6px, -6px, 0);

    transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
    transition-timing-function: line;
    }
  </style>

  <br>
  <div class="row">
    <div class="col l12 m12 s12">
      <table class="centered">
        <thead>
          <th colspan="5">Meet</th>
        </thead>
        <tbody>
          <tr>
            <td>Pork</td>
            <td>Fish</td>
            <td>Chicken</td>
            <td>Lamb</td>
            <td>Duck</td>
          </tr>

          <tr>
            <td>Rabbit</td>
            <td>Clam meat</td>
            <td>Venison</td>
            <td>Goose</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col 112 m12 s12"> <br> </div>
    <div class="col l6 m12 s12">
      <table class="centered">
        <thead>
          <th colspan="4">Seafood</th>
        </thead>

        <tbody>
          <tr>
            <td>Shrimp</td>
            <td>River snail</td>
            <td>Squid</td>
            <td>Conch</td>
          </tr>
          <tr>
            <td>Sea cucumber</td>
            <td>Kelp</td>
            <td>Seaweed</td>
            <td>Octopus</td>
          </tr>
          <tr>
            <td>Cuttlefish</td>
            <td>Scallop</td>
            <td>Oyster</td>
            <td>Clams</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col l6 m12 s12">
      <table class="centered">
        <thead>
          <th colspan="4">Fungus</th>
        </thead>

        <tbody>
          <tr>
            <td>Mushroom</td>
            <td>Tea tree mushroom</td>
            <td>Pleurotus</td>
            <td>Hericium</td>
          </tr>
          <tr>
            <td>Dictyophora</td>
            <td>Straw mushroom</td>
            <td>Flammulina</td>
            <td>Tricholoma</td>
          </tr>
          <tr>
            <td>Pleurotus eryngii</td>
            <td>Tremella</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col 112 m12 s12"> <br> </div>

    <div class="col l6 m12 s12">
      <table class="centered">
        <thead>
          <th colspan="4">Taste</th>
        </thead>

        <tbody>
          <tr>
            <td>Spicy</td>
            <td>Sweet and sour</td>
            <td>Curry</td>
            <td>Hot and sour</td>
          </tr>
          <tr>
            <td>Dry pot</td>
            <td>Braised</td>
            <td>Mustard</td>
            <td>Barbecue</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col l6 m12 s12">
      <table class="centered">
        <thead>
          <th colspan="4">Cuisine</th>
        </thead>

        <tbody>
          <tr>
            <td>Mexican Food</td>
            <td>Swedish Food</td>
            <td>Latvian Food</td>
            <td>Italian Food</td>
          </tr>
          <tr>
            <td>Spanish Food</td>
            <td>American Food</td>
            <td>Scottish Food</td>
            <td>British Food</td>
          </tr>
          <tr>
            <td>Thai Food</td>
            <td>Japanese Food</td>
            <td>Chinese Food</td>
            <td>Indian Food</td>
          </tr>
          <tr>
            <td>Russian Food</td>
            <td>Canadian Food</td>
            <td>Jewish Food</td>
            <td>Polish Food</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col 112 m12 s12"> <br> </div>

    <div class="col l12 m12 s12">
      <table class="centered">
        <thead>
          <th colspan="10">Fruit</th>
        </thead>
        <tbody>
          <tr>
            <td>Lemon</td>
            <td>Pineapple</td>
            <td>Pomegranate</td>
            <td>Coconut</td>
            <td>Banana</td>
            <td>Mango</td>
            <td>Grape</td>
            <td>Apple</td>
            <td>Durian</td>
            <td>Blueberry</td>
          </tr>

          <tr>
            <td>Longan</td>
            <td>Papaya</td>
            <td>Watermelon</td>
            <td>Yellow Peach</td>
            <td>Cherry</td>
            <td>Orange</td>
            <td>Hawthorn</td>
            <td>Plum</td>
            <td>Litchi</td>
            <td>Apricot</td>
          </tr>

          <tr>
            <td>Cantaloupe</td>
            <td>Pear</td>
            <td>Orange</td>
            <td>Peach</td>
            <td>Sugar cane</td>
            <td>Avocado</td>
            <td>Cantaloupe</td>
            <td>Dragon fruit</td>
            <td>Passion fruit</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script type="text/javascript">
    $('td').click(function(e) {
       var txt = $(e.target).text();
       //alert(txt);
       window.location.href = "search.php?search="+txt+"&num=1";
       console.log(txt);
    });
  </script>
<?php
  include 'html_php/footer.php';
?>
