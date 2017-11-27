@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Garbage</h2>
    <div class="row">
        <div class="col-sm-4">
            <form action="">
                <div class="form-group">
                    <input id="search" type="text" class="form-control" placeholder="Address ...">
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <span>we can search your loction</span>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary btn-sm">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="map" class="col-sm-8" garbages="{{ $garbages }}"></div>
    </div>
</div>

@endsection

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0O6PscWjtS3m6PnfCSdi13Kvkxn18rIo&libraries=places&callback=initMap">
</script>
