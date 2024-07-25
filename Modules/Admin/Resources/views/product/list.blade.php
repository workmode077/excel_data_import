@extends('admin::layouts.master')

@section('content')
        <!-- ============ header start  ============= -->
            @include('admin::layouts.header')
        <!-- ============ header end  ============= -->

        <!-- ============ sidebar start  ============= -->
            @include('admin::layouts.sidebar')
       
     
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li><a href="{{ URL('/') }}">Dashboard</a></li>
                        <li><a href="{{ url('product') }}">Product</a></li>
                        <li>List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                
                <!-- ============ Toaster start  ============= -->
                @if(session()->has('success'))
                <div id="toast-container" class="toast-top-right mt-5">
                    <div class="toast toast-success" aria-live="polite" style="">
                        <div class="toast-title">Product</div>
                        <div class="toast-message">  {{ session()->get('success') }}</div>
                    </div>
                </div>
                @endif
                @if ($errors->any())
                <div id="toast-container" class="toast-top-right mt-5">
                        @foreach ($errors->all() as $error)
                            <div class="toast toast-danger" aria-live="polite">
                                <div class="toast-title">Product</div>
                                <div class="toast-message">{{ $error }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            
            
                <!-- ============ Toaster end  ============= -->
               
     
                
                <!-- start category -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card o-hidden mb-4" style="overflow:visible;">
                            <div class="card-header d-flex align-items-center border-0 mb-3">
                                <h3 class="w-50 float-left card-title m-0">Product List</h3>
                                <div class="dropdown dropleft text-right w-50 float-right">
                                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" accept=".csv">
                                        <button type="submit" class="btn btn-success btn-sm m-1">Import CSV</button>
                                    </form>
                                   
                                </div>
                                
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm m-2 float-right"  type="button" href="{{ URL('product/create') }}"  >Add Product</a>
                                <div class="table-responsive">
                                   
                                    <table id="adminUserList" class="display table table-striped table-bordered dataList"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NAME</th>
                                                <th scope="col">DESCRIPTION</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">CREATED AT</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- end category -->
            <!-- end of main-content -->
            @endsection
            @section('datatable-js')
                <script src="{{ asset('admin-script/product.js') }}"></script>
            @endsection
          
        