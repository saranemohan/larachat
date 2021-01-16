<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel Chat') }}
        </h2>
    </x-slot>

    <div class="py-6">

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
                        <div class="border-b-2 border-fuchsia-600 pb-3 mb-4">
                            <h1 class="text-xl">Aswina</h1>
                            <p class="text-gray-400">aswina@techfriar.com</p>
                        </div>
                        <div>
                            <x-chat-message class="justify-self-end">
                                How's it ?
                            </x-chat-message>
                            <x-chat-message class="justify-self-start">
                                Nice Work!
                            </x-chat-message>
                            <x-chat-message class="justify-self-end">
                                Thank You
                            </x-chat-message>
                            <x-chat-message class="justify-self-start">
                                Welcome
                            </x-chat-message>
                        </div>
                        <div class="grid grid-cols-6 gap-4 mt-4">
                            <div class="col-span-5">
                                <x-input id="message" class="w-full" type="text" name="message" placeholder="Message" :value="old('message')" autofocus />
                            </div>
                            <div class="">
                                <x-button class="w-full justify-center"> {{ __('Send') }} </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>