@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
            </div>
            @endif
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th></th>
                </tr>
                @foreach ($organizations as $org)
                <tr>
                    <td>{{ $org->getId() }}</td>
                    <td>{{ $org->getName() }}</td>
                    <td>{{ $org->getType() }}</td>
                    <td>{{ $org->getContactNumber() }}</td>
                    <td>{{ $org->getAddress() }}</td>
                    <td>
                        <a href="/edit-organization/{{ $org->getId() }}" class="btn btn-primary btn-sm">
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
