import {Produit} from './Produit.js';
import panier from './Panier.js';

window.addEventListener('load', (e) => {
    if (!document.querySelector('#PageIdCart')) {
        console.log("Heuss chargé");
        let btnAjoutProd = document.querySelectorAll('#ajoutPanier');
        console.log(btnAjoutProd);

        btnAjoutProd.forEach((elem) => {
            elem.addEventListener('click', (e) => {
                console.log("Heuss");
                let prId = e.target.getAttribute('prodId');
                let prTitre = e.target.getAttribute('prodTitre');
                let prCateg = e.target.getAttribute('prodCateg');
                let prDesc = e.target.getAttribute('prodDesc');
                let prPoids = e.target.getAttribute('prodPoids');
                let prod = new Produit(prId, prTitre, prCateg, prDesc, prPoids);

                panier.ajouterPanier(prod);
                console.log('Ajout au panier de : ' + prod.titre);



            });


        });

        let boutonPanier = document.querySelector('#button_cart');
        boutonPanier.addEventListener('click', (e) => {

            //document.location.href = `/afficherPanier`;
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', 'http://localhost:8080/afficherPanier');
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`tab=${panier.tab}`);
            });
    }
});


