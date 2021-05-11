@extends('layouts.app')

@section('content')
<div class="container py-4">
<br><br><br>
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page" >List Sparepart</li>
                    <div class="col-md-7" style="position: absoulte; top: 5%; left: 62%">
                        <div class="input-group mb-3">
                        <form action="{{ url('cari') }}" method="GET">
                            <input type="text" name="name" placeholder="Searching...." class="form-control bg-light" style="color: black;" >
                        </form>
                            <div class="input-group-prepend">
                                <span class="input-group-text"  style="background-color: #8B0000;" id="basic-addon1">
                                    <i class="fas fa-search" style="color: white;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </ol>
                    
            </nav>
        </div>
    </div>
<section class="item content mb-5">
<br><br><br><br><br><br>
    <div class="container toparea1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($spareparts as $sparepart)
                                <tr class="text-center">
                                    <td style="color: #444;">{{ $no++ }}</td>
                                    <td style="color: #444;">{{ $sparepart->name }}</td>
                                    <td style="color: #444;">Rp. {{ number_format($sparepart->price) }}</td>
                                    <td style="color: #444;">{{ $sparepart->stock }} pcs</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br><br>
@endsection