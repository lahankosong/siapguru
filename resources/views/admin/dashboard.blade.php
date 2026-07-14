<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bigenzi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">
                    <i class="fas fa-graduation-cap mr-2"></i>Bigenzi Admin
                </h1>
            </div>
            <nav class="mt-4">
                <a href="/admin/dashboard" class="block py-2 px-4 bg-gray-700 text-white">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="/admin/articles" class="block py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-file-alt mr-2"></i>Kelola Artikel
                </a>
                <a href="/admin/users" class="block py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-users mr-2"></i>Kelola Pengguna
                </a>
                <a href="/admin/tutor-applications" class="block py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-user-tie mr-2"></i>Aplikasi Guru
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-500 rounded-full">
                            <i class="fas fa-file-alt text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Total Artikel</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-500 rounded-full">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Artikel Pending</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-500 rounded-full">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Total Pengguna</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-500 rounded-full">
                            <i class="fas fa-user-slash text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Suspended</p>
                            <p class="text-2xl font-bold">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>