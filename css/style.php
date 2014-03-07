<?php
   header('content-type: text/css');

  // $color = 'rgba(84,156,194,0.8)';
   $color = 'rgba(249,236,217,0.8)';
  // $url_cover = "url('../img/mountain.jpg')";
   $url_cover = "url('../img/beach.jpeg')";
   //$text ='#FFF';
   $text ='#000';
?>

@font-face {
    font-family: "Font Title";
    src: url('../font/BEARPAW_.ttf') format("opentype");;
}

@font-face {
    font-family: "Lato";
    src: url('../font/Lato-Reg.ttf') format("opentype");;
}

html {
	background-image:url('../img/background.jpg');
	background-size:cover;
}
html, body {
	font-family: 'Lato', sans-serif;
	font-weight: 400;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
    line-height: 1.1;
    color: inherit;
}


h1 {
font-family: 'Font Title', sans-serif;
  margin-top: 0px;
  font-size: 80px;
}

h2 {
  font-size: 30px;
}

h3 {
  font-size: 24px;
}

h4 {
  font-size: 18px;
}

h5 {
  font-size: 14px;
}

h6 {
  font-size: 12px;
}

a  {
	color:#154144;
	/*color:#549cc2;*/
}

a:hover {
	color:#296e73;
}

.widget {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-ms-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	color: #000000;
	background: rgba(240,240,240,0.7);
	margin-bottom: 20px;
	clear:both;
	box-shadow: 1px 1px 12px #000000;
	width: 100%;
}

.header {
	background-image: <?php echo $url_cover; ?>;
	background-size:100%;
}

.header img {
	-webkit-border-top-left-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-bottomleft: 5px;
	border-top-left-radius: 5px;
	border-bottom-left-radius: 5px;
	box-shadow: 1px 1px 12px #000000;
	cursor: pointer;
}

.left {
	float:left;
	margin-right : 20px;
	margin-top: 0px;
}
 
.widget table {
	width:100%;
}
.widget table tr td{
	/*padding: 8px;*/
}

#username {
    cursor: pointer;
}

.heading {
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	float:left;
	width:100%;
    color: <?php echo $text; ?>;
	/*background: rgba(50,115,121,0.8);*/
	background: <?php echo $color; ?>;
	padding-left: 20px;
   /* background-color: #327379;*/
}

.border-top{
	width: 100%;
}

.border-top tr td {
	border-bottom: 1px solid #ddd;
}


.navbar {
	width:100%;
	height:25px;
	margin-bottom: 20px;
	transition:  height 0.6s;	
}


.navbar:hover{
	height:70px;	
}
	

.navbar ul{
	list-style: none;
	height:100%;
	padding-left: 0;
	margin-top: 0px;
}

.navbar ul  li {
  display: inline-block;
  text-align:center;
  width:16%;
  height:100%;
  vertical-align: middle;
  border-right: 1px solid #ddd;
  padding-left: 0px;
  padding-right: 0px;
}

.navbar ul li:first-child {
  padding-left: 0;
  padding-right: 0;
  border-right:none;
  border-left:none;
  border-right: 1px solid #ddd;
}

.navbar ul li:last-child {
  border-right:none;
  border-left:none;
}

.active{
	color:#296e73;
}

.active a {
	color:#35aea5;
}

.row {
	height: 45px;
}
.row:hover{
	box-shadow: 0px 0px 2px 2px white;
}

li:hover{
 font-size: 50px;	
}

li{
 cursor: pointer;
 transition:  font-size 0.6s;	
 font-size: 20px;
}

.button {
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	-ms-border-radius: 2px;
	-o-border-radius: 2px;
	border-radius: 2px;
	color: <?php echo $text; ?>;
	background-color: <?php echo $color; ?>;;
	border-color: #285E8E;
	border: 1px solid transparent;
	text-align: center;
	vertical-align: middle;
	cursor: pointer;
	display: inline-block;
	padding: 8px 8px;
	margin:5px;
}

#div_transition{
    height: 550px;
}

#section{
    overflow: hidden;
    transition: height 0.6s;
    height: 91%;
}

#frame {
    overflow: auto;
    wordWrap:break-word;
    margin-top: -65px;
    position: fixed;
}

.info_ul{
    margin-top: -75px;
}
