<!DOCTYPE html>
<?php
include 'connect_test.php'; //connect the connection page

if(empty($_SESSION)){ // if the session not yet started
  session_name('newLogin');
  session_set_cookie_params(2*7*24*60*60);
  session_start();
}

if(!isset($_SESSION['username'])) { //if not yet logged in
  header("Location: login.php");// send to login page
  exit;
}
?>

<html>
  <head>
    <title>New Message</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/mainCSS.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
      $(function() {
      $("#datepicker").datepicker();
      });
      $(document).ready(function() {
      $('#message').validate({
      rules: { 
      title: {
      required: true 
      }
      },
      messages: { 
      title: { 
      required: "* Please enter your old password." 
      }
      }
      });
      });

      function init() {
        message = document.getElementById("message");
      }
    </script>
  </head>
  <body onload="init();
                document.getElementById('title').focus();">
    <!--<?php
       echo "<form id='message' name='message' method='post' action='mess_helper.php?seller=".$_GET['seller']."&isbn=".$_GET['isbn']."'>";
      ?>-->
    <form id="message" name="message" method="post" action="mess_helper.php?seller=<?php echo $_GET['seller']; ?>&isbn=<?php echo $_GET['isbn']; ?>">
      <!--To:<input type="text" name="to" /><br>-->
     <p>Please enter a time and date for a trade meeting.</p>
      Meeting Date:<input type="text" name="date" id="datepicker" />
      at: <select name="time" id="time">
        <!-- Taken from http://snipplr.com/view/28563/
             original by user alvincrespo-->
        <option value=""></option>
        
        <option value="6:00 AM">6:00 AM</option>
        <option value="6:15 AM">6:15 AM</option>
        <option value="6:30 AM">6:30 AM</option>
        <option value="6:45 AM">6:45 AM</option>

        <option value="7:00 AM">7:00 AM</option>
        <option value="7:15 AM">7:15 AM</option>
        <option value="7:30 AM">7:30 AM</option>
        <option value="7:45 AM">7:45 AM</option>
	
        <option value="8:00 AM">8:00 AM</option>
        <option value="8:15 AM">8:15 AM</option>
        <option value="8:30 AM">8:30 AM</option>
        <option value="8:45 AM">8:45 AM</option>

        <option value="9:00 AM">9:00 AM</option>
        <option value="9:15 AM">9:15 AM</option>
        <option value="9:30 AM">9:30 AM</option>
        <option value="9:45 AM">9:45 AM</option>
	
        <option value="10:00 AM">10:00 AM</option>
        <option value="10:15 AM">10:15 AM</option>
        <option value="10:30 AM">10:30 AM</option>
        <option value="10:45 AM">10:45 AM</option>

        <option value="11:00 AM">11:00 AM</option>
        <option value="11:15 AM">11:15 AM</option>
        <option value="11:30 AM">11:30 AM</option>
        <option value="11:45 AM">11:45 AM</option>
	
        <option value="12:00 PM">12:00 PM</option>
        <option value="12:15 PM">12:15 PM</option>
        <option value="12:30 PM">12:30 PM</option>
        <option value="12:45 PM">12:45 PM</option>
	
        <option value="1:00 PM">1:00 PM</option>
        <option value="1:15 PM">1:15 PM</option>
        <option value="1:30 PM">1:30 PM</option>
        <option value="1:45 PM">1:45 PM</option>
	
        <option value="2:00 PM">2:00 PM</option>
        <option value="2:15 PM">2:15 PM</option>
        <option value="2:30 PM">2:30 PM</option>
        <option value="2:45 PM">2:45 PM</option>
	
        <option value="3:00 PM">3:00 PM</option>
        <option value="3:15 PM">3:15 PM</option>
        <option value="3:30 PM">3:30 PM</option>
        <option value="3:45 PM">3:45 PM</option>
	
        <option value="4:00 PM">4:00 PM</option>
        <option value="4:15 PM">4:15 PM</option>
        <option value="4:30 PM">4:30 PM</option>
        <option value="4:45 PM">4:45 PM</option>
	
        <option value="5:00 PM">5:00 PM</option>
        <option value="5:15 PM">5:15 PM</option>
        <option value="5:30 PM">5:30 PM</option>
        <option value="5:45 PM">5:45 PM</option>
	
        <option value="6:00 PM">6:00 PM</option>
        <option value="6:15 PM">6:15 PM</option>
        <option value="6:30 PM">6:30 PM</option>
        <option value="6:45 PM">6:45 PM</option>
	
        <option value="7:00 PM">7:00 PM</option>
        <option value="7:15 PM">7:15 PM</option>
        <option value="7:30 PM">7:30 PM</option>
        <option value="7:45 PM">7:45 PM</option>
	
        <option value="8:00 PM">8:00 PM</option>
        <option value="8:15 PM">8:15 PM</option>
        <option value="8:30 PM">8:30 PM</option>
        <option value="8:45 PM">8:45 PM</option>
	
        <option value="9:00 PM">9:00 PM</option>
        <option value="9:15 PM">9:15 PM</option>
        <option value="9:30 PM">9:30 PM</option>
        <option value="9:45 PM">9:45 PM</option>
	
        <option value="10:00 PM">10:00 PM</option>
        <option value="10:15 PM">10:15 PM</option>
        <option value="10:30 PM">10:30 PM</option>
        <option value="10:45 PM">10:45 PM</option>
	
        <option value="11:00 PM">11:00 PM</option>
        <option value="11:15 PM">11:15 PM</option>
        <option value="11:30 PM">11:30 PM</option>
        <option value="11:45 PM">11:45 PM</option>
      </select><br><br>
     <textarea rows="15" cols="75" name="textm" id="textm"></textarea><br>
     <input type="submit" name="submit" value="Send Message" /><br>    
    </form>
  </body>
</html>
