@extends('admin.layouts.app')
@section('start-point')
    Quản lý đơn hàng
@endsection
@section('title')
    Chi tiết đơn hàng
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" class="card-logo card-logo-dark" alt="logo dark" height="17">
                                    <img src="{{ asset('assets/admin/images/logo-light.png') }}" class="card-logo card-logo-light" alt="logo light" height="17">
                                    <div class="mt-sm-5 mt-4">
                                        <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                        <p class="text-muted mb-1" id="address-details">California, United States</p>
                                        <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 90201</p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 mt-sm-0 mt-3">
                                    <h6><span class="text-muted fw-normal">Khách hàng:</span><span id="legal-register-no"> {{$donHang->user->ten_doc_gia}} </span></h6>
                                    <h6><span class="text-muted fw-normal">Email:</span><span id="email"> {{$donHang->user->email}} </span></h6>
                                    <h6><span class="text-muted fw-normal">Số điện thoại: </span><span> {{$donHang->user->so_dien_thoai}}</span> </h6>
                                    <h6 class="mb-0"><span class="text-muted fw-normal">Ngày Sinh: </span><span id="contact-no">{{ \Carbon\Carbon::parse($donHang->user->sinh_nhat)->format('d/m/Y') }} </span></h6>
                                </div>
                            </div>
                        </div>
                        <!--end card-header-->
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                    <h5 class="fs-14 mb-0">#VL<span id="invoice-no">25000355</span></h5>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                    <h5 class="fs-14 mb-0"><span id="invoice-date">23 Nov, 2021</span> <small class="text-muted" id="invoice-time">02:36PM</small></h5>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                    <span class="badge bg-success-subtle text-success fs-11" id="payment-status">Paid</span>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                    <h5 class="fs-14 mb-0">$<span id="total-amount">755.96</span></h5>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end col-->
                    {{-- <div class="col-lg-12">
                        <div class="card-body p-4 border-top border-top-dashed">
                            <div class="row g-3">
                                <div class="col-6">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Billing Address</h6>
                                    <p class="fw-medium mb-2" id="billing-name">David Nichols</p>
                                    <p class="text-muted mb-1" id="billing-address-line-1">305 S San Gabriel Blvd</p>
                                    <p class="text-muted mb-1"><span>Phone: +</span><span id="billing-phone-no">(123) 456-7890</span></p>
                                    <p class="text-muted mb-0"><span>Tax: </span><span id="billing-tax-no">12-3456789</span> </p>
                                </div>
                                <!--end col-->
                                <div class="col-6">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address</h6>
                                    <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                    <p class="text-muted mb-1" id="shipping-address-line-1">305 S San Gabriel Blvd</p>
                                    <p class="text-muted mb-1"><span>Phone: +</span><span id="shipping-phone-no">(123) 456-7890</span></p>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div> --}}
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                    <thead>
                                    <tr class="table-active">
                                        <th scope="col" style="width: 50px;">STT</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col" class="text-end">Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody id="products-list">
                                    <tr>
                                        <th scope="row">01</th>
                                        <td class="text-center">
                                           {{$donHang->sach->ten_sach}}
                                        </td>
                                        <td>{{$donHang->so_tien_thanh_toan}}</td>
                                        <td>01</td>
                                        <td class="text-end">{{$donHang->so_tien_thanh_toan}}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th scope="row">02</th>
                                        <td class="text-start">
                                            <span class="fw-medium">Noise NoiseFit Endure Smart Watch</span>
                                            <p class="text-muted mb-0">32.5mm (1.28 Inch) TFT Color Touch Display</p>
                                        </td>
                                        <td>$94.99</td>
                                        <td>01</td>
                                        <td class="text-end">$94.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">03</th>
                                        <td class="text-start">
                                            <span class="fw-medium">350 ml Glass Grocery Container</span>
                                            <p class="text-muted mb-0">Glass Grocery Container (Pack of 3, White)</p>
                                        </td>
                                        <td>$24.99</td>
                                        <td>01</td>
                                        <td class="text-end">$24.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">04</th>
                                        <td class="text-start">
                                            <span class="fw-medium">Fabric Dual Tone Living Room Chair</span>
                                            <p class="text-muted mb-0">Chair (White)</p>
                                        </td>
                                        <td>$340.00</td>
                                        <td>01</td>
                                        <td class="text-end">$340.00</td>
                                    </tr> --}}
                                    </tbody>
                                </table><!--end table-->
                            </div>
                            <div class="border-top border-top-dashed mt-2">
                                <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                    <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end">$699.96</td>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax (12.5%)</td>
                                        <td class="text-end">$44.99</td>
                                    </tr>
                                    <tr>
                                        <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                        <td class="text-end">- $53.99</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge</td>
                                        <td class="text-end">$65.00</td>
                                    </tr>
                                    <tr class="border-top border-top-dashed fs-15">
                                        <th scope="row">Total Amount</th>
                                        <th class="text-end">$755.96</th>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            {{-- <div class="mt-3">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">Mastercard</span></p>
                                <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">David Nichols</span></p>
                                <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                                <p class="text-muted">Total Amount: <span class="fw-medium" id="">$ </span><span id="card-total-amount">755.96</span></p>
                            </div> --}}
                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                                <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/pages/invoicedetails.js') }}"></script>

@endpush
