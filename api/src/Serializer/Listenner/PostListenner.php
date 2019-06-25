<?php

namespace App\Serializer\Listenner;


use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\ObjectEvent;

class PostListenner implements EventSubscriberInterface{
   public static function getSubscribedEvents()
    {
       // TODO: Implement getSubscribedEvents() method.
        return [
          [
              'event'=>Events::POST_SERIALIZE,
              'format'=>'json',
              'class'=>'App\Entity\Post',
              'method'=>'onPostSerialize',
          ]
        ];
    }

    public static function onPostSerialize(ObjectEvent $event){
        // Possibilité de récupérer l'objet qui a été sérialisé
        $object = $event->getObject();

        $date = new \Datetime();
        // Possibilité de modifier le tableau après sérialisation
        $event->getVisitor()->addData('delivered_at', $date->format('l jS \of F Y h:i:s A'));
    }
}