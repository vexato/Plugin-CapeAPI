@extends('admin.layouts.admin')

@section('title', 'Cape API Configuration')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p class="mb-4">{{ trans('cape-api::admin.instructions') }}</p>

            <div class="mb-4">
                <h5 class="text-secondary">API Endpoint:</h5>
                <div class="alert alert-info">
                    <code>GET {{ url('/api/skin-api/skins/{user_id}') }}</code>
                    <span class="ml-2"><img src="{{ plugin_asset('cape-api', 'img/cape.png') }}" alt="Cape Preview" class="img-thumbnail" width="50"></span>
                </div>
            </div>

            <div>
                <h5 class="text-secondary">User Access:</h5>
                <p>
                    {{ trans('cape-api::admin.instructions2') }}
                </p>
                <div class="alert alert-success">
                    <code>{{ route('cape-api.home') }}</code>
                </div>
            </div>
        </div>
    </div>
@endsection
