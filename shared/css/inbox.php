<?php
	header("Content-type: text/css");
	
	//IE Fix
	// NOT FINISHED

	//cooooooookie
?>

body {
	text-align: center;
//	background-image: url("http://wallpaperscraft.com/image/background_leaf_light_bright_colors_18449_1920x1200.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
	padding-top: 11%;
	font-family: 'Patua One', cursive;
}

#container{
    margin: -5% auto;
    height: 100%;
    width: 80%;
    background-color: #ffffff;
}

.block, #header{
    transition-timing-function:ease-out;
    -moz-transition-timing-function:ease-out;
    -webkit-transition-timing-function:ease-out;
    -o-transition-timing-function:ease-out;
    transition-duration:.1s;
    -moz-transition-duration:.1s;
    -webkit-transition-duration:.1s;
    -o-transition-duration:.1s;
    overflow: hidden;
    border: 1px solid;
    width: 99%;
    height: 25px;
    margin: 0 auto;
    text-align: left;
    line-height: 25px;
    vertical-align: middle;
    font-size: 0.9vw;
    color: #000000;
}

#header {
    background-color: #000000;
    color: #ffffff;
    border: 0.5px solid;
}

.block:hover{
    transition-timing-function:ease-in;
    -moz-transition-timing-function:ease-in;
    -webkit-transition-timing-function:ease-in;
    -o-transition-timing-function:ease-in;
    transition-duration:.1s;
    -moz-transition-duration:.1s;
    -webkit-transition-duration:.1s;
    -o-transition-duration:.1s;
    cursor: pointer;
    background-color: #cccccc;
}

.block sender, #header sender{
    height: 100%;
    font-weight: bold;
    width: 20%;
    display: inline-block;
}

.block messageTitle, #header messageTitle{
    height: 100%;
    width: 70%;
    font-weight: bold;
    display: inline-block;
}

.block dateTime, #header dateTime{
    height: 100%;
    width: 9%;
    font-weight: bold;
    display: inline-block;
}

#sendButton {
    transition-timing-function:ease-out;
    -moz-transition-timing-function:ease-out;
    -webkit-transition-timing-function:ease-out;
    -o-transition-timing-function:ease-out;
    transition-duration:.2s;
    -moz-transition-duration:.2s;
    -webkit-transition-duration:.2s;
    -o-transition-duration:.2s;
    font-weight: bold;
    font-family: 'Patua One', cursive;
    height: 1.5em;
    width: 7vw;
    background-color: #ffffff;
    font-size: 0.9vw;
    border: 1px solid;
    text-align: center;
    margin: 0 0.4vw;
}
    
#sendButton:hover {
    transition-timing-function:ease-in;
    -moz-transition-timing-function:ease-in;
    -webkit-transition-timing-function:ease-in;
    -o-transition-timing-function:ease-in;
    transition-duration:.11s;
    -moz-transition-duration:.11s;
    -webkit-transition-duration:.11s;
    -o-transition-duration:.11s;
    cursor: pointer;
    background-color: #cccccc;
}