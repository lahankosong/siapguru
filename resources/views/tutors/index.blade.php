<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Temukan Guru Privat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search & Filter Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Cari nama guru..." 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <input type="text" name="subject" value="{{ request('subject') }}" 
                                   placeholder="Mata pelajaran..." 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <input type="text" name="city" value="{{ request('city') }}" 
                                   placeholder="Kota/Kecamatan..." 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                                <i class="fas fa-search mr-2"></i>Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tutor List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($tutors as $tutor)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="{{ $tutor->avatar ? '/uploads/avatars/' . $tutor->avatar : 'https://via.placeholder.com/80' }}" 
                                 alt="{{ $tutor->full_name }}" class="w-20 h-20 rounded-full">
                            <div class="ml-4">
                                <h3 class="font-bold text-lg">{{ $tutor->full_name ?? $tutor->name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $tutor->city }}</p>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <p class="text-sm font-semibold">Mata Pelajaran:</p>
                            <p class="text-sm text-gray-600">{{ $tutor->subjects ?? 'Belum diisi' }}</p>
                        </div>
                        
                        @if($tutor->privateTutor)
                        <div class="mb-3">
                            <p class="text-sm font-semibold">Harga per jam:</p>
                            <p class="text-sm text-blue-600 font-bold">Rp {{ number_format($tutor->privateTutor->hourly_rate ?? 0) }}</p>
                        </div>
                        @endif
                        
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-500">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star{{ $i < ($tutor->privateTutor->rating ?? 0) ? '' : '-o' }}"></i>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-gray-600">{{ $tutor->privateTutor->rating ?? 0 }}/5.0</span>
                        </div>
                        
                        <a href="{{ route('tutors.show', $tutor) }}" class="block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                            Lihat Profil
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-search text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Tidak ada guru yang ditemukan</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $tutors->links() }}
            </div>
        </div>
    </div>
</x-app-layout>