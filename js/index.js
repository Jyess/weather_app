/**
 * Retourne le contenu du cookie donné en paramètre.
 * @param {string} cname 
 */
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return false;
}

//indique quelle page est active
if (window.location.pathname === "/reglages") {
    document.getElementById("reglages").classList.add("active")
} else if (window.location.pathname === "/accueil" || window.location.pathname === "/") {
    document.getElementById("accueil").classList.add("active")
}

/* page ajouter widget */
if (document.getElementById("ville") !== null) {
    let inputVille = document.getElementById("ville");

    //pour afficher le message d'erreur "ville existe pas" ou "ville déjà ajoutée"
    if (getCookie("error")) {
        inputVille.classList.add("is-invalid");
    } else if (getCookie("duplicate")) {
        inputVille.classList.add("is-invalid");
    }

    //enlève le message d'erreur quand on commence à écrire une nouvelle ville
    inputVille.addEventListener("keyup", function() {
        inputVille.classList.remove("is-invalid");
    })
}
/* page ajouter widget */

/* page reglages */
if (window.location.pathname === "/reglages") {
    let celsius = document.getElementById("ce");
    let fahrenheit = document.getElementById("fa");

    celsius.addEventListener("click", function() {
        window.location.replace("/change_unit?unit=metric");
    })

    fahrenheit.addEventListener("click", function() {
        window.location.replace("/change_unit?unit=imperial");
    })
}
/* page reglages */