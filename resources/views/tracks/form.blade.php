<div class="text-center font-semibold text-black">
    {{ __($title) }}
</div>
<form class="mt-8" action="{{ $route }}" method="post" enctype="multipart/form-data">
    @csrf
    @isset($track)
        @method('PUT')
    @endisset
    <div class="mx-auto max-w-lg ">
        <div class="py-1">
            <span class="px-1 text-sm text-gray-600">
                {{ __('Title') }}
            </span>
            <input type="text" name="title"
                @isset($track) value="{{ $track->title }}" @endisset
                class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="py-1">
            <span class="px-1 text-sm text-gray-600">
                {{ __('Audio') }}
            </span>
            <div class="flex justify-between items-center gap-2">
                @isset($track)
                <audio controls class="pt-4">
                    <source scr="{{ $track->getUrl() }}" type="audio/mp3">
                </audio>
                @endisset
                <input type="file" name="music"
                    class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
            </div>
            @error('music')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit"
            class="mt-3 text-lg font-semibold
            bg-gray-800 w-full text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
            {{ __($button) }}
        </button>
    </div>
</form>
