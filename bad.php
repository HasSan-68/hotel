<!DOCTYPE html>
<html>
<head>
<style>
.container {
  position: relative;
  width: 50%;
}

.bad {
  display: block;
  width: 80%;
  height: auto;

  border-radius: 4px;
  padding: 5px;
  margin-top: 760px;
  margin-left: -300px;

  

}



.overlay {
    border-radius: 4px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 70%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
  margin-left: 500px;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

h1{
    margin-top:-1200px;
    margin-left: 630px;
    
}
</style>
</head>
<body>

<h1><strong>Rooms</strong></h1>

<div class="container">

  <img src="images/bad.jpg" alt="Avatar" class="bad">
 
  <div class="overlay">
    <div class="text">Super kamer is een  heerlijke kamer met een dikke, zachte bed.
    De kamer bevat een tv van 55 inch met een grote douch en bad.
    je kan booking voor een single, double en family<br></div>
  </div>
</div>

</body>
</html>
