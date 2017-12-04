@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Garbage</h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <input id="search" type="text" class="form-control" placeholder="Address ...">
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                    <span>Please enter your loction</span>
                </div>
            </div>
        </div>
        <div id="map" class="col-sm-8" garbages="{{ $garbages }}"></div>
    </div>
</div>

@endsection

@section ('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0O6PscWjtS3m6PnfCSdi13Kvkxn18rIo&libraries=places"></script>
<script>
    initMap();
</script>
@endsection
