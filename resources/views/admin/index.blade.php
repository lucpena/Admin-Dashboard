<x-admin-master>
    @section('content')

        @if(auth()->user()->userHasRole('Admin'))
            <h1 class="h3 mb-4 text-gray-800">SAMPLE TEXT ADMIN</h1>
        @endif
        @if(auth()->user()->userHasRole('Editor'))
            <h1 class="h3 mb-4 text-gray-800">SAMPLE TEXT EDITOR</h1>
        @endif
        @if(auth()->user()->userHasRole('Leitor'))
            <h1 class="h3 mb-4 text-gray-800">SAMPLE TEXT LEITOR</h1>
        @endif

    @endsection
</x-admin-master>