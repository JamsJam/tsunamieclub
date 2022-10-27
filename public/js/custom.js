//! ========================
//?        variable
//! ========================

//? ===================
//*         Base
//? ===================

let burger = document.querySelector('#burgerNav');
let navMobile = document.querySelector('#navMobile');








//! ========================
//?        Fonction
//! ========================

//? ===================
//*         Base
//? ===================

function getNavMobile() {
    navMobile.classList.toggle("nav__mobile--active");
}
function hideNavMobile() {
    let w = window.innerWidth;
    if(navMobile.classList.contains('nav__mobile--active') && w>780  ){
        navMobile.classList.remove('nav__mobile--active');
    }
}