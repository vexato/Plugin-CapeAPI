@extends('admin.layouts.admin')

@section('title', 'Cape API Configuration')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p class="mb-4">{{ trans('capeapi::admin.instructions') }}</p>

            <div class="mb-4">
                <h5 class="text-secondary">API Endpoint:</h5>
                <div class="alert alert-info">
                    <code>GET {{ url('/api/capeapi/skins/{user_id}') }}</code>
                    <span class="ml-2"><img src="{{ plugin_asset('capeapi', 'img/cape.png') }}" alt="Cape Preview" class="img-thumbnail" width="50"></span>
                </div>
            </div>

            <div>
                <h5 class="text-secondary">User Access:</h5>
                <p>
                    {{ trans('capeapi::admin.instructions2') }}
                </p>
                <div class="alert alert-success">
                    <code>{{ route('capeapi.home') }}</code>
                </div>
            </div>
        </div>
    </div>
@endsection
