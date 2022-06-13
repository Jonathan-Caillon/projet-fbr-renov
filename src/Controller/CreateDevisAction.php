<?php
// src/Controller/CreateDevisAction.php

namespace App\Controller;

use App\Entity\Devis;
use App\Repository\DevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
final class CreateDevisAction extends AbstractController
{
    public function __invoke(Request $request): Devis
    {
       
        $devis = $request->attributes->get('data');
       
        if (!$devis instanceof Devis) {
                throw new \RuntimeException('Devis attendu');
            }
       
        
            $devis->setFile($request->files->get('file'));
            $devis->setUpdatedAt(new \DateTime());
     
        return $devis;
    }
}