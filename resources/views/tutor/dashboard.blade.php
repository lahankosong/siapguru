<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Dashboard - Bigenzi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-green-800 text-white min-h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">
                    <i class="fas fa-graduation-cap mr-2"></i>Bigenzi Tutor
                </h1>
            </div>
            <nav class="mt-4">
                <a href="/tutor/dashboard" class="block py-2 px-4 bg-green-700 text-white">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="/tutor/articles" class="block py-2 px-4 hover:bg-green-700">
                    <i class="fas fa-file-alt mr-2"></i>Materi Saya
                </a>
                <a href="/tutor/schedule" class="block py-2 px-4 hover:bg-green-700">
                    <i class="fas fa-calendar mr-2"></i>Jadwal Mengajar
                </a>
                <a href="/chat" class="block py-2 px-4 hover:bg-green-700">
                    <i class="fas fa-comments mr-2"></i>Chat Siswa
                </a>
                <a href="/tutor/profile" class="block py-2 px-4 hover:bg-green-700">
                    <i class="fas fa-user mr-2"></i>Profil
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Dashboard Guru</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-500 rounded-full">
                            <i class="fas fa-file-alt text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Total Materi</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-500 rounded-full">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Rating</p>
                            <p class="text-2xl font-bold">0.0</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-500 rounded-full">
                            <i class="fas fa-user-friends text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Total Siswa</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-500 rounded-full">
                            <i class="fas fa-comments text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Chat Belum Dibaca</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>