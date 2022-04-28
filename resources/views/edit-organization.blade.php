@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Organization Record</h1>
            <form action="/save-edit-organization" method="POST">
                <input type="hidden" name="id" value="{{ $organization->getId() }}" />
                @csrf
                <div class="form-group">
                    <label>Organization Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $organization->getName() }}">
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
                    <input type="text" class="form-control" name="contact_number" value="{{ $organization->getContactNumber() }}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">{{ $organization->getAddress() }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
