const barcode = document.querySelector("#barcode");
const toPrint = document.querySelector("#print");

toPrint.addEventListener("click" , () => {
    print()
})

barcode.addEventListener("change",(e) => {

    const barcodeValue = e.target.value

    fetch(`product-get.php?barcode=${encodeURIComponent(barcodeValue)}`).then((res) => res.json()).then((data) => {
        document.querySelector("#productName").value = data.product_name;
        document.querySelector("#productPrice").value = data.price;
        document.querySelector("#productQuantity").value = 1;
        document.querySelector("#productStock").value = data.stock;

    }).catch((error) => {
        console.error("Error fetching product data:", error)
        document.querySelector("#productName").value = "";
        document.querySelector("#productPrice").value = "";
        document.querySelector("#productQuantity").value = 0;
        document.querySelector("#productStock").value = "";

        alert("no product with this code");
        e.target.value = ""

    });

    
});

