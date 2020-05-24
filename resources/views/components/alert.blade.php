<div>
    @if(Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ Session::get('success') }} </span>
        </div>
    @elseif(Session::get('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{Session::get('error')}} </span>
        </div>
    @endif

    {{-- Validation Error --}}
    @if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{$error}} </span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>