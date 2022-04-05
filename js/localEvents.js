// EVENEMENTS //

import { storage, addQuantity } from "./storage.js"

// Selecteurs
let btn = document.querySelectorAll(".add");

//*************ADD PRODUCT IN LOCALSTORAGE*************// 
// Boutton pour ajouter un produit dans le localStorage
// On utilise un forEach .
function btnEvent() {
    btn.forEach(element => element.addEventListener('click', storage));
}
btnEvent();
////////////////////////////////////////////
//*************ADD DONATOR INFORMATIONS IN LOCALSTORAGE*************// 
// Boutton pour ajouter les informations du donateur dans le localStorage
// On utilise un forEach .
function btnEvent() {
    btn.forEach(element => element.addEventListener('click', storage));
}
btnEvent();