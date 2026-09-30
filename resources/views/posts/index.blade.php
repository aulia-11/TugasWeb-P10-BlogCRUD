@extends('layouts.master')

@section('title', 'Daftar Postingan')

@section('content')

    <div class="header">
        <div>
            <h1>Daftar Postingan</h1>
            <p>Kelola postingan blog kamu di sini.</p>
        </div>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            + Tambah Postingan
        </a>
    </div>

    {{-- Form Search --}}
    <form
        action="{{ route('posts.index') }}"
        method="GET"
        style="margin-bottom: 20px;"
    >
        <div style="display: flex; gap: 10px;">

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Cari judul atau isi postingan..."
            >

            <button type="submit" class="btn btn-primary">
                Cari
            </button>

            @if($search)
                <a
                    href="{{ route('posts.index') }}"
                    class="btn btn-secondary"
                >
                    Reset
                </a>
            @endif

        </div>
    </form>

    {{-- Pesan Berhasil --}}
    @if(session('success'))
        <x-alert
            type="success"
            :message="session('success')"
        />
    @endif

    {{-- Pesan Error --}}
    @if(session('error'))
        <x-alert
            type="error"
            :message="session('error')"
        />
    @endif

    {{-- Daftar Postingan --}}
    @forelse($posts as $post)

        <x-card>

            <h2>{{ $post->title }}</h2>

            {{-- Gambar Postingan --}}
            @if($post->image)
                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->title }}"
                    style="
                        width: 100%;
                        max-width: 350px;
                        height: 200px;
                        object-fit: cover;
                        border-radius: 8px;
                        margin-top: 15px;
                        margin-bottom: 10px;
                    "
                >
            @endif

            {{-- Isi Singkat Postingan --}}
            <p style="margin: 10px 0;">
                {{ Str::limit($post->content, 150) }}
            </p>

            {{-- Tanggal --}}
            <small>
                Dibuat:
                {{ $post->created_at->format('d M Y H:i') }}
            </small>

            {{-- Tombol Aksi --}}
            <div class="actions" style="margin-top: 15px;">

                {{-- Tombol Lihat --}}
                <a
                    href="{{ route('posts.show', $post) }}"
                    class="btn btn-secondary"
                >
                    Lihat
                </a>

                {{-- Tombol Edit --}}
                <a
                    href="{{ route('posts.edit', $post) }}"
                    class="btn btn-warning"
                >
                    Edit
                </a>

                {{-- Tombol Hapus --}}
                <form
                    action="{{ route('posts.destroy', $post) }}"
                    method="POST"
                    style="display: inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus postingan ini?')"
                    >
                        Hapus
                    </button>
                </form>

            </div>

        </x-card>

    @empty

        {{-- Jika Tidak Ada Postingan --}}
        <x-card>
            <p>Belum ada postingan.</p>
        </x-card>

    @endforelse

    {{-- Pagination --}}
    <div class="pagination">
        {{ $posts->links() }}
    </div>

@endsection