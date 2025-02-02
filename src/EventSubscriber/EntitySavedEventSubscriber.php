<?php

namespace App\EventSubscriber;

use App\Entity\Movie;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Event\EntitySavedEvent;

class EntitySavedEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
        Events::postPersist,
        ];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $movie = $args->getObject();

        if ($movie instanceof Movie) {
        $event = new EntitySavedEvent($movie);

        $args->getObjectManager()->getEventManager()->dispatchEvent($event);
        }
    }
}