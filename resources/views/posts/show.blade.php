@extends('layouts.master')

@section('title', $post->title)

@section('content')

    <div class="header">
        <div>
            <h1>Detail Postingan</h1>
        </div>
    </div>

    <x-card>

        <h2>{{ $post->title }}</h2>

        {{-- Gambar Postingan --}}
        @if($post->image)
            <img
                src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->title }}"
                style="
                    width: 100%;
                    max-width: 600px;
                    max-height: 350px;
                    object-fit: cover;
                    border-radius: 10px;
                    margin-top: 15px;
                    margin-bottom: 15px;
                "
            >
        @endif

        <p style="margin: 10px 0; color: #777;">
            Dibuat pada:
            {{ $post->created_at->format('d M Y H:i') }}
        </p>

        <hr style="margin: 20px 0;">

        <p style="line-height: 1.8; white-space: pre-line;">
            {{ $post->content }}
        </p>

        <div class="actions" style="margin-top: 25px;">

            <a
                href="{{ route('posts.edit', $post) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('posts.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </x-card>

@endsection