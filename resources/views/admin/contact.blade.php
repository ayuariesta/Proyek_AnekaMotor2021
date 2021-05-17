@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <div class="card-header py-3">
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold" style="color: 	#8B0000;"> <i class="far fa-address-book"></i> Contact Me</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Reply</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($contacts as $contact)
                            <tr class="text-center" style="color: gray;">
                                <td>{{ $no++ }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>{{ $contact->pesan }}</td>
                                <td align="right">
                                    @if($contact->reply == null)
                                    <form method="POST" action="{{ url('/message/reply') }}/{{ $contact->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <textarea placeholder="Enter admin reply..." required="" style="color: gray;" id="reply" class="form-control @error('reply') is-invalid @enderror" name="reply"></textarea>

                                        <button type="submit" class="btn btn-primary"> Send</button>
                                    </form>
                                    @elseif($contact->reply != null)
                                    {{$contact->reply}}
                                    @endif
                                </td>
                                <td style="color: #444;">
                                    <form action="{{ url('/message/delete') }}/{{ $contact->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn" style="background-color:#8B0000; color: white;"><i style="color: white;" class="fa fa-trash"></i> Delete</button>
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
@endsection