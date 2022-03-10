<?php

declare(strict_types=1);

namespace mywishlist\vue;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class VueCreation
{
    public array $tab;
    private \Slim\Container $container;

    public function __construct(array $tab, \Slim\Container $cont)
    {
        $this->tab = $tab;
        $this->container = $cont;
    }


    








    public function render(int $select) : string{
        $content = "";
        switch ($select){

        }

        $url_listes = $this->container->router->pathFor('listeDesListes');
        $url_accueil = $this->container->router->pathFor('accueil');
        $url_item1 = $this->container->router->pathFor('affUnItem', ['id' => 1]);
        $creer_liste = $this->container->router->pathFor('traiteFormListe');
        //$url_nosecure1 = $this->container->router->pathFor('partUneListe', ['token' => 'nosecure1']);
        $url_liste1 = $this->container->router->pathFor('affUneListe', ['token'=> 'nosecure1']);
        $url_modification = $this->container->router->pathFor('traiteFormModifListe', ['token_edition' => '17b2f1c3']);
        $url_creationItem = $this->container->router->pathFor('traiteFormItem');
        $url_itemModif1 = $this->container->router->pathFor('traiteFormModifItem', ['id' => '1']);
        $html = <<<END
        <!DOCTYPE html>
            <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="$url_accueil/web/css/style.css">
                </head>
                <body>
                    <h1>My wishlist</h1>
                    <nav id="NavMenu">
                    <ul>
                    <li><a href="$url_accueil">Accueil</a> </li>
                    <li><a href="$url_listes">Les listes</a> </li>
                    <li><a href="$url_item1 ">Item 1</a> </li>
                    <li><a href="$url_liste1">La liste 1</a></li>
                    <li><a href="$creer_liste ">Creer une liste</a> </li>
                    <li><a href="$url_modification">Modification de la liste 1</a> </li>
                    <li><a href="$url_creationItem">Creation d'un item</a></li>
                    <li><a href="$url_itemModif1">Modification du premier item</a></li>
                    </ul>
                    </nav>
                    <br/>
                    <div class="content">
                        $content
                    </div>
                </body>
            <html>
END;

        return $html;
    }
}

