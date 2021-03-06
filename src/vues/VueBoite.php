<?php

declare(strict_types=1);

namespace custumbox\vues;

use DOMDocument;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class VueBoite
{
    private array $tab;


    public function __construct(array $tab)
    {
        $this->tab = $tab;
    }



    public function vueUnProduit($prod): string {

        if (isset($prod)) {
            return <<<END
        
                    <div class="col mb-5"> 
                        <div class="card h-100">
            <!-- Product image-->
                            <img class="card-img-top" src="Documents/SQL/images/produits/{$prod['id']}.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{$prod['titre']}</h5>
                                    <!-- Product price-->
                                    {$prod['poids']} kg
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <h6>{$prod['description']}</h6>
                            </div>
                        </div>
                    </div>
           
           

END;
        }else {
            return "";
        }

    }


    public function getHeader() : string {
        return <<<END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>L'Atelier 17.91</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" id="PageIdCart"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="Documents/Template/css/styles.css" rel="stylesheet" />
    <link href="Documents/Template/css/stylePerso.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/recupererProduits">L'atelier 17.91</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
               
               
                   
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                    </ul>
                </li>
            </ul>

                <button class="btn btn-outline-dark" >
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                </button>

        </div>
    </div>
</nav>
<!-- Header-->

<!-- Section-->
<script type="module" src="Documents/Template/js/main.js"></script>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5" id="AfficheurProduits">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
END;

    }


    public function getFooter(): string {
        return <<<END
</div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<!--<script src="../../Documents/Template/js/scripts.js"></script>-->

<script type="module">
import panier from 'Documents/Template/js/Panier.js'

let tab = JSON.parse(window.sessionStorage.getItem('tabPanier'));
tab.forEach((elem) => {
            console.log("Element : " + elem.titre);
            let str = panier.afficherProduit(elem);
            let div = document.createElement('div');
            div.setAttribute('classeName', 'col mb-5');
            div.innerHTML = str;

            let aff = document.querySelector('#AfficheurProduits');
            aff.appendChild(div);
        })
</script>
</body>

</html>

END;

    }
    public function render(int $select) : string
    {


        var_dump($this->tab);
        $content = "";

        switch ($select){
            case 1:

                    foreach ($this->tab as $prod) {
                        $content .= $this->vueUnProduit($prod);

                }
                break;
        }

        $res = $this->getHeader();

        return $res . $content . $this->getFooter();
    }
}

