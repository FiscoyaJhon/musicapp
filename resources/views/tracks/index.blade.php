<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between" >
            <h2>
                Listado de canciones
            </h2>
            <a href="{{ route('tracks.create') }}" class="bg-blue-500 rounded px-4 py-2">
                Nueva Cancion
            </a>
        </div>
    </x-slot>
    <div>
        <div class="grid grid-cols-4 gap-2">
            @foreach ($tracks as $track)
                <div class="rounded bg-blue-300 p-6">
                    {{ $track->title }}
                    <audio controls class="pt-4">
                        <source scr="{{ $track->getUrl() }}" type="audio/mp3">
                    </audio>
                </div>
                <div class="my-4 flex justify-between">
                    <a href="{{ route('tracks.edit', ['track' => $track]) }}"
                         class="bg-orange-400 rounded px-2 py-4">
                            {{ __('Edit') }}
                    </a>
                    <form action="{{ route('tracks.destroy', ['track' => $track]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-400 rounded px-2 py-4">
                        {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>