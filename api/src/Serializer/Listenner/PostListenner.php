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
        $visitor = $event->getVisitor();

    }
}