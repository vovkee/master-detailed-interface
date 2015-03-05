$(function(){
    var $container = $("#clientPayments");
    $(".client").on("click", function() {
        var id = $(this).data("id");
        if(!id) {
            return;
        }
        $.get("/client/"+id+"/payment", function(client) {
            $container.empty();
            if (!client.payments.length) {
                $container.append("payments not found");
                return;
            }
            for (var i in client.payments) {
                var content = "<div class='row payment-content'>" +
                    "<b>Note:</b> " + client.payments[i].note +
                    " <b>Amount:</b> " + client.payments[i].amount_money +
                    "</div>";
                $container.append(content);
            }
        });
    });
});