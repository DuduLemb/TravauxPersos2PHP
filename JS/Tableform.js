 // JavaScript pour afficher la fenêtre modale
 var modal = document.getElementById("myModal");
 var btn = document.getElementById("myBtn");

 btn.onclick = function() {
   modal.style.display = "block";
 }

 window.onclick = function(event) {
   if (event.target == modal) {
     modal.style.display = "none";
   }
 }
 // JavaScript pour envoyer les données du formulaire au serveur
 var form = document.getElementById("product-form");
 form.addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    var productName = document.getElementById("product-name").value;
    var productPrice = document.getElementById("product-price").value;
    var productQuantity = document.getElementById("product-quantity").value;

    // Création de l'objet de données à envoyer
    var data = {
        productName: productName,
        productPrice: productPrice,
        productQuantity: productQuantity
    };
    // Envoi des données via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./save-product.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            alert("Produit enregistré avec succès !");
            form.reset(); // Réinitialise le formulaire
            modal.style.display = "none"; // Ferme la fenêtre modale
            transfererTableau();
        }
    };
    xhr.send(JSON.stringify(data));
});


window.addEventListener("load", transfererTableau);

/*function transfererTableau() {
  // Récupérer le tableau de la page 1
  var tableau1 = document.getElementById("tableau1");

  // Récupérer les lignes du tableau
  var lignes = tableau1.getElementsByTagName("tr");

  // Créer un nouveau tableau dans la page 2
  var tableau2 = document.getElementById("tableau2");

  // Parcourir les lignes et les ajouter au nouveau tableau
  for (var i = 0; i < lignes.length; i++) {
    var newRow = tableau2.insertRow(-1);
    var cells = lignes[i].getElementsByTagName("td");
    for (var j = 0; j < cells.length; j++) {
      newRow.insertCell(j).innerHTML = cells[j].innerHTML;
  }
 }
}*/

function transfererTableau()
{
  var xhr = new XMLHttpRequest();
    xhr.open("POST", "./Tablebase.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function(response) {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById("tableau2").innerHTML = response.currentTarget.response;
        }
    };
    xhr.send();
}

