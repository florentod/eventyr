<?php

namespace App\EventSubscriber;

use App\Entity\User;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

	public static function getSubscribedEvents()
	{
		return [
			BeforeEntityPersistedEvent::class => ['setUserDateCreation'],

		];
	}

	public function setUserDateCreation(BeforeEntityPersistedEvent $event)
	{
		$entity = $event->getEntityInstance();

		if(!($entity instanceof User)) {
			return;
		}

		$now = new DateTime('now');
		$entity->setCreatedAt($now);
	}
}
