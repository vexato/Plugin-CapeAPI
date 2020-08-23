@extends('admin.layouts.admin')

@section('title', 'Skin API configuration')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>Don't worry many more functions will be added to the plugin. Such as permissions...</p>
            <p>
                API : <br>
                <code>GET {{ url('/api/skins/{user_id}') }}</code><br>
                <code>POST {{ url('/api/skins/update') }}</code><br>
                The POST route require 2 parameters : <br>
                <code>{ "access_token" : "XXXX", "skin" : "IMAGE.PNG" }</code><br>

                The user, if connected, can update his skin if he navigates to <code>{{ route('skin-api.home') }}</code>
            </p>

            <form method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="widthInput">{{ trans('skin-api::admin.fields.height') }}</label>
                        <input type="text" class="form-control @error('width') is-invalid @enderror" id="widthInput" name="width" value="{{ old('width', $width) }}">

                        @error('width')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="heightInput">{{ trans('skin-api::admin.fields.width') }}</label>
                        <input type="text" class="form-control @error('height') is-invalid @enderror" id="heightInput" name="height" value="{{ old('height', $height) }}">

                        @error('height')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="scaleInput">{{ trans('skin-api::admin.fields.scale') }}</label>
                        <input type="text" class="form-control @error('scale') is-invalid @enderror" id="scaleInput" name="scale" value="{{ old('scale', $scale) }}">

                        @error('scale')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
