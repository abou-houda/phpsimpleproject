<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/Draw.css">
  <title>Draw Shapes</title>
  
</head>
<body>
  <header>
    <div class="container">
      <div class="nav">
          <h2><span><i class="fa fa-trophy" aria-hidden="true"></i></span> MATKIDDO</h2>
        <nav>
          <ul>
            <li><a href="../../Triangle/learn/LearnTriangles.html">Triangle</a> </li>
            <li><a href="../learn/LearnRectangle.html">Rectangle</a></li>
              <li><a href="../../game/Jouer.html">Jouer</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  
  <div class="wrapper">
      <canvas id="canvas" style="background: url('../../sources/25348.jpg');background-size: cover" class="equation"></canvas>
  </div>
  <button id="try_again" style="cursor: pointer">Réessayer</button>
  <script src="../../js/jquery.min.js"></script>
<script src="../../js/drawRectanglePageScript.js" sync></script>
  <script>
      drawContent();
  </script>
</body>
</html>