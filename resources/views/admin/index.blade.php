@extends('admin.layouts.admin')

@section('title', 'Admin plugin home')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>Don't worry many more functions will be added to the plugin. Such as permisions...</p>
            <p>
                API : <br>
                <code>GET {{ url('/api/skins/{user_id}') }}</code><br>
                <code>POST {{ url('/api/skins/update_skin') }}</code><br>
                The POST route require 2 parameters : <br> 
                <code>{ "access_token" : "XXXX", "skin" : "IMAGE.PNG" }</code><br>

                The user, if connected, can update his skin if he navigates to <code>{{ route('skin-api.home') }}</code>
            </p>
        </div>
    </div>
@endsection
