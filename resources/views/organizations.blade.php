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
            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

            <div>
                <a class="btn btn-sm btn-primary" href="/add-organization-form">
                    Add New Organization
                </a>
            </div>

            <table class="table" id="organizations-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Members</th>
                        <th>Contact Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizations as $org)
                    <tr>
                        <td>{{ $org->getId() }}</td>
                        <td>{{ $org->getName() }}</td>
                        <td>{{ $org->getType() }}</td>
                        <td>{{ $org->getMembersCount() }}</td>
                        <td>{{ $org->getContactNumber() }}</td>
                        <td>
                            <a href="/edit-organization/{{ $org->getId() }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <a onclick="return confirmDelete()" href="/delete-organization/{{ $org->getId() }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

$(document).ready( function () {
    $('#organizations-table').DataTable();
} );

function confirmDelete() {
    var answer = confirm('Are you sure you want to delete this record? this is not reversible');
    if (answer == true) {
        return true;
    }
    return false;
}

</script>

@endsection
