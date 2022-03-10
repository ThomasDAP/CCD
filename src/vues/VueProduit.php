<?php

declare(strict_types=1);

namespace custumbox\vues;

use DOMDocument;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class VueProduit
{
    private array $tab;


    public function __construct(array $tab)
    {
        $this->tab = $tab;
    }


    public  function vueTousProduits() : string
    {
        $res = "";

        foreach ($this->tab as $prod){
            $textHtml = <<<END
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5"> 
                        <div class="card h-100">
            <!-- Product image-->" +
                            <img class="card-img-top" src="../Documents/SQL/images/produits/{$prod['id']}.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{$prod['titre']}</h5>
                                    <!-- Product price-->
                                    {$prod['prix']} €
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <h6>{$prod['description']}</h6>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="">View options</a></div>
                            </div>
                        </div>
                    </div>
END;
            $res = $res . $textHtml;
        }
        return $res;
    }





    public function render(int $select) : \DOMDocument
    {
        $content = "";
        switch ($select){
            case 1:
                $content = $this->vueTousProduits();
                break;
        }

        $html = file_get_contents('../../Documents/Template/index.html');
        $doc = new DOMDocument();
        $doc->loadHTML('../../Documents/Template/index.html');
        $aff = $doc->getElementById('AfficheurPrincipal');
        $aff->append($content);

        return $doc;
    }
}

