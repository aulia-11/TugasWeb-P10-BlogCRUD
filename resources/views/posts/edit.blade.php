@extends('layouts.master')

@section('title', 'Edit Postingan')

@section('content')

    <div class="header">
        <div>
            <h1>Edit Postingan</h1>
            <p>Perbarui data postingan kamu.</p>
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
            action="{{ route('posts.update', $post) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Postingan</label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $post->title) }}"
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
                >{{ old('content', $post->content) }}</textarea>

                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar Postingan</label>

                @if($post->image)
                    <div style="margin-bottom: 10px;">
                        <p style="margin-bottom: 8px;">
                            Gambar saat ini:
                        </p>

                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            style="
                                max-width: 250px;
                                max-height: 180px;
                                object-fit: cover;
                                border-radius: 8px;
                            "
                        >
                    </div>
                @endif

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
                    Pilih gambar baru jika ingin mengganti gambar.
                    Maksimal 2 MB.
                </small>
            </div>

            <div class="actions">

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('posts.show', $post) }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </x-card>

@endsection