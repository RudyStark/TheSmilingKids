// EVENEMENTS //

import { storage, addQuantity} from "./storage.js"
import { removeItemFromStorage, clearAllItemFromStorage, removeQuantity } from "./remove.js"

// Selecteurs
let btn = document.querySelectorAll(".add");
let btnRemove = document.querySelectorAll(".removeItem");
let btnClear = document.querySelectorAll(".ClearItems");
let btnLessQuantity = document.querySelectorAll(".lessQuantity");
let btnAddQuantity = document.querySelectorAll(".addQuantity");

//*************ADD PRODUCT IN LOCALSTORAGE*************// 
// Boutton pour ajouter un produit dans le localStorage
// On utilise un forEach .
function btnEvent() {
    btn.forEach(element => element.addEventListener('click', storage));
}
btnEvent();
////////////////////////////////////////////

//*************DELETE PRODUCT*************// 

// Boutton pour vider un produit(avec sa quantité) du localStorage.
function btnRemoveItem() {
    btnRemove.forEach(element => element.addEventListener('click', removeItemFromStorage));
}
btnRemoveItem();
////////////////////////////////////////////

//*************QUANTITY*************// 

// Boutton pour diminuer la quantité de l'article
function btnRemoveQuantity() {
    btnLessQuantity.forEach(element => element.addEventListener('click', removeQuantity));
}
btnRemoveQuantity();

// Boutton pour augmenter la quantité de l'article
function btnAddMoreQuantity() {
    btnAddQuantity.forEach(element => element.addEventListener('click', addQuantity));
}
btnAddMoreQuantity();
////////////////////////////////////////////

//*************CLEAR*************// 

// Boutton pour vider le localStorage/Panier
function btnClearAllItems() {
    btnClear.forEach(element => element.addEventListener('click',clearAllItemFromStorage ));
}
btnClearAllItems();
////////////////////////////////////////////
