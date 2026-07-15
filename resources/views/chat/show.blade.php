<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $chat->userOne->full_name ?? $chat->userOne->name }} & {{ $chat->userTwo->full_name ?? $chat->userTwo->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col h-[500px]">
                    <!-- Messages -->
                    <div class="flex-1 p-4 overflow-y-auto">
                        @foreach($chat->messages as $message)
                            <div class="mb-4 {{ Auth::id() === $message->sender_id ? 'text-right' : 'text-left' }}">
                                <div class="inline-block max-w-xs lg:max-w-md px-4 py-2 rounded-lg {{ Auth::id() === $message->sender_id ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800' }}">
                                    <p class="text-sm">{{ $message->message }}</p>
                                    <p class="text-xs {{ Auth::id() === $message->sender_id ? 'text-blue-200' : 'text-gray-500' }} mt-1">
                                        {{ $message->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Message Form -->
                    <div class="p-4 border-t">
                        <form method="POST" action="{{ route('chat.message', $chat) }}" class="flex gap-2">
                            @csrf
                            <input type="text" name="message" placeholder="Ketik pesan..." 
                                   class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>