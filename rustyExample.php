 <html>
 <head>
 </head>
 <body>
 This text right here (or any HTML I want to write)
 will show up just before the PHP code stuff.
 <p></p>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 Name: <input type="text" name="name">
 <span class="error">* <?php echo $nameErr;?></span>
 <br><br>
 E-mail: <input type="text" name="email">
 <span class="error">* <?php echo $emailErr;?></span>
 <br><br>
 Website: <input type="text" name="website">
 <span class="error">* <?php echo $websiteErr;?></span>
 <br><br>
 Comment: <textarea name="comment" rows="5" cols="40"></textarea>
 <span class="error">* <?php echo $commentErr;?></span>
 <br><br>
 Gender: <input type="radio" name="gender" value="female">female
 <input type="radio" name="gender" value="male">male
 <span class="error">* <?php echo $genderErr;?></span>
 <input type="submit" name="submit" value="Submit">
 </form>
 <?php
 //vars
 $nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
 $name = $email = $gender = $comment = $website = "";
 $t = date ("H");
 $x = 5;
 $y = 4;
 $z = 4.5;
 $w = "rusty";
 $v = true ;
 $cars = array("Ford","Toyota","VW");
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 	if (empty($_POST['name'])) {
 		$nameErr = "Name is required";
 	} else {
	 	$name = test_input($_POST['name']);
	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$nameErr = "Only letters and white space allowed"; 
		}
	}
	if (empty($_POST['email'])) {
		$emailErr = "Email is required";
	} else {
	 	$email = test_input($_POST['email']);
	  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	$emailErr = "Invalid email format"; 
    	}
	}
	if (empty($_POST['website'])) {
		$websiteErr = "Website is required";
	  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      	$websiteErr = "Invalid URL"; 
	    }
	} else {
	 	$website = test_input($_POST['website']);
	}
	if (empty($_POST['comment'])) {
		$commentErr = "Comment is required";
	} else {
	 	$comment = test_input($_POST['comment']);
	}
	if (empty($_POST['gender'])) {
		$genderErr = "Gender is required";
	} else {
	 	$gender = test_input($_POST['gender']);
	}
 }
 
 function test_input($data) {
 	$data = trim($data);
 	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 } 	
 
 echo "<div class='menu'>";
 include 'menu.php';
 echo "</div>";
 
 //greeting
 date_default_timezone_set('Greenwich');
 $date = date('H:i:s a', time());
 if ($t < "16") {
 	echo "<h2>It's still day time! Currently: $date</h2>";
 }
 
 //basic maths
 echo "5 + 4 = " . ($x + $y);
 print ("<p>");
 
 //basic function
 function rustyTest() {
 	$x = 10; //only declared within this function
 	echo "Variable x inside this function is : $x<p>";
 }
 rustyTest();
 
 //basic function2
 function rustyTest2() {
 	global $x, $y;
 	$y = $x + $y;
 }
 rustyTest2();
 echo "Function maths, answer = $y <p>";
 
 //static keyword
 function rustyTest3() {
    static $x = 0;
    echo $x;
    $x++;
 }
 rustyTest3();
 rustyTest3();
 rustyTest3();
 rustyTest3();
 echo "<p>";

 //var_dump function returns the data type and value
 var_dump($x,$z,$w,$v,$cars);
 echo "<p>";

 //output string length
 echo "Output the sting length of Hello world " . strlen("Hello world!");
 echo "<br />";
 echo "Output the number of words in the string Hello World! " . str_word_count("Hello world!");
 echo "<br />";
 echo "Revers a string " . strrev("Hello world!");
 echo "<br />";

 // shows path from the root folder
 print $_SERVER['PHP_SELF'];

 // "print" any HTML code we want the browser to follow
 print ("<p>");
 print ("I am the BeerFuelledDude");
 print ("<p>");

 /* This next "phpinfo" business outputs exactly
  how your version of PHP is configured.
 */
 include 'footer.php';
 ?>
 </p>
 </body>
 </html>
