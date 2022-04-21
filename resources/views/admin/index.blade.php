@extends('admin.layouts.admin')

@section('title', 'Skin API configuration')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div>
                API : <br>
                <div><code>GET {{ url('/api/skin-api/skins/{user_id}') }}</code> --> <img src="{{plugin_asset('skin-api', 'img/steve.png')}}" alt=""></div>
                <div><code>GET {{ url('/api/skin-api/avatars/combo/{user_id}') }}</code> (only from 64x64 skins) --> <img src="{{plugin_asset('skin-api', 'img/combo_steve.png')}}" alt=""></div>
                <div><code>GET {{ url('/api/skin-api/avatars/face/{user_id}') }}</code> (only from 64x64 skins) --> <img src="{{plugin_asset('skin-api', 'img/face_steve.png')}}" alt=""></div>
                <div>
                    <code>POST {{ url('/api/skin-api/skins/update') }}</code><br>
                    The POST route require 2 parameters : <br>
                    <code>{ "access_token" : "XXXX", "skin" : "IMAGE.PNG" }</code>
                </div>
                The user, if connected, can update his skin if he navigates to <code>{{ route('skin-api.home') }}</code>
            </div>

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
