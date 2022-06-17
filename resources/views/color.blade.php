<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="grid grid-cols-2">
                        @foreach($colors as $color)
                            @php
                             $userHasColor = in_array($color->id, $userToChange->colors()->pluck('color_id')->toArray())
                            @endphp
                            <form
                                class="h-64"
                                style="background-color: {{ $color->hex_code }}"
                                action="{{ route($userHasColor ? 'deleteUserColor' : 'changeUserColor',['user' => $userToChange]) }}"
                                method="POST">
                                @csrf
                                @method(($userHasColor ? 'delete' : 'patch'))
                                <input name="color" type="hidden" value="{{ $color->name }}">
                                <button class="h-full w-full flex items-center justify-center" type="submit">
                                    @if($userHasColor)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    @else

                                    @endif
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
