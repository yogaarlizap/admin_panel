@extends('layouts.layout')

@section('title')
    Category
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Category</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    {{-- <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a> --}}
                </div>
                <div class="box-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Nama Kategori</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @include('admin.categories.form')
@endsection

@section('script')
    <script src="{{ asset('action/categories/categories.js') }}"></script>
@endsection