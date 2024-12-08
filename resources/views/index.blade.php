@extends('layouts.app')

@section('title', trans('cape-api::messages.title'))

@push('styles')
    <style>
        #capePreview {
            width: 350px;
            image-rendering: crisp-edges; /* Firefox */
            image-rendering: pixelated; /* Chrome and Safari */
        }
    </style>
@endpush

@push('footer-scripts')
    <script>

        const capeInput = document.getElementById('cape');

        function handleFileChange(input, previewId) {
            if (!input.files || !input.files[0]) {
                return;
            }

            const file = input.files[0];

            if (file.name !== undefined && file.name !== '') {
                document.getElementById(input.id + 'Label').innerText = file.name;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                const preview = document.getElementById(previewId);
                preview.src = e.currentTarget.result;
                preview.classList.remove('d-none');
            };

            reader.readAsDataURL(file);
        }

        capeInput.addEventListener('change', function () {
            handleFileChange(this, 'capePreview');
        });
    </script>
@endpush

@section('content')
     <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('cape-api.updateCape') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2>{{ trans('cape-api::messages.changeCape') }}</h2>

                <div class="mb-3">
                    <label for="cape">{{ trans('cape-api::messages.cape') }}</label>
                    <div class="custom-file">
                        <input type="file" class="form-control @error('cape') is-invalid @enderror" id="cape" name="cape" accept=".png,.jpg,.jpeg,.gif" required>
                        <label class="form-label" for="cape" data-browse="{{ trans('messages.actions.browse') }}" id="capeLabel"></label>
                        @error('cape')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <img src="{{ $capeUrl }}" alt="{{ trans('cape-api::messages.cape') }}" id="capePreview" class="mt-3 img-fluid">
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
