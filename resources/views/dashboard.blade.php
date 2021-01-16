<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="grid grid-cols-4 gap-4">
            <div class="col-start-1 col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="grid grid-flow-row auto-rows-max gap-1">
                            @foreach ($users as $user)
                            <x-list-item class="ml-3">
                                {{ $user->name }}
                            </x-list-item>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-start-2 col-span-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>