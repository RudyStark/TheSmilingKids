import * as local from './localStorage.js'

//PANIER
// Déclaration de variables 
const listTab = local.getDatas("cartList");
let totalPanier= 0;

listTab.forEach(products => {
  document.querySelector('.displayCart').insertAdjacentHTML('beforeend',
        `<div>
        
          <td>${products.name}</td>
          <td>${products.price} €</td>
          <td>${products.qtt}</td>
          <td>${products.qtt * products.price} €</td>
          <td><i class="fas fa-solid fa-minus lessQuantity" data-id="${products.id}"></i></td>
          <td><i class="fas fa-solid fa-plus addQuantity" data-id="${products.id}"></i></td>
          <td><i class="fas fa-trash-alt removeItem" data-id="${products.id}"></i></td>
        </tr>
        </div>`
    )
})

listTab.forEach(products => {
 
          totalPanier+=products.qtt * products.price
})
document.querySelector("p.totalPanier").insertAdjacentHTML('beforeend', totalPanier + '€')