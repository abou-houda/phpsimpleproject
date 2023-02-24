<?php
include_once "../Model/Point.php";
include_once "../Model/Triangle.php";

if (isset($_GET['type']) && $_GET['type'] == "Equaliteral"){
    $triangle = new Triangle(new Point($_GET['point1x'],$_GET['point1y']),
        new Point($_GET['point2x'],$_GET['point2y']),
        new Point($_GET['point3x'],$_GET['point3y']));

    echo $triangle->equilateral($_GET['range']);
}
else{
    ?>
    <script>
        window.location = "../View/Triangle/learn/LearnTriangles.html";
    </script>
    <?php
}

