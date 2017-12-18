@extends('layouts.app')
@section('content')


<div class="container">
    <h2>Garbages Management</h2>
    <a href="{{ route('garbages.create') }}" class="btn btn-primary btn-sm">CREATE</a>
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
                <th style="width: 100px">Action</th>
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
                <td>
                    <a href="{{ route("garbages.edit", $garbage->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="javascript:void(0);" url="{{ route('garbages.destroy', $garbage->id) }}"
                        data-toggle="modal" data-target="#deleteGarbage"
                        class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $garbages->links() }}
    </div>
</div>

@include("garbages.delete");

@endsection
