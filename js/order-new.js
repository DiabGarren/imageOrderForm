let form = document.forms[0];
let amountDue = form.elements.namedItem("orderAmount");
let orderPrint = form.elements.namedItem("orderPrint");
let orderDigital = form.elements.namedItem("orderDigital");
let amountPaid = form.elements.namedItem("orderPaid");
let amountChange = form.elements.namedItem("orderChange");

orderPrint.addEventListener("focusin", (event) => {
    if (event.target.value.length == 0) {
        event.target.value = "IMG_";
    }
});

orderPrint.addEventListener("keyup", (event) => {
    if (event.code == "Enter") {
        event.target.value = event.target.value.substring(0, event.target.value.length-1);
        event.target.value += ", IMG_";
    }
})

orderDigital.addEventListener("focusin", (event) => {
    if (event.target.value.length == 0) {
        event.target.value = "IMG_";
    }
});

orderDigital.addEventListener("keyup", (event) => {
    if (event.code == "Enter") {
        event.target.value = event.target.value.substring(0, event.target.value.length-1);
        event.target.value += ", IMG_";
    }
})

orderPrint.addEventListener("focusout", (event) => {
    const printItems = event.target.value;
    const digitalItems = orderDigital.value;
    let total = 0;
    if (printItems.length > 0) {
        printItems.split(", ").forEach(() => {
            total += 15;
        })
    }
    if (digitalItems.length > 0) {
        digitalItems.split(", ").forEach(() => {
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
        printItems.split(", ").forEach(() => {
            total += 15;
        })
    }
    if (digitalItems.length > 0) {
        digitalItems.split(", ").forEach(() => {
            total += 5;
        })
    }

    amountDue.value = total;
});

amountPaid.addEventListener("focusout", (event) => {
    const paid = event.target.value;
    
    amountChange.value = paid - amountDue.value;
});