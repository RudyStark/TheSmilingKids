// LOCAL STORAGE

// Récupération du contenu

function getDatas(key) {
    return JSON.parse(localStorage.getItem(key)) || [];
}

// Enregistrement dans le localstorage de la clé et de ses valeurs

function setDatas(key, datas) {
    const dataConvert = JSON.stringify(datas)
    localStorage.setItem(key, dataConvert)
}

// Vérification de l'id s'il éxiste dans le localstorage

function isItemInStorage(idProd, key) {
    //récupérer mon local storage
    const datas = getDatas(key);
    //parcourir le LS
    let found = false;
    for(let i = 0; i < datas.length; i++){
        if(idProd === datas[i].id){
            found = true;
            break;
        }
    }
    return found;
}

// Construction de notre produit qui sera ajouté dans le localstorage

function addProduct(id, name, price) {
    return {id: id, name: name, price: price, qtt: 1}
}


// Dans LocalStorage : suppression de tout les articles
function clearData(key) {
    return localStorage.removeItem(key);
}



// Export de nos fonctions.
export {getDatas, setDatas, isItemInStorage, addProduct, clearData}