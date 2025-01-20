@if (session('message'))

    <div class="py-2 text-center bg-green-500 text-white">
        {{ session('message') }}
    </div>

@endif
