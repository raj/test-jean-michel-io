<?php

namespace App\EventSubscriber;

use Carbon\Carbon;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class TimestampSubscriber implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [
            'prePersist',
            'preUpdate',
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        $now = new Carbon();

        if (method_exists($entity, 'setCreatedAt')) {
            $entity->setCreatedAt($now);
        }

        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt($now);
        } else {
            $this->setPropertyValue($entity, 'updatedAt', $now);
        }
    }

    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $entity = $args->getObject();
        $now = new Carbon();

        if (method_exists($entity, 'setCreatedAt')) {
            $entity->setCreatedAt($now);
        } else {
            $this->setPropertyValue($entity, 'createdAt', $now);
        }

        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt($now);
        } else {
            $this->setPropertyValue($entity, 'updatedAt', $now);
        }
    }

    private function setPropertyValue(object $entity, string $propertyName, mixed $value): void
    {
        $reflection = new \ReflectionClass($entity);

        if (!$reflection->hasProperty($propertyName)) {
            return;
        }

        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($entity, $value);
    }
}
