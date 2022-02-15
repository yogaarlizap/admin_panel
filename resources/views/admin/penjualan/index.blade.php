@extends('layouts.layout')

@section('title')
    Penjualan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Penjualan</li>
@endsection

@section('content')
    <style>
        #pesanan_detail tbody tr td{
            vertical-align: middle !important;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">

                    <table class="table table-bordered table-hover" id="penjualan_table">
                        <thead>
                            <tr>
                                <th class="text-center" width="30">No</th>
                                <th class="text-center">Kode Pemesanan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Berat(Kg)</th>
                                <th class="text-center">Kode Unik</th>
                                <th class="text-center">Total Harga</th>
                                <th class="text-center">Dibayarkan</th>
                                <th class="text-center">Pembeli</th>
                                <th class="text-center" width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $list)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{ ++$no }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $list->kode_pemesanan }}
                                    </td>
                                    <td class="text-center">
                                        @if ($list->status == 1)
                                            Belum Lunas
                                        @else
                                            Lunas
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $list->total_berat }}
                                    </td>
                                    <td class="text-center">
                                        {{ $list->kode_unik }}
                                    </td>
                                    <td class="text-center">
                                        {{ "Rp. ".number_format($list->total_harga) }}
                                    </td>
                                    <td class="text-center">
                                        {{ "Rp. ".number_format($list->total_harga+$list->kode_unik) }}
                                    </td>
                                    <td class="text-center">
                                        {{ $list->user->name }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <a onclick="detailForm({{ $list->id }})" class="btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @include('admin.penjualan.detail')
@endsection

@section('script')
    <script>
        var pesanan_detail;
        $(function(){
            $('#penjualan_table').DataTable();
        })

        function detailForm(id){
            $.ajax({
                url: "penjualan/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-form-detail').modal('show');
                    $('.modal-title').html('Detail Pesanan');

                    if(pesanan_detail){
                        pesanan_detail.destroy();
                    }

                    pesanan_detail = $('#pesanan_detail').DataTable({
                        "responsive": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "penjualan/detail/"+id,
                            "type": "GET",
                        },
                        "info": false,
                        "searching": false,
                    })
                },
                error: function(){
                    alert('Gagal Ambil Data!');
                }
            })
        }
    </script>
@endsection