// nous effectuons le calcul dynamique de la TVA lorsque l'utilisateur rentre un montant TTC
document.getElementById('amount').addEventListener('input', function () {
    calculateHT(this)
})

// nous effectuons le calcul dynamique de la TVA lorsque l'utilisateur change le type de frais
document.getElementById('type').addEventListener('change', function () {
    calculateHT(document.getElementById('amount'))
})

// fonction permettant de calculer le montant HT et le montant TVA,
// il prend en paramètre l'élément input qui contient le montant TTC
function calculateHT(element) {
    // il s'agit du select qui contient les options
    let selectType = document.getElementById('type')
    // nous recupérons la valeur du data-tva de l'option
    let tva = selectType.options[selectType.selectedIndex].dataset.tva

    // nous calculons le montant HT et nous l'insérons dans le champ HT
    document.getElementById('amountHT').value = element.value * ((100 - Number(tva)) / 100)
    // nous calculons le montant TVA et nous l'insérons dans le champ TVA
    document.getElementById('tva').value = element.value * (Number(tva) / 100)
}