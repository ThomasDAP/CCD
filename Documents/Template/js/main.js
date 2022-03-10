import {Produit} from './Produit.js';
import panier from './Panier.js';

window.addEventListener('load', (e) => {
    if (document.location.id !== 'cart') {
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


            });


        });

        let boutonPanier = document.querySelector('#button_cart');
        boutonPanier.addEventListener('click', (e) => {
            document.location.href = `/afficherPanier/${panier.tab}`;
        });
        }else {





        panier.tab.forEach((elem) => {
            let str = panier.afficherProduit(elem);
            let div = document.createElement('div');
            div.setAttribute('className', 'col mb-5');
            div.innerHTML = str;
        })
    }


});