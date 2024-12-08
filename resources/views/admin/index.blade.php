@extends('admin.layouts.admin')

@section('title', 'Cape API configuration')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div>
                API : <br>
                <div><code>GET {{ url('/api/skin-api/skins/{user_id}') }}</code> --> <img src="{{plugin_asset('cape-api', 'img/cape.png')}}" alt=""></div>
                The user, if connected, can update his skin if he navigates to <code>{{ route('cape-api.home') }}</code>
            </div>
        </div>
    </div>
@endsection
