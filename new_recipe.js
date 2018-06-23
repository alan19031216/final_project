var CCOUNT = 0;
var t, count;

function count1(){
  $("#stopwatch_div").hide();
  if (count == "" ) {
    //$('#timer').fadeIn();
  }
  else{
    CCOUNT = prompt("How many mint that you want countdown.(Only insert MINT!!)");
    if(isNaN(CCOUNT)){
        alert("Input only for number");
      }
      else if(CCOUNT > 180){
        alert("Connot bigger than 180mint");
      }
      else if(CCOUNT == null || CCOUNT == ""){
        $('#timer').hide();
      }
      else {
        CCOUNT = CCOUNT * 60;
        cdreset();
        $('#timer').fadeIn();
      }
  }
}// function count1



  function cddisplay() {
    document.getElementById('timespan').innerHTML = count + "Seconds";
  }

  function countdown() {
    // starts countdown
    cddisplay();
    if (count === 0) {
        // time is up
        var x = document.getElementById("myAudio");
        x.play();
        alert("Time up!!");
        $('#timer').fadeOut();
    } else {
        count--;
        t = setTimeout(countdown, 1000);
    }
  }

  function cdpause() {
    // pauses countdown
    clearTimeout(t);
  }

  function cdreset() {
    // resets countdown
    cdpause();
    count = CCOUNT;
    cddisplay();
  }

  //----------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------
  function stopwatch(){
    $("#timer").hide();
    $("#stopwatch_div").fadeIn();
  }
  function start1(){

    function add() {
      seconds++;
      if (seconds >= 60) {
          seconds = 0;
          minutes++;
          if (minutes >= 60) {
              minutes = 0;
              hours++;
          }
      }

      h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

      timer();
    }
    function timer() {
      t = setTimeout(add, 1000);
    }
    timer();


    /* Start button */
    start.onclick = timer;

    /* Stop button */
    stop.onclick = function() {
      clearTimeout(t);
    }

    /* Clear button */
    clear.onclick = function() {
      h1.textContent = "00:00:00";
      seconds = 0; minutes = 0; hours = 0;
    }
  }
