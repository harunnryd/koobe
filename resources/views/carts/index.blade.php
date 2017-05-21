@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Cart</div>
                <div class="panel-body">

                @if($cart->sumBooks() < 1)
                    <div class="text-center">
                        <h1> :| </h1>
                        <p>Cart kamu masih kosong.</p>
                        <p><a href="{{ route('catalogs.index') }}">Lihat semua buku..</a></p>
                    </div>
                @else
                    <table class="cart table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="50%">Book</th>
                            <th class="10%">Price</th>
                            <th class="8%">Quantity</th>
                            <th class="22%" class="text-center">SubTotal</th>
                            <th class="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->details() as $order)
                            <tr>
                                <td data-th="Book">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="{{ $order['detail']['photo_path'] }}" alt="..." class="img-responsive"/></div>
                                            <div class="col-sm-10">
                                                <h4 class="no-margin">{{ $order['detail']['title'] }}</h4>
                                            </div>
                                        </div>
                                    <div>
                                </td>

                                <td data-th="price">Rp. {{ number_format($order['detail']['price'], 2) }}</td>
                                <td data-th="quantity">
                                    {!! Form::open(['url' => ['carts', $order['id']], 'method' => 'patch', 'class' => 'form-inline']) !!}
                                        {!! Form::number('quantity', $order['quantity'], ['class' => 'form-control']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td data-th="subtotal" class="text-center">Rp. {{ number_format($order['subtotal'], 2)}}
                                <td>
                                    {!! Form::open(['route' => ['carts.remove', $order['id']], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong>Total Rp. {{ number_format($cart->totalPrice(), 2) }}</strong></td>
                        </tr>

                        <tr>
                            <td><a href="{{ route('catalogs.index') }}" class="btn btn-warning">< Belanja lagi?</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total Rp. {{ number_format($cart->totalPrice(), 2) }}</strong></td>
                            <td><a href="{{ url('/checkout/login') }}" class="btn btn-success btn-block">Pembayaran ></a></td>
                        </tr>
                    </tfoot>
                    </table>
                @endif
            </div>
        </div>
    </div>    
</div>
@endsection