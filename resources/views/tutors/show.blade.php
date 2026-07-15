<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $tutor->full_name ?? $tutor->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tutor Profile Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row items-start md:items-center">
                        <img src="{{ $tutor->avatar ? '/uploads/avatars/' . $tutor->avatar : 'https://via.placeholder.com/120' }}" 
                             alt="{{ $tutor->full_name }}" class="w-32 h-32 rounded-full">
                        
                        <div class="ml-0 md:ml-6 mt-4 md:mt-0 flex-1">
                            <h1 class="text-3xl font-bold">{{ $tutor->full_name ?? $tutor->name }}</h1>
                            
                            <div class="flex items-center mt-2">
                                <div class="text-yellow-500">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star{{ $i < ($tutor->privateTutor->rating ?? 0) ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600">{{ $tutor->privateTutor->rating ?? 0 }}/5.0</span>
                                <span class="ml-4 text-gray-500">({{ $tutor->privateTutor->total_students ?? 0 }} murid)</span>
                            </div>
                            
                            <p class="text-gray-600 mt-2">{{ $tutor->city }}</p>
                            
                            <div class="mt-4 flex space-x-3">
                                <a href="{{ route('chat.create', $tutor) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    <i class="fas fa-comment mr-2"></i>Chat
                                </a>
                                <a href="{{ route('booking.create', $tutor) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    <i class="fas fa-calendar-check mr-2"></i>Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor Details -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- About -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Tentang Guru</h2>
                            <p class="text-gray-700">{{ $tutor->bio ?? 'Belum ada deskripsi' }}</p>
                        </div>
                    </div>

                    <!-- Teaching Subjects -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Mata Pelajaran yang Diajarkan</h2>
                            <div class="flex flex-wrap gap-2">
                                @if($tutor->subjects)
                                    @foreach(explode(',', $tutor->subjects) as $subject)
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ trim($subject) }}</span>
                                    @endforeach
                                @else
                                    <span class="text-gray-500">Belum ada mata pelajaran</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Articles by Tutor -->
                    @if($tutor->articles->count() > 0)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Materi Terbaru dari Guru</h2>
                            <div class="space-y-4">
                                @foreach($tutor->articles as $article)
                                <div class="border-b pb-4 last:border-0">
                                    <h3 class="font-semibold">{{ $article->title }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($article->content, 150) }}</p>
                                    <a href="{{ route('articles.show', $article) }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Pricing -->
                    @if($tutor->privateTutor)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Paket Harga</h2>
                            <div class="space-y-3">
                                <div class="border rounded-lg p-3">
                                    <p class="font-semibold">60 menit</p>
                                    <p class="text-blue-600 font-bold">Rp {{ number_format($tutor->privateTutor->hourly_rate * 1) }}</p>
                                </div>
                                <div class="border rounded-lg p-3">
                                    <p class="font-semibold">90 menit</p>
                                    <p class="text-blue-600 font-bold">Rp {{ number_format($tutor->privateTutor->hourly_rate * 1.5) }}</p>
                                </div>
                                <div class="border rounded-lg p-3">
                                    <p class="font-semibold">120 menit</p>
                                    <p class="text-blue-600 font-bold">Rp {{ number_format($tutor->privateTutor->hourly_rate * 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Experience -->
                    @if($tutor->privateTutor && $tutor->privateTutor->experience_years > 0)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Pengalaman</h2>
                            <p class="text-gray-700">{{ $tutor->privateTutor->experience_years }} tahun mengajar</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>