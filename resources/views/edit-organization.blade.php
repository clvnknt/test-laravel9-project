@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Organization Record</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-edit-organization" method="POST">
                <input type="hidden" name="id" value="{{ $organization->getId() }}" />
                @csrf
                <div class="form-group">
                    <label>Organization Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $organization->getName() }}" required>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control">
                        <option value="private" @if ($organization->isPrivate()) selected @endif>Private Organization</option>
                        <option value="government" @if ($organization->isGovernment()) selected @endif>Government Organization</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" value="{{ $organization->getContactNumber() }}" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">{{ $organization->getAddress() }}</textarea>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control" name="website_url" value="{{ $organization->getWebsiteURL() }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>

        <hr />

        <ol>
        @foreach ($organization->members as $member)
            <li>{{ $member->getName() }} - {{ $member->getEmail() }} </li>
        @endforeach
        </ol>
    </div>
</div>
@endsection
