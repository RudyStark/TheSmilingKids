//Déclaration de variables 
const data = localStorage.getItem("cartList");
console.log(typeof(data));
let checkBtn = document.getElementById("check");
// //ajax sous format vanilla 
function donate() {
    fetch('donation-order.php?cart='+data)

        //récupérer et retourne une promesse contenant, en réponse, un objet (de type Response).
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(error => console.log("Erreur : " + error));
}

checkBtn.addEventListener("click", donate);
