<?php
include_once "../Model/Point.php";
include_once "../Model/Triangle.php";

if (isset($_GET['type']) && $_GET['type'] == "TriangleRectangle"){
    if ($_GET['point4x']!=0) {
        echo 0;
    } 
    else {
        $triangle = new Triangle(
            new Point($_GET['point1x'], $_GET['point1y']),
            new Point($_GET['point2x'], $_GET['point2y']),
            new Point($_GET['point3x'], $_GET['point3y'])
        );

        echo $triangle->rectangle($_GET['range']);
    }
}
else{
    ?>
    <script>
        window.location = "../View/Triangle/learn/LearnTriangles.html";
    </script>
    <?php
}

