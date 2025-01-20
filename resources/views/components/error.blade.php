@if ($errors->any())
    <div class="py-2 text-center bg-red-500 text-white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
