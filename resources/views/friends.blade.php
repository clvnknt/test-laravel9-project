@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
                @foreach ($mga_kaibigan as $friend)
                <tr>
                    <td>{{ $friend->getId() }}</td>
                    <td>{{ $friend->getCompleteName() }}</td>
                    <td>{{ $friend->getEmail() }}</td>
                    <td>{{ $friend->getContactNumber() }}</td>
                    <td>
                        <a class="" href="/edit-friend/{{ $friend->getId() }}">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
