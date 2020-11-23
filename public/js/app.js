
//retorna o elemento de classe item do html
var item = document.querySelector('.item');



for(let input of item)
{
    input.addEventListener('input', start(item));
}

function start(item)
{
   var valorLinha = getTotalLinha(getQuantityValue(item), getVlrValue(item));
    insertVlrTotal(item, valorLinha);
}

    

//fincao que retorna o valor de quantidade
function getQuantityValue(item) {
    var itemQuantity = item.querySelector('.quantity');
    return Number(itemQuantity.value);
}

//funcao que retorna o valor unitario
function getVlrValue(item) {
    var itemVlr = item.querySelector('.vlr_unity');
    return Number(itemVlr.value);
}

//funcao que calcula o valor total
function getTotalLinha(quantity, vlr) {
    return quantity * vlr;
}

//funcao que insere o valor total na linha
function insertVlrTotal(item, totalLinha) {
    var total = item.querySelector('.total');
    total.value = totalLinha;
}



