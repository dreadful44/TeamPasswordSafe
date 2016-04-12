<?php
namespace AppBundle\EventListener;

use Avanzu\AdminThemeBundle\Event\ShowUserEvent;
use AppBundle\Entity\User;
use Symfony\Component\Translation\TranslatorInterface;

class ShowUserListener {

    protected $translator;
    protected $current_user;

    public function __construct(TranslatorInterface $translator, $token_storage)
    {
        $this->translator = $translator;
        if($token_storage->getToken()) {
            $user = $token_storage->getToken()->getUser();
            if ($user instanceof User) {
                $this->current_user = $user;
            }
        }
    }


    public function onShowUser(ShowUserEvent $event) {

        $user = $this->current_user;
        $event->setUser($user);

    }


}