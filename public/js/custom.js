//! ==============================================
//?                     Variable
//! ==============================================

//? ===================
//*         Base
//? ===================

let burger = document.querySelector('#burgerNav');
let navMobile = document.querySelector('#navMobile');








//! ==============================================
//?                     Fonction
//! ==============================================

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


//? ===================
//*     Mail/new
//? ===================

// async function fetchAdherant() {
    
//     //?       =====================================================================
//     //!       =================  Etape 1 : requete Ajax -> fetch  =================
//     //?       =====================================================================
    
//         //recuperation des donnée sur une route contenant les information au format JSON
//         const requete = await fetch("{{path('app_json_adherant')}}",{
//             methode: 'GET'
//         })
//         // si la requete n'a pas aboutis....
//         if (!requete.ok) {
//             alert('un probleme est survenu')
//             console.error(requete.status)
//         //si la requette a reussi
//         } else{
//             //je stock la reponse dans une variable
//             let donnees = await requete.json()
    
    
//     //?       =====================================================================
//     //!       ================ Etape 2 : creation de chaque input  ================
//     //?       =====================================================================
     
//                 //pour chaque element (donnees contient tout les Adherants contenue en base de donnée )
//             donnees.forEach(adherant => {
//                 //Creation d'une div
//                 // let checkbox = document.createElement('div')
//                 let card = document.createElement('a')

//                 //definition d'une class pour cette element
//                 card.setAttribute('class','fetchAdherant')
//                 card.setAttribute('id',adherant.id)
//                 card.setAttribute('href','#')
                
//                 //insertion d'HTML dans la div créé au dessus
//                 card.innerHTML = "<img src=\"\" alt=\"\" class=\"pp\"><div class=\"fetchAdherant__item\"><p class=\"fetchAdherant__item--nom\">"+adherant.nom+"</p><p class=\"fetchAdherant__item--prenom\">"+adherant.prenom+"</p></div><div class=\"fetchAdherant__item\"><p class=\"fetchAdherant__item--licence\">"+adherant.licence+"</p></div>";
                
//                 //Insertion des informations de l'adherant dans les proprieter de la div (sera utile pour le filtre des adherants)
//                 card.setAttribute('nom',adherant.nom)
//                 card.setAttribute('prenom',adherant.prenom)
//                                                 //! Condition ternaire: (si condition) ? (alors) : (sinon) 
//                 card.setAttribute('competition',adherant.roleClub ? adherant.roleClub.competiteur : "null")
//                 card.setAttribute('kata',adherant.roleClub ? adherant.roleClub.kata : 'null' )
//                 card.setAttribute('arbitre',adherant.roleClub ? adherant.roleClub.arbitre : 'null' )
//                 card.setAttribute('pole',adherant.roleClub ? adherant.roleClub.pole : 'null' )
//                 card.setAttribute('professeur',adherant.roleClub ? adherant.roleClub.professeur : 'null' )
//                 card.setAttribute('staf',adherant.roleClub ? adherant.roleClub.staf : 'null' )
//                 card.setAttribute('commissaire',adherant.roleClub ? adherant.roleClub.comissaire : 'null' )

//                 //Insertion de la div dans le code HTML en tant que dernier enfant de 'container'
//                 container.append(card)
                
//             });
    
    
//     //?       =====================================================================
//     //!       =============== Etape 3 : liaison avec le formulaire  ===============
//     //?       =====================================================================
    
    
//                     //selection de toute les divs créer
//             let cards = document.querySelectorAll('.fetchAdherant') 
//             cards.forEach(card => {
//                 //Si une des checkboxs est cochée ou décochée...
//                 card.addEventListener('click',(e)=>{
//                     e.preventDefault()
//                     //recuperation de l'id de la checkbox concerné
//                     let cardId = e.target.getAttribute('id')
//                     card.classList.toggle('fetchAdherant--active')
//                     //selection de l'input du formulaire correspondant a cet ID
//                     let inputform = document.querySelector('#mail_destinataire_'+cardId)
//                     //Cocher ou decocher l'la checkbox du forme selon l'etat de la checkbox creer
//                     if( !inputform.checked){
//                         inputform.setAttribute('checked','checked')
                        
//                     }
//                     else{
//                         inputform.removeAttribute('checked')
//                     }
//                 })
//             });
//         };
//     };