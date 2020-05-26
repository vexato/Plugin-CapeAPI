@extends('layouts.app')

@section('title', 'Plugin home')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                    </ul>
                    </div>
                @endif
                <form action="{{ route('skin-api.update_skin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <script>
                                function changeNameSkin_skinapi(el){
                                    var label =document.querySelector('.custom-file-label');

                                    el.files[0] ? label.textContent = el.files[0].name : 'Choose file'
                                }
                            </script>
                            <input onchange="changeNameSkin_skinapi(this)" accept="image/png" type="file" class="custom-file-input" name="skin">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @error('skin')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
