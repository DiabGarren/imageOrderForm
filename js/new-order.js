let form = document.forms[0];
let amountDue = form.elements.namedItem("orderAmount");
let orderPrint = form.elements.namedItem("orderPrint");
let orderDigital = form.elements.namedItem("orderDigital");
let amountPaid = form.elements.namedItem("orderPaid");
let amountChange = form.elements.namedItem("orderChange");

orderPrint.addEventListener("focusout", (event) => {
    const printItems = event.target.value;
    const digitalItems = orderDigital.value;
    let total = 0;
    if (printItems.length > 0) {
        printItems.split("\nIMG").forEach(() => {
            total += 15;
        })
    }
    if (digitalItems.length > 0) {
        digitalItems.split("\nIMG").forEach(() => {
            total += 5;
        })
    }

    amountDue.value = total;
});

orderDigital.addEventListener("focusout", (event) => {
    const digitalItems = event.target.value;
    const printItems = orderPrint.value;
    let total = 0;
    if (printItems.length > 0) {
        printItems.split("\nIMG").forEach(() => {
            total += 15;
        })
    }
    if (digitalItems.length > 0) {
        digitalItems.split("\nIMG").forEach(() => {
            total += 5;
        })
    }

    amountDue.value = total;
});

amountPaid.addEventListener("focusout", (event) => {
    const paid = event.target.value;
    
    amountChange.value = paid - amountDue.value;
});