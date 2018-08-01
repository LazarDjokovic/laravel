@extends('layouts.template')
@section('title')
    All products
@endsection
@section('content')
<div class="container" style="text-align:center;">
    <h1>All games that are available at ZolaTrade store</h1>
    <hr/>
    <br/>
    @isset($allProducts)
        @foreach($allProducts as $product)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h4>{{$product->title}}</h4>
                <hr/>
                <a href="{{asset('/one_product/'.$product->id)}}"><img src="{{asset('/images/games/'.$product->picture)}}" alt="Proba" class="img-rounded allProductsPicture"/></a>
                <hr/>
            </div>
        @endforeach
    @endisset
    <div class="col-xs-12">
        {{ $allProducts->links() }}
    </div>
    <script>
        /*$(document).on('click','.page-item a',function(e){
           e.preventDefault();

           var page=($(this).attr('href').split('page=')[1]);//index 1 ima broj strane
            paginationAjax(page);
        });

        function paginationAjax(page) {
            alert(websiteRoot + '/all_products?page='+page);
            $.ajax({
                type: 'GET',
                url: websiteRoot + '/all_products?page='+page,
                success : function(podaci){
                    //console.log(podaci);

                    var ispis = "<table class='table'>";
                    ispis += "<tr><th>ID</th><th>Email</th><th>Username</th><th>Obrisi</th><th>Prikazi</th></tr>";
                    for(var i=0; i < podaci.length; i++){
                        ispis += "<tr>";
                        ispis+= "<td>" + podaci[i].id + "</td>";
                        ispis += "<td>" + podaci[i].email + "</td>";
                        ispis += "<td>" + podaci[i].username + "</td>";
                        ispis += "<td><a href='#' onClick='obrisi("+ podaci[i].id +")'>Obrisi</a></td>";
                        ispis += "<td><a href='#' onClick='prikazi("+ podaci[i].id +")'>Prikazi</a></td>";
                        ispis += "</tr>";
                    }

                    ispis += "</table>";

                    $('#app').html(ispis);


                },
                error: function(greske){
                    console.log(greske);
                }
            });
        }*/
    </script>
    </div>
</div>
@endsection