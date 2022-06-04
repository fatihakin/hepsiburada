<?php

namespace App\Libraries;

class Area
{
    private $xMin =0;
    private $xMax =0;
    private $yMin =0;
    private $yMax =0;
    private $facing;

    /**
     * @param int $xMin
     * @param int $xMax
     * @param int $yMin
     * @param int $yMax
     */
    public function __construct(int $xMin, int $xMax, int $yMin, int $yMax)
    {
        $this->xMin = $xMin;
        $this->xMax = $xMax;
        $this->yMin = $yMin;
        $this->yMax = $yMax;
//        $this->facing = $facing;
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




}
