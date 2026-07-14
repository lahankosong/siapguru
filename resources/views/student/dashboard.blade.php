<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Bigenzi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-blue-800 text-white min-h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">
                    <i class="fas fa-graduation-cap mr-2"></i>Bigenzi Student
                </h1>
            </div>
            <nav class="mt-4">
                <a href="/student/dashboard" class="block py-2 px-4 bg-blue-700 text-white">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="/student/tutors" class="block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-search mr-2"></i>Cari Guru
                </a>
                <a href="/student/articles" class="block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-book mr-2"></i>Materi
                </a>
                <a href="/chat" class="block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-comments mr-2"></i>Chat
                </a>
                <a href="/student/profile" class="block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-user mr-2"></i>Profil
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Dashboard Siswa</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Guru yang Diikuti</h2>
                    <p class="text-gray-500">Belum mengikuti guru</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold mb-4">Materi Terbaru</h2>
                    <p class="text-gray-500">Belum ada materi</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>