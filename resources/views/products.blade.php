@extends('layouts.main')

@section('content')
    <main class="mt-1">
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#addProductModal">Add Product</button>

        <!-- Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action=" {{ route('product.create') }}" method="POST">
                            @csrf

                            <div class="form-group">
                              <input type="text"  name="product_name" class="form-control @error('product_name') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Product Name">
                            </div>

                            <div class="form-group">
                                <textarea name="product_description" class="form-control @error('product_description') is-invalid @enderror" rows="3" placeholder="Description..."></textarea>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <input type="number" name="price" class="form-control col-6 @error('price') is-invalid @enderror" placeholder="Price">
                                <input type="number" name="cargo_price" class="form-control col-6 @error('cargo_price') is-invalid @enderror" placeholder="Cargo Price">
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                @if($products->count())
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
                                <div id="carousel{{ $product->product_id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="card-img-top" src="/image/products/watch.jpg" alt="First slide" style="height: 22rem">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="card-img-top" src="/image/products/watch.jpg" alt="Second slide" style="height: 22rem">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="card-img-top" src="/image/products/watch.jpg" alt="Third slide" style="height: 22rem">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel{{ $product->product_id }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel{{ $product->product_id }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <hr/>
                                <div class="card-body pt-0">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p>Price: <span class="text-secondary">{{ $product->price }}₺</span> | Cargo Price: <span class="text-secondary">{{ $product->cargo_price }}₺</span></p>
                                    <a href="#" class="btn btn-primary">See product</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
