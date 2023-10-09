@extends('layouts.app')

@section('content')
    <br />
    <div class="product-filter-container">
        <div class="row">
            <div class="col-lg-auto col-xxl-12">
                <div class="row gx-3 gy-6 mb-8">

                    @foreach($products as $product)
                        <div class="col-6 col-sm-6 col-md-4 col-xxl-2">
                            <div class="product-card-container h-100">
                                <div class="position-relative text-decoration-none product-card h-100">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <div class="border border-1 rounded-3 position-relative mb-3">
                                                <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->get($product->image_url) }}" alt=""/>
                                            </div>
                                            <a class="stretched-link" href="{{ route('getProduct', $product->id) }}">
                                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->name }}</h6>
                                            </a>
                                            <p class="fs--1">
                                                @for($counter = 0; $product->qualification > $counter; ++$counter)
                                                    <span class="fa fa-star text-warning"></span>
                                                @endfor
                                                <span class="text-500 fw-semi-bold ms-1">({{ $product->reviewers_counter }} people rated)</span>
                                            </p>
                                        </div>
                                        <div>
                                            @foreach($product->productVariants as $productVariant)
                                                <span class="badge badge-tag mb-2">
                                                    Size: {{ $productVariant->size->name }}
                                                    -
                                                    Qty: {{ $productVariant->stock_quantity }}
                                                 </span>
                                            @endforeach
                                            <div class="d-flex align-items-center mb-1">
                                                <h3 class="text-1100 mb-0">$ {{ number_format($product->price, 2) }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
