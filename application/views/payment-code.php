<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cashfree Drops</title>
</head>

<body>
    <div id="payment-form"></div>
    <button id="pay-btn" style="display:none">Pay</button>
    <div class="container" style="justify-content: center;
    display: flex;">
        <img id="loading" src="<?= base_url() ?>assets/loader.gif" style="max-width: 100%; display:none;" />
    </div>

    <script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.sandbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>



<script>
    let paymentSessionId = "";
    const paymentDom = document.getElementById("payment-form");
    const success = function(data) {
        // console.log(data);
        // console.log(data.transaction.transactionId);

        if (data.order && data.order.status == "PAID") {
            $.ajax({
                url: "<?= base_url() ?>Index/checkstatus?order_id=" + data.order.orderId,
                success: function(result) {
                    // console.log(result);

                    if (result.order_status == "PAID") {
                        window.location = "<?= base_url() ?>Index/success?order_id= " + data.order.orderId + "&order_token=" + data.transaction.transactionId + "&order_status=" + data.order.status;

                    } else {
                        window.location = "<?= base_url() ?>Index/failed?order_id= " + data.order.orderId + "&order_token=" + data.transaction.transactionId + "&order_status" + data.order.status;
                    }
                },
            });
        } else {
            //order is still active
            alert("Order is ACTIVE")
        }
    }
    let failure = function(data) {
        alert(data.order.errorText)
    }
    window.addEventListener("load", (event) => {
        const dropConfig = {
            "components": [
                "order-details",
                "card",
                "netbanking",
                "app",
                "upi"
            ],
            "onSuccess": success,
            "onFailure": failure,
            "style": {
                "backgroundColor": "#ffffff",
                "color": "#11385b",
                "fontFamily": "Lato",
                "fontSize": "14px",
                "errorColor": "#ff0000",
                "theme": "light", //(or dark)
            }
        }
        if (paymentSessionId == "") {
            $.ajax({
                url: "<?= base_url('Index/fetchtoken') ?>",
                beforeSend: function() {
                    $("#loading").show();
                },

                success: function(result) {
                    paymentSessionId = result["payment_session_id"];
                    $("#loading").hide();
                    // console.log(paymentSessionId);
                    const cashfree = new Cashfree(paymentSessionId);
                    cashfree.drop(paymentDom, dropConfig);
                },
            });
        } else {
            const cashfree = new Cashfree(paymentSessionId);
            cashfree.drop(paymentDom, dropConfig);
        }

    })
</script>