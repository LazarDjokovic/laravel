@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">All Products</p>
        <a href="{{route('adminAddProduct')}}"><button class="btn btn-success">Add product</button></a><br/><br/>
            <table class="table table-hover table-striped">
                <tr><th>RB</th><th>Title</th><th>Price</th><th>Edit</th><th>Delete</th></tr>
                <?php $i = 1; ?>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $product->title }}
                        </td>
                        <td>
                            {{ $product->price }}$
                        </td>
                        <td><a href="{{asset('/adminEditProduct/'.$product->id)}}">Edit</a></td>
                        <td><a href="" onclick="deleteProduct({{$product->id}})">Delete</a></td>
                    </tr>
                @endforeach
            </table>

            <br>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
@section('adminJavaScript')
    @parent
    <script>
        function deleteProduct(id) {
            event.preventDefault();

            $.ajax({
                type:'GET',
                url:websiteRoot+'/adminDeleteProduct/'+id,
                success:function (podaci) {
                    console.log(podaci['podaci']);
                    window.location.reload(true);
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }
    </script>
@endsection