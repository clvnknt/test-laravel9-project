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
                <a class="btn btn-primary btn-sm" href="/new-friend-form">Add a Friend</a>
            </div>

            <table class="table" id="friends-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mga_kaibigan as $friend)
                <tr>
                    <td>{{ $friend->getId() }}</td>
                    <td>{{ $friend->getCompleteName() }}</td>
                    <td>{{ $friend->getEmail() }}</td>
                    <td>{{ $friend->getContactNumber() }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="/edit-friend/{{ $friend->getId() }}">
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="return confirmDelete()" href="/delete-friend/{{ $friend->getId() }}">
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
function confirmDelete() {
    var answer = confirm("Are you sure you want to remove this record? this cannot be undone");
    if (answer == true) {
        return true;
    }
    return false;
}

jQuery(document).ready( function () {
    jQuery('#friends-table').DataTable();
});
</script>
@endsection
