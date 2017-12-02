@extends('layouts.app')
@section('content')


<div class="container">
    <h2>Garbages Management</h2>
    <a href="{{ route('garbages.create') }}" class="btn btn-primary btn-sm">Create</a>
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
                <td>
                    <a href="{{ route("garbages.edit", $garbage->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="{{ route("garbages.destroy", $garbage->id) }}" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<form action method="POST" class="formdelete" style="display: none;">
    {{ csrf_field() }}
    {{ method_field("DELETE") }}
    Do you want deletes this ?
    <button type="submit">Yes</button>
    <button class="cancelform">No</button>
</form>

<script>
    jQuery(document).ready(function($){
        $('.delete').on('click',function(event){
            event.preventDefault(); // giúp không cần phải tải một url mới
            $('.formdelete').show();
            data = $(this).attr('href');
            $('.formdelete').attr('action', data);
        });
        $('.cancelform').on('click',function(event){
            event.preventDefault();
            $('.formdelete').hide();
        });
    });
</script>

@endsection
