@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Pushlish garbage</h2>
    <form action="{{ route('garbages.update', $garbage->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PUT") }}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name ..." value="{{ $garbage->name }}">
        </div>

        <div class="form-group row">
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="street" placeholder="Street ..." value="{{ $garbage->street }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="district" placeholder="district ..." value="{{ $garbage->district }}">
            </div>
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="city" placeholder="City ..." value="{{ $garbage->city }}">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="country" placeholder="Country ..." value="{{ $garbage->country }}">
        </div>

        <div class="form-group row">
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="lat" placeholder="Latitude .." value="{{ $garbage->lat }}">
            </div>
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="lng" placeholder="Longitude ..." value="{{ $garbage->lng }}">
            </div>
        </div>

        <div class="form-group">
            <select name="type" id="" class="form-control">
                <option value="Big">Big</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">UPDATE</button>
        </div>
    </form>
</div>

@endsection

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0O6PscWjtS3m6PnfCSdi13Kvkxn18rIo&libraries=places&callback=initAutocomplete">
</script>
