// nous effectuons le calcul dynamique de la TVA
document.getElementById('amount').addEventListener('input', function(){
    document.getElementById('amountHT').value = this.value * 0.80
    document.getElementById('tva').value = this.value * 0.20
})