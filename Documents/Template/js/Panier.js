let tab = [];

function ajouterPanier(prod){

        console.log("Ajout au panier de : " + prod.nom);
        let objTrouve = tab.find(e => e.produit.nom === prod.nom);

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


        return tab;


}

function afficherPanier() {

}



export default {
    tab,
    ajouterPanier
}