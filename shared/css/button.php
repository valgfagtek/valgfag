<?php
	header("Content-type: text/css");
	
	//IE Fix
	// NOT FINISHED
?>

input[type=button] {
    transition-timing-function:ease-in;
    -moz-transition-timing-function:ease-in;
    -webkit-transition-timing-function:ease-in;
    -o-transition-timing-function:ease-in;
    transition-duration:.1s;-moz-transition-duration:.15s;
    -webkit-transition-duration:.1s;-o-transition-duration:.15s;
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 9;
  -moz-border-radius: 9;
  border-radius: 9px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  border: solid #1f628d 2px;
  text-decoration: none;
}

input[type=button]:hover {
    transition-timing-function:ease-in;
    -moz-transition-timing-function:ease-in;
    -webkit-transition-timing-function:ease-in;
    -o-transition-timing-function:ease-in;
    transition-duration:.1s;-moz-transition-duration:.15s;
    -webkit-transition-duration:.1s;-o-transition-duration:.15s;
    background: #3cb0fd;
    background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
    background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
    background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
    background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
    background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
    text-decoration: none;
}
