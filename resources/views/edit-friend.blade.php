@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Friend Record</h1>
            <form action="/save-edit-form" method="POST">
                <input type="hidden" name="id" value="{{ $friend->getId() }}" />
                @csrf
                <div class="form-group">
                    <label>Complete Name</label>
                    <input type="text" class="form-control" name="complete_name" value="{{ $friend->getCompleteName() }}">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $friend->getEmail() }}">
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" value="{{ $friend->getContactNumber() }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
