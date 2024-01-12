@extends('layouts.app')

@section('external-css')
    <link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection

@section('external-js')
    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('js/product/product.js') }}"></script>
@endsection

@section('content')
    <div class="content pt-4 mx-6">
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Products</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <span>All</span>
                        <span class="text-700 fw-semi-bold">({{ sizeof($products) }})</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Active</span>
                        <span class="text-700 fw-semi-bold">
                            @php
                                $total_active = 0;
                                foreach ($products as $product)
                                {
                                    if ($product->status->name == 'Active')
                                    {
                                        $total_active++;
                                    }
                                }
                                echo '(' . $total_active . ')';
                            @endphp
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>Inactive</span>
                        <span class="text-700 fw-semi-bold">
                            @php
                                $total_inactive = 0;
                                foreach ($products as $product)
                                {
                                    if ($product->status->name == 'Inactive')
                                    {
                                        $total_inactive++;
                                    }
                                }
                                echo '(' . $total_inactive . ')';
                            @endphp
                        </span>
                    </a>
                </li>
            </ul>
            <div id="products" data-list='{"valueNames":["product", "price", "qualification", "stock_quantity", "size", "status", "vendor"], "page": 10, "pagination": true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search"/>
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="ms-xxl-auto">
                            @can('Add product')
                                <button class="btn btn-primary" type="button" id="btnAddProduct">
                                    <span class="fas fa-plus me-2"></span>
                                    Add product
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                    <div class="table-responsive scrollbar mx-n1 px-1">
                        <table class="table fs--1 mb-0">
                            <thead>
                                <tr>
                                    <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width: 70px;"></th>
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width: 350px;" data-sort="product">PRODUCT NAME</th>
                                    <th class="sort align-middle text-end ps-4" scope="col" style="width: 150px;" data-sort="price">PRICE</th>
                                    <th class="sort align-middle text-end ps-4" scope="col" style="width: 150px;" data-sort="qualification">QUALIFICATION</th>
                                    <th class="sort align-middle text-end ps-4" scope="col" style="width: 150px;" data-sort="stock_quantity">STOCK QUANTITY</th>
                                    <th class="sort align-middle text-end ps-4" scope="col" style="width: 150px;" data-sort="status">STATUS</th>
                                    <th class="sort align-middle text-end ps-4" scope="col" style="width: 150px;" data-sort="vendor">VENDOR</th>
                                    <th class="sort align-middle text-end pe-0 ps-4" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="products-table-body">
                                @foreach($products as $product)
                                     <tr class="position-static">
                                         <td class="align-middle white-space-nowrap py-0">
                                             <a class="d-block border rounded-2" href="{{ route('getProduct', $product->id)  }}">
                                                 <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->get($product->image_url) }}" alt="" width="53" />
                                             </a>
                                         </td>
                                         <td class="product align-middle ps-4">
                                             <a class="fw-semi-bold line-clamp-3 mb-0" href="{{ route('getProduct', $product->id)  }}">
                                                 {{ $product->name }}
                                             </a>
                                         </td>
                                         <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">
                                             {{ number_format($product->price, 2) }}
                                         </td>
                                         <td class="qualification align-middle text-center ps-4">
                                             @for($counter = 0; $product->qualification > $counter; ++$counter)
                                                 <span class="fa fa-star text-warning"></span>
                                             @endfor
                                         </td>
                                         <td class="stock_quantity align-middle text-center ps-4" style="min-width: 225px;">
                                             @foreach($product->productVariants as $productVariant)
                                                 <span class="badge badge-tag mb-2">
                                                     Size: {{ $productVariant->size->name }}
                                                     -
                                                     Color: {{ $productVariant->color->name }}
                                                     -
                                                     Qty: {{ $productVariant->stock_quantity }}
                                                 </span>
                                             @endforeach
                                         </td>
                                         <td class="status align-middle pb-2 ps-3 text-end" style="min-width: 225px;">
                                            <a class="text-decoration-none" href="#">
                                                @if($product->status->name == 'Active')
                                                    <span class="badge badge-light-success me-2 mb-2">Active</span>
                                                @else
                                                    <span class="badge badge-light-danger me-2 mb-2">Inactive</span>
                                                @endif
                                            </a>
                                         </td>
                                         <td class="vendor align-middle text-center fw-semi-bold ps-4">
                                             <a href="#">
                                                 {{ $product->user->name . ' ' . $product->user->last_name }}
                                             </a>
                                         </td>
                                         <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                             <div class="font-sans-serif btn-reveal-trigger position-static">
                                                 <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-base btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                     <span class="fas fa-ellipsis-h fs--2"></span>
                                                 </button>
                                                 <div class="dropdown-menu dropdown-menu-end py-2">
                                                     <button class="dropdown-item" onclick="editProduct('{{ $product->id }}')">Edit data</button>
                                                     <div class="dropdown-divider"></div>
                                                     <button class="dropdown-item text-danger" onclick="deleteProduct('{{ $product->id }}')">Remove</button>
                                                 </div>
                                             </div>
                                         </td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                        <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                            <a class="fw-semi-bold" href="#" data-list-view="*">
                                View all
                                <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                            </a>
                            <a class="fw-semi-bold d-none" href="#" data-list-view="less">
                                View less
                                <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                            </a>
                        </div>
                        <div class="col-auto d-flex">
                            <button class="page-link" data-list-pagination="prev">
                                <span class="fas fa-chevron-left"></span>
                            </button>
                            <ul class="mb-0 pagination"></ul>
                            <button class="page-link" data-list-pagination="next">
                                <span class="fas fa-chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true" data-bs-focus="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add product</h5>
                    <button class="btn pt-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fas fa-times fs--1"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('product-save') }}" id="addProductForm" enctype="multipart/form-data" method="POST">
                        @csrf

                        <input type="hidden" id="productId" value="0"/>

                        <div class="row">
                            <div class="">
                                <label class="mb-3" for="productTitle">Product Title</label>
                                <input class="form-control mb-5" type="text" placeholder="Product Title" id="productTitle">
                                <div class="mb-6">
                                    <h4 class="mb-3">Product Description</h4>
                                    <textarea id="productDescription" class="tinymce" name="content" data-tinymce='{"height": "15rem", "placeholder": "Write a description of the product here..."}'></textarea>
                                </div>
                                <h4 class="mb-3">Display images</h4>
                                <div class="dropzone p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
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
                                                                <tr class="mb-2 variants">
                                                                    <td>
                                                                        <label class="text-700" for="productSize">Size: </label>
                                                                        <select class="form-select w-auto" name="productSize">
                                                                            @foreach($sizes as $size)
                                                                                <option value="{{ $size->name }}">{{ $size->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td class="mx-2">
                                                                        <label class="text-700 ms-3" for="productColor">Color: </label>
                                                                        <select class="form-select w-auto ms-1" name="productColor">
                                                                            @foreach($colors as $color)
                                                                                <option value="{{ $color->name }}">
                                                                                    {{ $color->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td class="mx-2">
                                                                        <label class="text-700 ms-3" for="productStock">Stock: </label>
                                                                        <input class="form-control ms-1" type="number" placeholder="Quantity" min="0" name="productStock" style="min-width: 100px">
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
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="btnSave">Add</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
