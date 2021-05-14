@extends('layouts.adminApp')

@section('content')
<section class="item content mb-5">
    <div class="container toparea1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($spareparts as $sparepart)
                                <tr class="text-center">
                                    <td style="color: #444;">{{ $no++ }}</td>
                                    <td style="color: #444;">{{ $sparepart->name }}</td>
                                    <td style="color: #444;">{{ $sparepart->nameS }}</td>
                                    <td style="color: #444;">Rp. {{ number_format($sparepart->price) }}
                                        @if($sparepart->stock != null)
                                        <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stock</span>
                                        @else
                                        <span class="badge badge-danger"> <i class="fas fa-times"></i> Out of Stock</span>
                                        @endif
                                    </td>
                                    <td style="color: #444;">{{ $sparepart->stock }} pcs</td>
                                    <td>
                                        <form method="post" action="{{ url('/sparepart/need') }}/{{ $sparepart->id }}">
                                            <input type="text" name="total_sparepart" class="form-control" required="" style="background-color: white; width: 100px;">
                                            @csrf
                                            <button type="submit" class="btn" align="left" style="background: #8B0000; color: white;" @if($sparepart->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Add</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection