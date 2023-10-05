@extends('layouts.app')

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
                            <a class="btn btn-primary" id="addProduct" href="{{ route('add-product') }}">
                                <span class="fas fa-plus me-2"></span>
                                Add product
                            </a>
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
                                                 <img src="{{ asset($product->image_url) }}" alt="" width="53" />
                                             </a>
                                         </td>
                                         <td class="product align-middle ps-4">
                                             <a class="fw-semi-bold line-clamp-3 mb-0" href="{{ route('getProduct', $product->id)  }}">
                                                 {{ $product->name }}
                                             </a>
                                         </td>
                                         <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">
                                             {{ $product->price }}
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
                                                     <a class="dropdown-item" href="#">Edit</a>
                                                     <div class="dropdown-divider"></div>
                                                     <a class="dropdown-item text-danger" href="#">Remove</a>
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
@endsection
