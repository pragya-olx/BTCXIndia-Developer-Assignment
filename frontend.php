<style type="text/css">
/*body and container*/
* {
	margin: 0;
	padding: 0;
	
}


#container {
	width: 1000px;
	overflow: hidden;
	margin: 50px auto;
	background: white;
}

/*header*/
header {
	width: 800px;
	margin: 40px auto;
}

header h1 {
	text-align: center;
	font: 100 60px/1.5 Helvetica, Verdana, sans-serif;
}

header p {
	font: 100 15px/1.5 Helvetica, Verdana, sans-serif;
	text-align: justify;
}

/*photobanner*/

.photobanner {
	height: 233px;
	width: 3550px;
	margin-bottom: 80px;
}

.photobanner img {
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.photobanner img:hover {
	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-o-transform: scale(1.1);
	-ms-transform: scale(1.1);
	transform: scale(1.1);
	cursor: pointer;

	-webkit-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
	box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
}


/*keyframe animations*/
.first {
	-webkit-animation: bannermove 30s linear infinite;
	-moz-animation: bannermove 30s linear infinite;
	-ms-animation: bannermove 30s linear infinite;
	animation: bannermove 30s linear infinite;
}

@keyframes "bannermove" {
 0% {
    margin-left: 0px;
 }
 100% {
    margin-left: -2125px;
 }

}

@-moz-keyframes bannermove {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }

}

@-webkit-keyframes "bannermove" {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }

}

@-ms-keyframes "bannermove" {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }

}

@-o-keyframes "bannermove" {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }

}

</style>
<?php

$dirname = "";
$images = glob($dirname."*.jpg");
echo '<div id="container">
    <header>
	    <h1></h1>
    </header>
    
    <!-- Each image is 350px by 233px -->
    <div class="photobanner"> ';
	$i =0;
	foreach($images as $image) {
		if($i == 0)
			echo '<img src="'.$image.'" class="first" height="350px" width="233px"/>';	
		else
			echo '<img src="'.$image.'" height="350px" width="233px"/>';
		$i++;
	}
      echo '</div>
</div>';

?>