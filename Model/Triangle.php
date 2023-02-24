<?php

class Triangle
{

    private $p1,$p2,$p3;

    public function __construct(Point $p1,Point $p2,Point $p3){
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->p3 = $p3;
    }

    /**
     * @return Point
     */
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * @param Point $p1
     */
    public function setP1($p1)
    {
        $this->p1 = $p1;
    }

    /**
     * @return Point
     */
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * @param Point $p2
     */
    public function setP2($p2)
    {
        $this->p2 = $p2;
    }

    /**
     * @return Point
     */
    public function getP3()
    {
        return $this->p3;
    }

    /**
     * @param Point $p3
     */
    public function setP3($p3)
    {
        $this->p3 = $p3;
    }

    public function isocele($range){
        if (
            (
                ($this->p1->distance($this->p2) <= $this->p1->distance($this->p3) + (100-$range) && ($this->p1->distance($this->p2) >= $this->p1->distance($this->p3) - (100- $range)) )
            )
            ||
            (
                ($this->p1->distance($this->p2) <= $this->p2->distance($this->p3) + (100-$range) && ($this->p1->distance($this->p2) >= $this->p2->distance($this->p3) - (100-$range)) )
            )
            ||
            (
                   ($this->p2->distance($this->p3) <= $this->p1->distance($this->p3) + (100-$range) && ($this->p2->distance($this->p3) >= $this->p1->distance($this->p3) - (100-$range) ))
            )
        )
        {
            return 1;
        }
        return 0;
    }

    public function equilateral($range){
        if (
            ($this->p1->distance($this->p2) <= $this->p1->distance($this->p3) + (100-$range) && $this->p1->distance($this->p2) >= $this->p1->distance($this->p3) - (100-$range))
            && ($this->p1->distance($this->p2) <= $this->p2->distance($this->p3) +(100-$range) && $this->p1->distance($this->p2) >= $this->p2->distance($this->p3) -(100-$range))
            && ($this->p2->distance($this->p3) <= $this->p1->distance($this->p3) +(100-$range) && $this->p2->distance($this->p3) >= $this->p1->distance($this->p3) -(100-$range))
        )
        {
            return 1;
        }
        return 0;
    }

    public function rectangle($range){
        $p1p2 = $this->p1->distance($this->p2);
        $p1p3 = $this->p1->distance($this->p3);
        $p2p3 = $this->p2->distance($this->p3);

        if ($p1p2 > $p1p3 && $p1p2 > $p2p3){
            if (pow($p1p2,2) <= (pow($p1p3,2)+pow($p2p3,2))+((100-$range)*200) && pow($p1p2,2) >= (pow($p1p3,2)+pow($p2p3,2))-((100-$range)*200)){
                return 1;
            }
        }
        if ($p1p3 > $p1p2 && $p1p3 > $p2p3){
            if (pow($p1p3,2) <= (pow($p1p2,2)+pow($p2p3,2))+((100-$range)*200) && pow($p1p3,2) >= (pow($p1p2,2)+pow($p2p3,2))-((100-$range)*200)){
                return 1;
            }
        }
        if ($p2p3 > $p1p2 && $p2p3 > $p1p3){
            if (pow($p2p3,2) <= (pow($p1p2,2)+pow($p1p3,2))+((100-$range)*200) && pow($p2p3,2) >= (pow($p1p2,2)+pow($p1p3,2))-((100-$range)*200)){
                return 1;
            }
        }
            return 0;
    }

}