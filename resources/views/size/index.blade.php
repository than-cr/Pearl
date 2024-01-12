@extends('layouts.app')

@section('external-css')
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet">
@endsection

@section('external-js')
    <script src="{{ asset('js/size/size.js') }}"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
@endsection

@section('content')
    <div class="content pt-4 mx-6">
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Sizes</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <span>All</span>
                        <span class="text-700 fw-semi-bold">({{ sizeof($sizes) }})</span>
                    </a>
                </li>
            </ul>
            <div id="sizes" data-list='{"valueNames":["size"], "page": 10, "pagination": true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search" type="search" placeholder="Search sizes" aria-label="Search"/>
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="ms-xxl-auto">
                            @can('Add size')
                                <button class="btn btn-primary" type="button" id="btnAddSize">
                                    <span class="fas fa-plus me-2"></span>
                                    Add size
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
                                    <th class="sort white-space-nowrap align-middle ps-4" scope="col" data-sort="size">SIZE NAME</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="sizes-table-body">
                                @foreach($sizes as $size)
                                    <tr class="size align-middle ps-4">
                                        <td class="align-middle white-space-nowrap py-0">
                                            <a class="fw-semi-bold line-clamp-3 mb-0">
                                                {{ $size->name }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSizeModal" tabindex="-1" aria-labelledby="addSizeModalLabel" aria-hidden="true" data-bs-focus="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSizeModalLabel">Add Size</h5>
                    <button class="btn pt-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fas fa-times fs--1"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('size-save') }}" id="addSizeForm" method="POST">
                        @csrf

                        <div class="row">
                            <div class="">
                                <label class="mb-3" for="sizeTitle">Size</label>
                                <input class="form-control mb-5" type="text" placeholder="Size" id="sizeTitle">
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
