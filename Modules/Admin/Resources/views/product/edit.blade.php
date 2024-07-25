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
                        <li>Edit</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Product</div>
                                <form method="post" action="{{ route('product.update',$data->id) }}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                             <label for="firstName1">Name</label>
                                             <input class="form-control" type="text" placeholder="Name" name="name" value="@if($data){{ $data->name }}@endif"/>
                                             @if($errors->has('name'))
                                                     <div class="error text-danger">{{ $errors->first('name') }}</div>
                                             @endif
                                         </div>
                                         <div class="col-md-6 form-group mb-3">
                                             <label for="firstName1">Description</label>
                                             <textarea name="description"  cols="30" rows="10" class="form-control">@if($data){{ $data->description }}@endif</textarea>
                                             @if($errors->has('description'))
                                                     <div class="error text-danger">{{ $errors->first('description') }}</div>
                                             @endif
                                         </div>
                                         <div class="col-md-6 form-group mb-3">
                                             <label for="firstName1">Price</label>
                                             <input class="form-control" type="text" placeholder="Price" name="price" value="@if($data){{ $data->price }}@endif" />
                                             @if($errors->has('price'))
                                                     <div class="error text-danger">{{ $errors->first('price') }}</div>
                                             @endif
                                         </div>
                                         <div class="col-md-12">
                                             <button class="btn btn-primary float-right btn-sm m-1" type="submit">Submit</button>
                                             <a href="{{ URL('product') }}" class="btn btn-danger float-right btn-sm m-1">Cancel</a>
                                         </div>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
         <!-- end of main-content -->
            @endsection
           
         
           