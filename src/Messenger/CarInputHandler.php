<?php

namespace App\MessageHandler;

use App\Dto\SomeInput;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CarInputHandler implements MessageHandlerInterface
{
    public function __invoke(SomeInput $message)
    {
        dump($message);
    }
}

