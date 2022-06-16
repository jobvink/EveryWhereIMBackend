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
                        <form class="h-64 bg-green-300" action="{{ route('changeUserColor', ['user' => $userToChange]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input name="color" type="hidden" value="green">
                            <button class="h-full w-full" type="submit">&nbsp;</button>
                        </form>
                        <form class="h-64 bg-red-300" action="{{ route('changeUserColor', ['user' => $userToChange]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input name="color" type="hidden" value="red">
                            <button class="h-full w-full" type="submit">&nbsp;</button>
                        </form>
                        <form class="h-64 bg-yellow-300" action="{{ route('changeUserColor', ['user' => $userToChange]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input name="color" type="hidden" value="yellow">
                            <button class="h-full w-full" type="submit">&nbsp;</button>
                        </form><form class="h-64 bg-blue-300" action="{{ route('changeUserColor', ['user' => $userToChange]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <input name="color" type="hidden" value="blue">
                            <button class="h-full w-full" type="submit">&nbsp;</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
