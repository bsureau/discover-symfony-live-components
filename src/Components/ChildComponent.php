<?php

namespace App\Components;

use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent('child')]
class ChildComponent
{
    use DefaultActionTrait;
    
    #[LiveProp]
    public int $randomNumber;
}
