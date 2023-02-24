<?php

class Rectangle
{

    private $w,$h,$pt;

    /**
     * @param $w
     * @param $h
     * @param Point $pt
     */
    public function __construct($w, $h,Point $pt)
    {
        $this->w = $w;
        $this->h = $h;
        $this->pt = $pt;
    }

    /**
     * @return mixed
     */
    public function getW()
    {
        return $this->w;
    }

    /**
     * @param mixed $w
     */
    public function setW($w)
    {
        $this->w = $w;
    }

    /**
     * @return mixed
     */
    public function getH()
    {
        return $this->h;
    }

    /**
     * @param mixed $h
     */
    public function setH($h)
    {
        $this->h = $h;
    }

    /**
     * @return mixed
     */
    public function getPt()
    {
        return $this->pt;
    }

    /**
     * @param mixed $pt
     */
    public function setPt($pt)
    {
        $this->pt = $pt;
    }

    public function surface(){
        return $this->h*$this->w;
    }

    public function interieur1(Point $point){
        if (($point->afficherY() >= $this->pt->afficherY()) && ($point->afficherY() <= ($this->pt->afficherY()+$this->h))
        && ($point->afficherX() >= $this->pt->afficherX()) && ($point->afficherX() <= ($this->pt->afficherX()+$this->w)))
        {
            return true;
        }
        return false;
    }

    public function interieur2(Rectangle $rectangle){
        if ($this->interieur1($rectangle->pt) && (($rectangle->pt->afficherX()+$rectangle->w) <= ($this->pt->afficherX()+$this->w))
        && (($rectangle->pt->afficherY()+$rectangle->h) <= ($this->pt->afficherY()+$this->h)))
        {
            return true;
        }
        return false;
    }

    public function egalite(Rectangle $rectangle){
        if (($this->pt->afficherX() == $rectangle->pt->afficherX()) && ($this->pt->afficherY() == $rectangle->pt->afficherY())
            && (($rectangle->w) == ($this->w)) && (($rectangle->h) == ($this->h)) )
        {
            return true;
        }
        return false;
    }

}