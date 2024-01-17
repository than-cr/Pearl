@extends('layouts.app')

@section('external-css')
@endsection

@section('external-js')
@endsection

@section('content')
    <section class="pt-5 pb-9">
        <div class="container-small cart">
{{--            <nav class="breadcrumb mb-0">--}}

{{--            </nav>--}}
            <h2 class="mb-6">Cart</h2>
            <div class="row g-5">
                <div class="col-12 col-lg-8">
                    <div id="cartTable" data-list='{"valueNames":["products", "color", "size", "price", "quantity", "total"], "page": 10}'>
                        <div class="table-responsive scrollbar mx-n1 px-1">
                            <table class="table fs--1 mb-0 border-top border-200">
                                <thead>
                                <tr>
                                    <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                                    <th class="sort white-space-nowrap align-middle" scope="col" style="width: 50%;">PRODUCTS</th>
                                    <th class="sort align-middle" scope="col" style="width: 80px;">COLOR</th>
                                    <th class="sort align-middle" scope="col" style="width: 80px;">SIZE</th>
                                    <th class="sort align-middle text-end" scope="col" style="width: 300px;">PRICE</th>
                                    <th class="sort align-middle ps-5" scope="col" style="width: 200px;">QUANTITY</th>
                                    <th class="sort align-middle text-end" scope="col" style="width: 250px;">TOTAL</th>
                                    <th class="sort text-end align-middle pe-0" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list" id="cart-table-body">
                                    @foreach($products as $product)
                                        <tr class="cart-table-row btn-reveal-trigger">
                                            <td class="align-middle white-space-nowrap py-0">
                                                <a class="d-block border rounded-2" href="/product/{{ $product->attributes[0]['product_id'] }}">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->get($product->attributes[0]['image_url']) }}" alt="" width="53">
                                                </a>
                                            </td>
                                            <td class="products align-middle">
                                                <a class="fw-semi-bold bm-0 line-clamp-2" href="/product/{{ $product->attributes[0]['product_id'] }}">{{ $product->name }}</a>
                                            </td>
                                            <td class="color align-middle white-space-nowrap fs--1 text-900">{{ $product->attributes[0]['color'] }}</td>
                                            <td class="size align-middle white-space-nowrap text-700 fs--1 fw-semi-bold">{{ $product->attributes[0]['size'] }}</td>
                                            <td class="price align-middle text-900 fs--1 fw-semi-bold text-end">${{ number_format($product->price, 2) }}</td>
                                            <td class="quantity align-middle fs-0 ps-5">
                                                <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                                                    <button class="btn btn-sm px-2" data-type="minus">-</button>
                                                    <input class="form-control text-center input-spin-none bg-transparent border-0 px-0 disabled" type="number" min="1" value="{{ $product->quantity }}" aria-label="Amount (to the nearest dollar)">
                                                    <button class="btn btn-sm px-2" data-type="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="total align-middle fw-bold text-1000 text-end">${{ number_format(($product->price * $product->quantity), 2) }}</td>
                                            <td class="align-middle white-space-nowrap text-end pe-0 ps-3">
                                                <button class="btn bnt-sm text-500 hover-text-600 me-2">
                                                    <span class="fas fa-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-between-center mb-3">
                                <h3 class="card-title mb-0">Summary</h3>
                            </div>
                        </div>
                        <div class="mx-5">
                            <select class="form-select mb-3" aria-label="delivery type">
                                <option value="cod">Cash on delivery</option>
                                <option value="card">Card</option>
                                <option value="paypal">PayPal</option>
                            </select>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <p class="text-900 fw-semi-bold">Items subtotal :</p>
                                    <p class="text-1100 fw-semi-bold">${{ Cart::getSubTotal() }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="text-900 fw-semi-bold">Discount :</p>
                                    <p class="text-1100 fw-semi-bold">$0.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="text-900 fw-semi-bold">Shipping Cost :</p>
                                    <p class="text-1100 fw-semi-bold">$0.00</p>
                                </div>

                                <div class="d-flex justify-content-between border-y border-dashed py-3 mb-4">
                                    <h4 class="mb-0">Total :</h4>
                                    <h4 class="mb-0">${{ Cart::getTotal() }}</h4>
                                </div>

                                <button class="btn btn-primary w-100 mb-3">
                                    Proceed to check out
                                    <span class="fas fa-chevron-right ms-1 fs--2"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
