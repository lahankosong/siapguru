<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru Privat - Bigenzi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">
                <i class="fas fa-graduation-cap mr-2"></i>Bigenzi
            </a>
            <a href="/" class="text-gray-700 hover:text-blue-600">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </nav>

    <!-- Header -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Temukan Guru Privat Terbaik</h1>
            <p class="text-lg">Cari guru sesuai mata pelajaran dan lokasi Anda</p>
        </div>
    </section>

    <!-- Search & Filter -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <form method="GET" class="flex flex-col md:flex-row gap-4">
                <input type="text" name="subject" placeholder="Mata pelajaran (Matematika, Fisika, dll)" 
                       class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ request('subject') }}">
                <input type="text" name="city" placeholder="Kota/Kecamatan" 
                       class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ request('city') }}">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
            </form>
        </div>
    </section>

    <!-- Tutors List -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($tutors as $tutor)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="{{ $tutor->avatar ? '/uploads/avatars/' . $tutor->avatar : 'https://via.placeholder.com/80' }}" 
                                 alt="{{ $tutor->full_name }}" class="w-16 h-16 rounded-full mr-4">
                            <div>
                                <h3 class="font-bold text-lg">{{ $tutor->full_name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $tutor->city }}</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700">Mata Pelajaran:</p>
                            <p class="text-sm text-gray-600">{{ $tutor->subjects }}</p>
                        </div>
                        
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="text-yellow-500">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </span>
                                <span class="ml-2 text-sm text-gray-600">4.9 (100+ ulasan)</span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Mulai dari</p>
                                <p class="font-bold text-blue-600">Rp75.000</p>
                            </div>
                        </div>
                        
                        <div class="flex space-x-2">
                            <a href="/tutors/{{ $tutor->id }}" class="flex-1 text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                                Lihat Profil
                            </a>
                            <button class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
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
            @if($tutors->hasPages())
            <div class="mt-8">
                {{ $tutors->links() }}
            </div>
            @endif
        </div>
    </section>
</body>
</html>