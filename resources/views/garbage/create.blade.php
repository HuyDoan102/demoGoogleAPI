@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Pushlish garbage</h2>
    <form action="{{ route('garbage.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="nameGarbage" name="name" placeholder="Name ..." required>
        </div>

        <div class="form-group row">
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" id="latGarbage" name="lat" placeholder="Latitude .." required>
            </div>
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" id="lngGarbage" name="lng" placeholder="Longitude ..." required>
            </div>
        </div>

        <div class="form-group row">
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="street" placeholder="Street ..." required>
            </div>

            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="district" placeholder="district ..." required>
            </div>
        </div>

        <div class="form-group row">
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="city" placeholder="City ..." required>
            </div>
            <div class="form-group col-sm-6">
                <input type="text" class="form-control" name="country" placeholder="Country ..." required>
            </div>
        </div>

        <div class="form-group">
            <select name="type" id="" class="form-control" required>
                <option value="Big">Big</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Pushlish</button>
        </div>
    </form>
</div>

@endsection
