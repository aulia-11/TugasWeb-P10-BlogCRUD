@extends('layouts.master')

@section('title', 'Tambah Postingan')

@section('content')

    <div class="header">
        <div>
            <h1>Tambah Postingan</h1>
            <p>Buat postingan blog baru.</p>
        </div>
    </div>

    @if($errors->any())
        <x-alert
            type="error"
            message="Ada data yang belum sesuai. Silakan periksa kembali form."
        />
    @endif

    <x-card>

        <form
            action="{{ route('posts.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="form-group">
                <label for="title">Judul Postingan</label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul postingan"
                >

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Isi Postingan</label>

                <textarea
                    id="content"
                    name="content"
                    placeholder="Masukkan isi postingan"
                >{{ old('content') }}</textarea>

                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar Postingan</label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror

                <small>
                    Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>
            </div>

            <div class="actions">

                <button type="submit" class="btn btn-primary">
                    Simpan Postingan
                </button>

                <a
                    href="{{ route('posts.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </x-card>

@endsection