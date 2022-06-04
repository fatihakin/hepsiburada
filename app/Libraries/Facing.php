<?php

namespace App\Libraries;

use App\Models\Rover;

class Facing
{
    private string $currentFacing;
    private string $command;

    private string $newFacing;

    /**
     * @param string $currentFacing
     * @param string $command
     */
    public function __construct(string $currentFacing, string $command)
    {
        $this->currentFacing = $currentFacing;
        $this->command = $command;
    }

    public function __invoke(){
        $this->newFacing = $this->findNewFacing($this->currentFacing);
        return $this;
    }

    /**
     * @return string
     */
    public function getNewFacing(): string
    {
        return $this->newFacing;
    }

    private function findNewFacing($facing){
        $newIndexEffect = 0;
        if ($this->command == 'L'){
            $newIndexEffect=-1;
        }else if ($this->command == 'R'){
            $newIndexEffect=1;
        }
        $mod = (collect(Rover::FACING_TYPES)->search($facing) + $newIndexEffect) % 4;
        if ($mod<0){
            $newIndex = $mod +4;
        }else{
            $newIndex = $mod;
        }
        return collect(Rover::FACING_TYPES)->get($newIndex);
    }
}
