let ordersURL = "/orderForm/orders/?action=view-orders";
fetch(ordersURL)
    .then((response) => {
        if (response.ok) {
            return response.json();
        }
        throw Error("Network response failed");
    })
    .then((data) => {
        console.log(data);
        buildOrdersList(data);
    })
    .catch((error) => {
        console.log("There was a problem: ", error.message);
    })

function buildOrdersList(data) {
    let ordersDisplay = document.querySelector("#ordersDisplay");

    // Set up the table labels
    let dataTable = "<thead>";
    dataTable += `<tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Print Images</th>
                    <th>Digital Images</th>
                    <th>Amount Paid</th>
                </tr>`;
    dataTable += "</thead>";

    // Set up the table body
    dataTable += "<tbody>";
    // Iterate over all vehicles in the array and put each in a row
    data.forEach((element) => {
        dataTable += `<tr>
                        <td>${element.orderFirstname}</td>
                        <td>${element.orderLastname}</td>
                        <td>${element.orderPhone}</td>
                        <td>${element.orderPrint}</td>
                        <td>${element.orderDigital}</td>
                        <td>R${element.orderAmount}</td>`;
        dataTable += `<td><a href="/phpmotors/vehicles?action=mod&invId=${element.orderId}" title="Click to modify">Modify</a></td>`;
        dataTable += `<td><a href="/phpmotors/vehicles?action=del&invId=${element.orderId}" title="Click to delete">Delete</a></td></tr>`;
    });
    dataTable += "</tbody>";
    // Display the contents in the Vehicle Management View
    ordersDisplay.innerHTML = dataTable;
}