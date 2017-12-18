@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Pushlish garbage</h2>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nameGarbage" name="searchLocation" placeholder="&#128269;" value="{{ old('searchLocation') }}">
                </div>
            </div>
            <form action="{{ route('garbages.store') }}" method="POST">
                {{ csrf_field() }}

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
                    <input type="text" class="form-control" name="name" placeholder="Name ..." value="{{ old('name') }}">
                </div>


                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="street_number" name="street" placeholder="Street ..." value="{{ old('street') }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="route" name="route" placeholder="Route ..." value="{{ old('route') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="locality" name="district" placeholder="district ..." value="{{ old('district') }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="administrative_area_level_1" name="city" placeholder="City ..." value="{{ old('city') }}">
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="country" name="country" placeholder="Country ..." value="{{ old('country') }}">
                </div>

                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="latGarbage" placeholder="Latitude .." value="{{ old('lat') }}" disabled>
                        <input type="hidden" class="form-control" id="atGarbage" name="lat" placeholder="Latitude .." value="{{ old('lat') }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="lngGarbage" placeholder="Longitude ..." value="{{ old('lng') }}" disabled>
                        <input type="hidden" class="form-control" id="ngGarbage" name="lng" placeholder="Longitude ..." value="{{ old('lng') }}">
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
                    <button class="btn btn-primary" type="submit">PUSHLISH</button>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <div id="map"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    initAutocomplete();
</script>
@endsection

