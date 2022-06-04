<?php

namespace App\Libraries;

class Area
{
    private int $xMin =0;
    private int $xMax;
    private int $yMin =0;
    private int $yMax;

    /**
     * @param int $xMax
     * @param int $yMax
     */
    public function __construct(int $xMax, int $yMax)
    {
        $this->xMax = $xMax;
        $this->yMax = $yMax;
    }


    /**
     * @return int
     */
    public function getXMin(): int
    {
        return $this->xMin;
    }

    /**
     * @param int $xMin
     */
    public function setXMin(int $xMin): void
    {
        $this->xMin = $xMin;
    }

    /**
     * @return int
     */
    public function getXMax(): int
    {
        return $this->xMax;
    }

    /**
     * @param int $xMax
     */
    public function setXMax(int $xMax): void
    {
        $this->xMax = $xMax;
    }

    /**
     * @return int
     */
    public function getYMin(): int
    {
        return $this->yMin;
    }

    /**
     * @param int $yMin
     */
    public function setYMin(int $yMin): void
    {
        $this->yMin = $yMin;
    }

    /**
     * @return int
     */
    public function getYMax(): int
    {
        return $this->yMax;
    }

    /**
     * @param int $yMax
     */
    public function setYMax(int $yMax): void
    {
        $this->yMax = $yMax;
    }

    public function findNewCoordinatesByFacing($facing, $x, $y)
    {
        if ($facing == 'N') {
            if ($y < $this->getYMax()){
                $y++;
            }
        } else if ($facing == 'E') {
            if ($x < $this->getXMax()){
                $x++;
            }
        } else if ($facing == 'S') {
            if ($y > $this->getYMin()){
                $y--;
            }
        } else if ($facing == 'W') {
            if ($x > $this->getXMin()){
                $x--;
            }
        }

        return [$x, $y];
    }




}
