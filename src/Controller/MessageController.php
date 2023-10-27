<?php

namespace App\Controller;

use App\Message\SmsNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;


#[Route('/msg')]
class MessageController extends AbstractController
{

    #[Route('/', name: 'app_msg', methods: ['GET'])]
    public function index(MessageBusInterface $bus)
    {
        $bus->dispatch(new SmsNotification('Look! I created a message!'));
    }

}
