<?php

Namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ApiKey{
    //! Permet $parameterBag permet d'utiliser les nouvelle variable .env defini dans service.yaml
    public function __construct(ParameterBagInterface $parameterBag){
        $this->parameterBag = $parameterBag;
    }

    public function getKey(){
        return $this->parameterBag->get('MJ_KEY');
    }
    public function getSecretKey(){
        return $this->parameterBag->get('MJ_SECRET_KEY');

    }
}