<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigenzi - Platform Belajar Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">
                <i class="fas fa-graduation-cap mr-2"></i>Bigenzi
            </a>
            <div class="flex space-x-4">
                <a href="/articles" class="text-gray-700 hover:text-blue-600">Materi</a>
                <a href="/tutors" class="text-gray-700 hover:text-blue-600">Guru Privat</a>
                <a href="/about" class="text-gray-700 hover:text-blue-600">Tentang</a>
                <a href="/contact" class="text-gray-700 hover:text-blue-600">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white pt-20 pb-32">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Bigenzi 2.0</h1>
            <p class="text-xl mb-8">The Largest Private Tutor Marketplace</p>
            <p class="text-lg mb-12">Bukan sekadar tempat mencari guru, tetapi sebuah ekosistem pendidikan</p>
            
            <!-- Search Form -->
            <div class="max-w-2xl mx-auto bg-white rounded-lg p-4 shadow-lg">
                <form action="/tutors" method="GET" class="flex flex-col md:flex-row gap-2">
                    <input type="text" name="subject" placeholder="Mata pelajaran yang ingin Anda pelajari..." 
                           class="flex-1 px-4 py-2 rounded-lg text-gray-800 focus:outline-none">
                    <input type="text" name="city" placeholder="Kota/Kecamatan" 
                           class="flex-1 px-4 py-2 rounded-lg text-gray-800 focus:outline-none">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-search mr-2"></i>Cari Guru
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Tutors -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Guru Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($featuredTutors as $tutor)
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="{{ $tutor->avatar ? '/uploads/avatars/' . $tutor->avatar : 'https://via.placeholder.com/100' }}" 
                         alt="{{ $tutor->full_name }}" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <h3 class="font-bold text-lg">{{ $tutor->full_name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $tutor->subjects }}</p>
                    <div class="flex justify-center items-center mt-2">
                        <span class="text-yellow-500">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </span>
                        <span class="ml-2 text-gray-600">4.9</span>
                    </div>
                    <a href="/tutors/{{ $tutor->id }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Lihat Profil
                    </a>
                </div>
                @empty
                <div class="col-span-3 text-center">
                    <p class="text-gray-500">Belum ada guru unggulan</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Latest Articles -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Materi Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articles as $article)
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="font-bold text-lg mb-2">{{ $article->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($article->content, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $article->subject }}</span>
                        <span class="text-sm text-gray-500">{{ $article->views }} views</span>
                    </div>
                    <a href="/articles/{{ $article->id }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                @empty
                <div class="col-span-3 text-center">
                    <p class="text-gray-500">Belum ada materi</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Bigenzi Platform. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>