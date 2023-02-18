function calculate(){
    const inputText = document.getElementById("input-text").value;
    const text = document.getElementById("text");
    let summation = 0;
    let empty = true;
    let data = "";
    for(let i = 0; i < inputText; i++){
        if(isPrimeNumber(i+1)){
            if(empty) {
                empty = false;
            }
            if(!empty) text.innerText = text.textContent + " " + (i+1);
            summation = summation+ i+1;
        }
    }
    text.innerText = text.textContent + " = " + summation;
    data = text.textContent + " = " + summation;
}
function isPrimeNumber(numero){
    for(let i = 2,raiz=Math.sqrt(numero); i <= raiz; i++)
    if(numero % i === 0) return false;
    return numero > 1;
}