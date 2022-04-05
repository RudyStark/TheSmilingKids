// STORAGE //

import * as local from './localStorage.js'
import * as event from './events.js'

const cartList = local.getDatas("cartList");

// Fonction du stockage dans le local storage 
// events : accès à tous les évènements du click

function storage(event) {
    //On récupère les propriétés du produit
    //target est l'élément de l'objet event

    const productId = event.target.getAttribute("data-id");
    const productName = event.target.getAttribute("data-name");
    const productPrice = event.target.getAttribute("data-price");

    let isItemInStorage = local.isItemInStorage(productId, "cartList")
    
    //Si cartList n'est pas vide
    if (cartList && isItemInStorage) {
        
        //On insère la clé et les valeurs
        // incrémentation

        //On incrémente avec une fonction fléchée.
        const product = cartList.find(p => p.id === productId);
        product.qtt++;
        // window.location.reload();

    }
    //Si vide on push.
    else {
        cartList.push(local.addProduct(productId, productName, productPrice));
        window.location.reload();
    }

    //Enregistrement du nouveau panier pour remplacer l'ancien.
    local.setDatas('cartList', cartList)
}

// Fonction addQuantity qui nous permet de diminuer notre quantité.

function addQuantity(event){
    const productId = event.target.getAttribute('data-id');
    let isQuantityInStorage = local.isItemInStorage(productId, 'cartList');
    let index = cartList.find(item => item.id === productId);
    
    if(cartList && isQuantityInStorage && index.qtt>=1) {
        index.qtt++;
    }
    // enregistrement du nouveau panier
    local.setDatas('cartList', cartList);
    window.location.reload(); // rafraichissement du panier.
}


export { storage, addQuantity} 
