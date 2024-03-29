@extends('layouts.app')

@section('external-js')
    <script src="{{ asset('js/product/view-product.js') }}"></script>
@endsection

@section('content')
<form>
    @csrf

    <div class="pt-5 pb-9">
        <section class="py-0">
            <div class="container-small">
                <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
                    {{-- Picture section --}}
                    <div class="col-12 col-lg-6">
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-2 col-lg-12 col-xl-2">
                                <div class="swiper-products-thumb swiper swiper-container theme-slider overflow-hidden" id="swiper-products-thumb"></div>
                            </div>
                            <div class="col-12 col-md-10 col-lg-12 col-xl-10">
                                <div class="d-flex align-items-center border-rounded-3 text-center p-5 h-100">
                                    <div class="swiper swiper-container theme-slider" data-thumb-target="swiper-products-thumb" data-products-swiper='{"slicesPerView": 1, "spaceBetween": 16, "thumbsEl": ".swiper-products-thumb"}'></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-lg btn-warning rounded-pill w-100 fs--1 fs-sm-0" id="btnAddToCart">
                                <span class="fas fa-shopping-cart me-2"></span>
                                Add to cart
                            </button>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <input type="hidden" value="{{ $product->id }}" id="productId" name="productId">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="d-flex flex-wrap">
                                    <div class="me-2">
                                        @for($counter = 0; $product->qualification > $counter; ++$counter)
                                            <span class="fa fa-star text-warning"></span>
                                        @endfor
                                    </div>
                                    <p class="text-primary fw-semi-bold mb-2">{{ $product->reviewers_counter }} People rated and reviewed.</p>
                                </div>
                                <h3 class="mb-3 lh-sm">{{ $product->name }}</h3>
                                <div class="d-flex flex-wrap align-items-center">
                                    <h1 class="me-3">$ {{ number_format($product->price, 2) }}</h1>
                                </div>
                                <p class="text-success fw-semi-bold fs-1 mb-2" id="availability">
                                </p>
                                <p class="mb-2 text-800">{!! $product->description !!}</p>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <div class="d-flex product-color-variants" data-product-color-variants="data-products-color-variants">
                                        {{--Follow same logic if want to add more images or color--}}
                                        <div class="rounded-1 border me-2 active" data-variant="Unique" data-products-images='["{{ \Illuminate\Support\Facades\Storage::disk(env('DISK'))->get($product->image_url) }}"]'>
                                            <img src="{{ \Illuminate\Support\Facades\Storage::disk(env('DISK'))->get($product->image_url) }}" alt="" width="38"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-sm-5 align-items-end">
                                    <div class="col-12 col-sm-auto">
                                        <p class="fw-semi-bold mb-2 text-900">Size :</p>
                                        <div class="d-flex align-items-center">
                                            <select class="form-select w-auto" id="productSize">
                                                @php($uniqueValues = array())
                                                @foreach($product->productVariants as $productVariant)
                                                    @if(!array_key_exists($productVariant->size->name, $uniqueValues))
                                                        @php($uniqueValues[$productVariant->size->name] = true)
                                                        <option value="{{ $productVariant->size->name }}">{{ $productVariant->size->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-auto">
                                        <p class="fw-semi-bold mb-2 text-900">Color :</p>
                                        <div class="d-flex align-items-center">
                                            <select class="form-select w-auto" id="productColor">
                                                @php($uniqueValues = array())
                                                @foreach($product->productVariants as $productVariant)
                                                    @if(!array_key_exists($productVariant->color->name, $uniqueValues))
                                                        @php($uniqueValues[$productVariant->color->name] = true)
                                                        <option value="{{ $productVariant->color->name}}">{{ $productVariant->color->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm">
                                        <p class="fw-semi-bold mb-2 text-900">Quantity : </p>
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="d-flex flex-between-center" data-quantity="data-quantity">
                                                <button class="btn btn-phoenix-primary px-3" type="button" data-type="minus">
                                                    <span class="fas fa-minus"></span>
                                                </button>
                                                <input class="form-control text-center input-spin-none bg-transparent border-0 outline-none" id="qty" style="width: 50px;" type="number" min="1" value="1"/>
                                                <button class="btn btn-phoenix-primary px-3" type="button" data-type="plus">
                                                    <span class="fas fa-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>

@endsection
