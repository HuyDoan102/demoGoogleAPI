@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Garbages Management</h2>
    <a href="{{ route('garbage.create') }}" class="btn btn-primary btn-sm">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>District</th>
                <th>City</th>
                <th>Country</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($garbages as $garbage)
            <tr>
                <td>{{ $garbage->name }}</td>
                <td>{{ $garbage->street }}</td>
                <td>{{ $garbage->district }}</td>
                <td>{{ $garbage->city }}</td>
                <td>{{ $garbage->country }}</td>
                <td>{{ $garbage->lat }}</td>
                <td>{{ $garbage->lng }}</td>
                <td>{{ $garbage->type }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
