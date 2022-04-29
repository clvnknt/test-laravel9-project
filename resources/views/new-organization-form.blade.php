@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add a New Organization</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-new-organization" method="POST">
                @csrf
                <div class="form-group">
                    <label>Organization Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control">
                        <option value="private">Private Organization</option>
                        <option value="government">Government Organization</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address"></textarea>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control" name="website_url">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
