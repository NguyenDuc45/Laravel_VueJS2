{{-- Để kế thừa lại master layout ta sử dụng extends --}}
@extends('layouts.admin')
{{-- Một file chỉ được kế thừa 1 master layout --}}

@section('title')
    Quản lý sản phẩm
@endsection

@section('CSS')
@endsection

{{-- @section: dùng để chị định phần nội dụng được hiển thị --}}
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Quản lý sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Chi tiết sản phẩm</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-4">
                                    <div class="col-md-4">
                                        <div class="mt-4">
                                            <p class="fw-bold mb-2">Mã sản phẩm</p>
                                            <p>{{ $Product->ma_san_pham }}</p>
                                        </div>

                                        <div class="mt-4">
                                            <p class="fw-bold mb-2">Tên sản phẩm</p>
                                            <p>{{ $Product->ten_san_pham }}</p>
                                        </div>

                                        <div class="mt-3">
                                            <p class="fw-bold mb-2">Giá bán</p>
                                            <p>{{ $Product->gia }}</p>
                                        </div>

                                        <div class="mt-3">
                                            <p class="fw-bold mb-2">Giá khuyến mại</p>
                                            <p>{{ $Product->gia_khuyen_mai }}</p>
                                        </div>

                                        <div class="mt-3">
                                            <p class="fw-bold mb-2">Số lượng</p>
                                            <p>{{ $Product->so_luong }}</p>
                                        </div>

                                        <div class="mt-3">
                                            <p class="fw-bold mb-2">Ngày nhập</p>
                                            <p>{{ $Product->ngay_nhap }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="mt-3">
                                                <p class="fw-bold mb-2">Hình ảnh</p>
                                                <img src="{{ Storage::url($Product->hinh_anh) }}" alt="Hình ảnh"
                                                    class="img-thumbnail mt-1" width="100">
                                            </div>

                                            <div class="mt-3">
                                                <p class="fw-bold mb-2">Mô tả</p>
                                                <p>{!! $Product->mo_ta !!}</p>
                                            </div>

                                            <div class="mt-3">
                                                <p class="fw-bold mb-2">Trạng thái</p>
                                                @if ($Product->trang_thai == 1)
                                                    <span
                                                        class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                                @else
                                                    <span
                                                        class="badge bg-success-subtle text-danger text-uppercase">Unactive</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- end card-body -->
                </div><!-- end card -->

            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>

    </div>
@endsection

@section('JS')
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mo_ta');
    </script>
@endsection
