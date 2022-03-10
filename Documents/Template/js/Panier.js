let tab = [];

function ajouterPanier(prod){

        console.log("Ajout au panier de : " + prod.titre);
        let objTrouve = tab.find(e => e.produit.titre === prod.titre);

        if (objTrouve) {
            let idxObj = tab.indexOf(objTrouve);
            tab[idxObj].quantite++;
        } else {

            let obj = {
                produit: prod,
                quantite: 1
            }
            tab.push(obj);

        }

        window.sessionStorage.setItem('tabPanier', JSON.stringify(tab));
        console.log(tab);
        console.log(JSON.parse(window.sessionStorage.getItem('tabPanier')));
        return tab;


}

function afficherProduit(prod){
    return `
        <div className="card h-100">
            <!-- Product image-->
            <img className="card-img-top" src="../Documents/SQL/images/produits/{$prod['id']}.jpg" alt="..."/>
            <!-- Product details-->
            <div className="card-body p-4">
                <div className="text-center">
                    <!-- Product name-->
                    <h5 className="fw-bolder">${prod.titre}</h5>
                    <!-- Product price-->
                    ${prod.poids} kg
                </div>
            </div>
            <!-- Product actions-->
            <div className="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <h6>${prod.desc}</h6>
            </div>
        </div>
  
    `;
}


export default {
    tab,
    ajouterPanier,
    afficherProduit
}