 <html>
 <head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 </head>
 <body>
 This text right here (or any HTML I want to write)
 will show up just before the PHP code stuff.
 <p>
 <?php
 //vars
 $t = date ("H");
 $x = 5;
 $y = 4;
 $z = 4.5;
 $w = "rusty";
 $v = true ;
 $cars = array("Ford","Toyota","VW");
 
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
