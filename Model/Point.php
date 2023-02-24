<?php

class Point
{

    private $x,$y;

    public function __construct($x,$y){
        $this->x = $x;
        $this->y = $y;
    }

    public function afficherX(){
        return $this->x;
    }

    public function afficherY(){
        return $this->y;
    }

    public function distance(Point $pt2){
        return sqrt(pow(($this->x)-($pt2->x),2)+(pow(($this->y)-($pt2->y),2)));
    }

}