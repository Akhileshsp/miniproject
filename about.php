<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 250px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}


button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>	
</head>
<body style="background-color:lightgrey;">

<script>
$(function() {
    var BV = new $.BigVideo();
    BV.init();
    BV.show('http://vjs.zencdn.net/v/oceans.mp4');
});
</script>

<script>
var i = 0;
var txt = 'Hi , This is Akhilesh Patil from TechieProgrammer ! Hope all you guys are fine with your work , Thank You ';
var speed = 150;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
</script>

<h2 style="text-align:center">My Profile</h2>

<div onmouseover="typeWriter()" >
<div class="card">
<p class="text-primary" id="demo"></p>
  <img src="akhilesh.png" alt="Akhilesh" style="width:100%">
  <h1>Akhilesh Patil</h1>
  <p class="title">CMO & CO-Founder, TechieProgrammer </p>
  <p>Bangalore Institute Of Technology</p>
  <div style="margin: 24px 0;">
    <a href="https://www.instagram.com/akhileshpatil/"><i class="fa fa-instagram"></i></a> 
    <a href="https://twitter.com/Akhileshpatil99"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.linkedin.com/in/akhilesh-patil-665504112/"><i class="fa fa-linkedin"></i></a>  
    <a href="https://www.facebook.com/akhilesh.patil.355"><i class="fa fa-facebook"></i></a> 
	<a href="https://github.com/Akhileshsp"><i class="fa fa-github"></i></a>
 </div>
 <p><button>Contact</button></p>
</div>
</div>
</body>


</html>