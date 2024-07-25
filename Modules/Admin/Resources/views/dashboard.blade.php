@extends('admin::layouts.master')

@section('content')

       
          {{-- header start --}}
          @include('admin::layouts.header')
          {{-- header end --}}
  
          {{-- sidebar start --}}
              @include('admin::layouts.sidebar')
          {{-- sidebar end --}}
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row mt-5">
                    <!-- ICON BG-->
                   
                   
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <a href="{{url('product')}}"> 
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                                <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                                    <div class="content">
                                        <h6 class="text-muted mt-2 mb-2">Total-Product</h6>
                                        <p class="text-primary text-24 line-height-1 mb-2">@if($productCount){{ $productCount}}@endif</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    </div>
            </div>

                <!-- CARD ICON-->
            
            <!-- end of main-content -->
          
@endsection
