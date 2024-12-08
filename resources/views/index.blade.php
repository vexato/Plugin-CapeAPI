@extends('layouts.app')

@section('title', trans('capeapi::messages.title'))

@push('styles')
    <style>
        #capePreview {
            width: 350px;
            image-rendering: crisp-edges; /* Firefox */
            image-rendering: pixelated; /* Chrome and Safari */
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 10px;
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #skin_container {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 10px;
            width: 100%;
            max-width: 200px;
        }
    </style>
@endpush

@push('footer-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const capeInput = document.getElementById('cape');

            function handleFileChange(input, previewId) {
                if (!input.files || !input.files[0]) {
                    return;
                }

                const file = input.files[0];
                const preview = document.getElementById(previewId);

                if (file.name) {
                    document.getElementById(`${input.id}Label`).innerText = file.name;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }

            capeInput.addEventListener('change', function () {
                handleFileChange(this, 'capePreview');
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('capeapi::messages.changeCape') }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('capeapi.updateCape') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="cape" class="form-label">{{ trans('capeapi::messages.cape') }}</label>
                    <div class="custom-file">
                        <input
                            type="file"
                            class="form-control @error('cape') is-invalid @enderror"
                            id="cape"
                            name="cape"
                            accept=".png,.jpg,.jpeg,.gif"
                            required
                        >
                        <label class="form-label" for="cape" data-browse="{{ trans('messages.actions.browse') }}" id="capeLabel">
                            {{ trans('messages.actions.choose_file') }}
                        </label>
                        @error('cape')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 text-center">
                        <img
                            src="{{ $capeUrl }}"
                            alt="{{ trans('capeapi::messages.cape') }}"
                            id="capePreview"
                            class="img-thumbnail mt-3 {{ $capeUrl ? '' : 'd-none' }}"
                            style="max-width: 100%;"
                        >
                    </div>
                    <div class="col-md-6 text-center">
                        @plugin('skin3d')

                        <canvas id="skin_container" class="border rounded shadow-sm" style="cursor: grab;"></canvas>
                        @push('scripts')
                            <script src="{{ plugin_asset('skin3d', 'js/skinview3d.bundle.min.js') }}"></script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const sk = 'https://minotar.net/skin/Steve';
                                    const canvas = document.getElementById("skin_container");

                                    let skinViewer = new skinview3d.SkinViewer({
                                        canvas: canvas,
                                        width: 150,
                                        height: 300,
                                        skin: sk,
                                    });
                                    skinViewer.loadCape('{{ $capeUrl }}');
                                    skinViewer.autoRotate = true;
                                });
                            </script>
                        @endpush
                        @endplugin
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
