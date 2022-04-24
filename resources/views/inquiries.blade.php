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
                    <th>Message</th>
                    <th>Assigned Person</th>
                </tr>
                @foreach ($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->id }}</td>
                    <td>{{ $inquiry->complete_name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>{{ !is_null($inquiry->assignedUser) ? $inquiry->assignedUser->name : 'NONE' }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
