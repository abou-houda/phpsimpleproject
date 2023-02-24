<?php
include_once "../Model/Point.php";
include_once "../Model/Triangle.php";

if (isset($_GET['type']) && $_GET['type'] == "Rectangle" && isset($_GET['point4x'])){

    $dist1 = (new Point($_GET['point1x'],$_GET['point1y']))->distance(new Point($_GET['point2x'],$_GET['point2y']));
    $dist2 = (new Point($_GET['point2x'],$_GET['point2y']))->distance(new Point($_GET['point3x'],$_GET['point3y']));

    if (($dist1 <= ($dist2 + 5)) && ($dist1 >= ($dist2 - 5))){
        echo 0;
    }
    else{
        $triangle1 = new Triangle(new Point($_GET['point1x'],$_GET['point1y']),
            new Point($_GET['point3x'],$_GET['point3y']),
            new Point($_GET['point4x'],$_GET['point4y']));

        $triangle2 = new Triangle(new Point($_GET['point2x'],$_GET['point2y']),
            new Point($_GET['point3x'],$_GET['point3y']),
            new Point($_GET['point4x'],$_GET['point4y']));

        $res1 = $triangle1->rectangle($_GET['range']);
        $res2 = $triangle2->rectangle($_GET['range']);

        if ($res1 == 1 && $res2 == 1){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
else{
    ?>
    <script>
        window.location = "../View/Triangle/learn/LearnTriangles.html";
    </script>
    <?php
}

