<?php

require_once __DIR__.'/vendor/autoload.php';

$transport = new Swift_SpoolTransport(new \Demo\Swiftmailer\QueueSpool(
    \Enqueue\dsn_to_context('amqp://')
));

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['kotlyar.maksim@gmail.com' => 'Maksim'])
    ->setTo(['kotlyar.maksim@gmail.com' => 'Maksim'])
    ->setBody('Here is the message itself')
;

$result = $mailer->send($message);