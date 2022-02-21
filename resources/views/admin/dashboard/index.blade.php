@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <h1>Welcome {{ Auth::user()->name }}</h1>
    <div class="row col-md-3">
        <div class="col">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Total Pesanan</h4>

                    <h5 id="sales_order">{{ $pesanan }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection