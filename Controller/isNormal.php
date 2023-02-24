<?php
include_once "../Model/Point.php";
include_once "../Model/Triangle.php";

if (isset($_GET['type']) && $_GET['type'] == "Normal"){
    $triangle = new Triangle(new Point($_GET['point1x'],$_GET['point1y']),
        new Point($_GET['point2x'],$_GET['point2y']),
        new Point($_GET['point3x'],$_GET['point3y']));

    $res1 = $triangle->rectangle($_GET['range']);
    $res2 = $triangle->equilateral($_GET['range']);
    $res3 = $triangle->rectangle($_GET['range']);

    if ($res1 == 0 && $res2 == 0 &&$res3 == 0){
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    ?>
    <script>
        window.location = "../View/Triangle/learn/LearnTriangles.html";
    </script>
    <?php
}

