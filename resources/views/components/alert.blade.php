@if($message)
    <div class="alert {{ $type ?? 'success' }}">
        {{ $message }}
    </div>
@endif