// web and mobile image
function preview_image(event)
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

function preview_image_mobile(event)
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image_moblie');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

// web tab
function openCity(evt, num) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(num).style.display = "block";
  evt.currentTarget.className += " w3-red";
}

// Check Passwords match or not -->
function checkPasswordMatch() {
    var password = $("#new_password").val();
    var confirmPassword = $("#password").val();
    var match = 'Passwords match';
    var notMatch = 'Passwords do not match!';
    var empty = 'Password cannot be empty';
    var result;

    if (password != confirmPassword){
      result = notMatch.fontcolor("red");
    }
    else if (password == "" || confirmPassword == "") {
      result = empty.fontcolor("blue");
    }
    else {
      result = match.fontcolor("#64dd17");
    }

    if (password != confirmPassword){
      $("#divCheckPasswordMatch").html(result);
        document.getElementById("button_update").disabled = true;
    }
    else if (password == "" || confirmPassword == "") {
      $("#divCheckPasswordMatch").html(result);
        document.getElementById("button_update").disabled = true;
    }
    else{
      $("#divCheckPasswordMatch").html(result);
      document.getElementById("button_update").disabled = false;
    }
}

//  Check Passwords match or not mobile -->

function checkPasswordMatch_mobile() {
    var password = $("#new_password_mobile").val();
    var confirmPassword = $("#password_mobile").val();
    var match = 'Passwords match';
    var notMatch = 'Passwords do not match!';
    var empty = 'Password cannot be empty';
    var result;

    if (password != confirmPassword){
      result = notMatch.fontcolor("red");
    }
    else if (password == "" || confirmPassword == "") {
      result = empty.fontcolor("blue");
    }
    else {
      result = match.fontcolor("#64dd17");
    }

    if (password != confirmPassword){
      $("#divCheckPasswordMatch_mobile").html(result);
        document.getElementById("button_update_mobile").disabled = true;
    }
    else if (password == "" || confirmPassword == "") {
      $("#divCheckPasswordMatch_mobile").html(result);
        document.getElementById("button_update_mobile").disabled = true;
    }
    else{
      $("#divCheckPasswordMatch_mobile").html(result);
      document.getElementById("button_update_mobile").disabled = true;
    }
}

// mobile tab
$(document).ready(function(){
  $('ul.tabs').tabs();
   $('ul.tabs').tabs('select_tab', 'tab_id');
  });
