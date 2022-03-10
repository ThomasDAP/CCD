function Produit(idP, title, categ, price, poidsP){
    this.id = idP;
    this.titre = title;
    this.categorie = categ;
    this.prix = price;
    this.poids = poidsP;
}


function afficherProduit(prod){
    let afficheur = document.querySelector('#AfficheurProduits');
    let divProd = document.createElement('div');

    let str = `<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../Documents/SQL/images/produits/${prod.id}.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${prod.titre}</h5>
                                    <!-- Product price-->
                                    ${prod.prix} €
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <h6>${prod.description}</h6>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="">View options</a></div>
                            </div>
                        </div>
                    </div>`;

}