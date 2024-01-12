<nav class="ecommerce-navbar navbar-expand navbar-light bg-white justify-content-between">
    <div class="container-small d-flex flex-between-center" data-navbar="data-navbar">
        <div class="dropdown">
            <button class="btn text-900 ps-0 pe-5 text-nowrap dropdown-toggle dropdown-caret-none" data-category-btn="data-category-btn" data-bs-toggle="dropdown">
                <span class="fas fa-bars me-2"></span>
                Menu
            </button>

            <div class="dropdown-menu border py-0 category-dropdown-menu">
                <div class="card border-0 scrollbar" style="max-height: 657px;">
                    <div class="card-body p-6 pb-3">
                        <div class="row gx-7 gy-5 mb-5">
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-primary me-2" data-feather="home" style="stroke-width: 3;"></span>
                                    <h6 class="text-1000 mb-0 text-nowrap">Home</h6>
                                </div>
                                <div class="ms-n2">
                                    <a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="/">Home</a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-primary me-2" data-feather="heart" style="stroke-width: 3;"></span>
                                    <h6 class="text-1000 mb-0 text-nowrap">About us</h6>
                                </div>
                                <div class="ms-n2">
                                    <a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="{{ route('our_history') }}">Our history</a>
                                </div>
                                <div class="ms-n2">
                                    <a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="{{ route('testimonies') }}">Testimonies</a>
                                </div>
                            </div>
                            @auth()
                                <div class="col-12 col-sm-6 col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-primary me-2" data-feather="shopping-bag" style="stroke-width: 3;"></span>
                                    <h6 class="text-1000 mb-0 text-nowrap">Seller Actions</h6>
                                </div>
                                @can('View products')
                                    <div class="ms-n2">
                                        <a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="{{ route('product-index') }}">Products</a>
                                    </div>
                                @endcan
                                @can('View sizes')
                                    <div class="ms-n2">
                                        <a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="{{ route('size-index') }}">Sizes</a>
                                    </div>
                                @endcan
                                @can('View colors')
                                    <div class="ms-n2">
                                        <a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="{{ route('color-index') }}">Colors</a>
                                    </div>
                                @endcan
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
