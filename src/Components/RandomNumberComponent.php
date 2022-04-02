<?php

namespace App\Components;

use Psr\Log\LoggerInterface;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
#[AsLiveComponent('random_number')]
class RandomNumberComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable:true)]
    public int $min = 0;
    
    #[LiveProp(writable:true)]
    public int $max = 1000;

    public function getRandomNumber(): int
    {
        return rand($this->min, $this->max);
    }

    #[LiveAction]
    public function resetMinMax(LoggerInterface $logger, #[LiveArg('min')] int $min, #[LiveArg('max')] int $max)
    {
        $this->min = $min;
        $this->max = $max;
        $logger->info("Min/Max were reset!");
    }
}
