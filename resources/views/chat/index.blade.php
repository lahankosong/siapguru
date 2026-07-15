<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Obrolan Anda</h3>
                    
                    @forelse($chats as $chat)
                        @php
                            $otherUser = Auth::id() === $chat->user_one_id ? $chat->userTwo : $chat->userOne;
                        @endphp
                        <a href="{{ route('chat.show', $chat) }}" class="flex items-center p-4 border-b hover:bg-gray-50">
                            <img src="{{ $otherUser->avatar ? '/uploads/avatars/' . $otherUser->avatar : 'https://via.placeholder.com/50' }}" 
                                 alt="{{ $otherUser->full_name }}" class="w-12 h-12 rounded-full">
                            <div class="ml-4 flex-1">
                                <p class="font-semibold">{{ $otherUser->full_name ?? $otherUser->name }}</p>
                                <p class="text-sm text-gray-600">
                                    {{ $chat->messages->first() ? Str::limit($chat->messages->first()->message, 50) : 'Belum ada pesan' }}
                                </p>
                            </div>
                            <span class="text-xs text-gray-500">
                                {{ $chat->messages->first() ? $chat->messages->first()->created_at->diffForHumans() : '' }}
                            </span>
                        </a>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-comment text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">Belum ada obrolan</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>