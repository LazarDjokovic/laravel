$(document).ready(function(){

    generisiPrikaz();
});



function generisiPrikaz() {
    var id=$('#userId').val();
    //alert(id);
    $.ajax({
        type: 'GET',
        url: websiteRoot + '/ajax_orders/'+id,
        success : function(podaci){
            var ispis = "<table class='table table-striped'>";
            ispis += "<tr><th>Game</th><th>Ordered on</th><th>Price</th><th>Cancel order</th></tr>";
            for(var i=0; i < podaci['podaci'].length; i++){
                ispis += "<tr>";
                ispis+= "<td>" + podaci['podaci'][i].game + "</td>";
                ispis += "<td>" + podaci['podaci'][i].ordered_on + "</td>";
                ispis += "<td>" + podaci['podaci'][i].price + "$</td>";
                ispis += "<td><a href='#' onClick='deleteOrders("+ podaci['podaci'][i].id +")'>Remove</a></td>";

                ispis += "</tr>";
            }

            ispis += "</table>";

            $('#orders').html(ispis);


        },
        error: function(greske){
            console.log(greske);
        }
    });
}

function deleteOrders(id){
    event.preventDefault();
    var idUser=$('#userId').val();
    $.ajax({
        type:'GET',
        url:websiteRoot+'/delete_orders/'+id,
        success:function (podaci) {
            generisiPrikaz();
            numberOfOrders(idUser);
        },
        error:function (greske) {
            console.log(greske);
        }
    });
}