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
                            <x-list-item class="ml-3" href="{{ route('dashboard', ['receiver' => $user->id])  }}">
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
                            <h1 class="text-xl uppercase">{{$receiver->name}}</h1>
                            <p class="text-gray-400">{{$receiver->email}}</p>
                        </div>
                        <div id="message_area">

                            @foreach ($messages as $message)
                                @if($receiver->id==$message->receiver_id)
                                    <x-chat-message class=" justify-self-end">
                                        {{$message->message}}
                                    </x-chat-message>
                                @else 
                                    <x-chat-message class="justify-self-start ">
                                        {{$message->message}}
                                    </x-chat-message>
                                @endif
                            @endforeach

                        </div>
                        <form action="{{route("sendMessage")}}" method="post">
                            @csrf
                        <div class="grid grid-cols-6 gap-4 mt-4">
                            <input type="hidden" name="receiver_id" id="receiver_id" value="{{$receiver->id}}">
                            <input type="hidden" name="sender_id" id="sender_id" value="{{auth()->id()}}">
                            <div class="col-span-5">
                                <x-input id="message" class="w-full" type="text" name="message" placeholder="Message" :value="old('message')" autofocus />
                            </div>
                            <div class="">
                                <x-button class="w-full justify-center"> {{ __('Send') }} </x-button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <template id="message_template">
        <x-chat-message class="justify-self-start ">
            #message
        </x-chat-message>
    </template>


</x-app-layout>