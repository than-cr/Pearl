@extends('layouts.app')

@section('external-css')
    <link href="../../vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="../../vendors/choices/choices.min.css" rel="stylesheet">
    <link href="../../vendors/flatpickr/flatpickr.min.css" rel="stylesheet">

@endsection

@section('content')

    <div class="content pt-4 mx-6">
        <form class="mb-9" action="{{ route('add-product') }}" id="addProductForm" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row g-3 flex-between-end mb-5">
                <div class="col-auto">
                    <h2 class="mb-2">Add a product</h2>
                    <h5 class="text-700 fw-semi-bold">Orders</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" href="{{ route('product-index') }}">Discard</a>
                    <button class="btn btn-phoenix-primary mb-2 mb-sm-0" id="btnSave" type="submit">Publish product</button>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-12 col-xl-8">
                    <h4 class="mb-3">Product Title</h4>
                    <input class="form-control mb-5" type="text" placeholder="Product Title" id="productTitle">
                    <div class="mb-6">
                        <h4 class="mb-3">Product Description</h4>
                        <textarea id="productDescription" class="tinymce" name="content" data-tinymce='{"height": "15rem", "placeholder": "Write a description of the product here..."}'></textarea>
                    </div>
                    <h4 class="mb-3">Display images</h4>
                    <div class="dropzone dropzone-multiple p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                        <div class="fallback">
                            <input name="file" type="file">
                        </div>
                        <div class="dz-preview d-flex flex-wrap">
                            <div class="border bg-white rounded-3 d-flex flex-center position-relative me-2 mb-2" style="height: 80px; width: 80px;">
                                <img class="dz-image" src="" width="40" alt="" data-dz-thumbnail="data-dz-thumbnail">
                                <a class="dz-remove text-400" href="#" data-dz-remove="data-dz-remove">
                                    <span data-feather="x"></span>
                                </a>
                            </div>
                        </div>
                        <div class="dz-message text-600" data-dz-message="data-dz-message">
                            Drag the product photo here
                            <span class="text-800 px-1">or</span>
                            <button class="btn btn-link p-0" type="button">Browse from device</button>
                            <br>
                            <img class="mt-3 me-2" src="{{ asset('assets/img/icons/image-icon.png') }}" width="40" alt="">
                        </div>
                    </div>
                    <br>
                    <h4 class="mb-3">Inventory</h4>
                    <div class="row g-0 border-top border-bottom border-300">
                        <div class="col-sm-4">
                            <div class="nav flex-sm-column border-bottom border-bottom-sm-0 border-end-sm border-300 fs--1 vertical-tab h-100 justify-content-between" role="tablist" aria-orientation="vertical">
                                <a class="nav-link border-end border-end-sm-0 border-bottom-sm border-300 text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center active" id="pricingTab" data-bs-toggle="tab" data-bs-target="#pricingTabContent" role="tab" aria-controls="pricingTabContent" aria-selected="true">
                                    <span class="me-sm-2 fs-4 nav-icons" data-feather="tag"></span>
                                    <span class="d-none d-sm-inline">Pricing</span>
                                </a>
                                <a class="nav-link border-end border-end-sm-0 border-bottom-sm border-300 text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="variantsTab" data-bs-toggle="tab" data-bs-target="#variantsTabContent" role="tab" aria-controls="variantsTabContent" aria-selected="false">
                                    <span class="me-sm-2 fs-4 nav-icons" data-feather="sliders"></span>
                                    <span class="d-none d-sm-inline">Variants</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="tab-content py-3 ps-sm-4 h-100">
                                <div class="tab-pane fade show active" id="pricingTabContent" role="tabpanel">
                                    <h4 class="mb-3 d-sm-none">Pricing</h4>
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6">
                                            <h5 class="mb-2 text-1000">Price</h5>
                                            <input class="form-control" type="text" placeholder="$$$" id="productPrice">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade h-100" id="variantsTabContent" role="tabpanel" aria-labelledby="variantsTab">
                                    <div class="d-flex flex-column h-100">
                                        <h5 class="mb-3 text-1000">Variants</h5>
                                        <div class="row g-3 flex-1 mb-4">
                                            <div class="col-sm-7">
                                                <table class="w-auto" id="variantsTable">
                                                    <tbody id="variantsTableBody">
                                                    <tr class="mb-2">
                                                        <td>
                                                            <label class="text-700" for="productSize">Size: </label>
                                                            <select class="form-select w-auto" name="productSize">
                                                                @foreach($sizes as $size)
                                                                    <option value="{{ $size->name }}">{{ $size->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="mx-4">
                                                            <label class="text-700 ms-3" for="productColor">Color: </label>
                                                            <select class="form-select w-auto ms-3" name="productColor">
                                                                @foreach($colors as $color)
                                                                    <option value="{{ $color->name }}">{{ $color->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="mx-4">
                                                            <label class="text-700 ms-3" for="productStock">Stock: </label>
                                                            <input class="form-control" type="number" placeholder="Quantity" min="0" name="productStock">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <button type="button" class="btn btn-phoenix-primary" id="btnAddVariant">
                                                    <span class="fas fa-plus"></span>
                                                    <span class="m-2">Add variant</span>
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

        </form>
    </div>

@endsection

@section('external-js')
    <script src="../../vendors/tinymce/tinymce.min.js"></script>
    <script src="../../vendors/dropzone/dropzone.min.js"></script>
    <script src="../../vendors/choices/choices.min.js"></script>
    <script src="{{ asset('js/product/add-product.js') }}"></script>
@endsection
