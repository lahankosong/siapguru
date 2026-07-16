<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kursus Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold">Daftar Kursus</h3>
                <a href="{{ route('tutor.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i>Buat Kursus Baru
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($courses as $course)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $course->thumbnail ? '/storage/' . $course->thumbnail : 'https://via.placeholder.com/400x200' }}" 
                         alt="{{ $course->title }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $course->type_label }}</span>
                        <h3 class="font-bold text-lg mt-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($course->description, 60) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-blue-600 font-bold">Rp {{ number_format($course->price) }}</span>
                            <span class="text-sm {{ $course->is_active ? 'text-green-600' : 'text-red-600' }}">
                                {{ $course->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-book text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Belum ada kursus</p>
                    <a href="{{ route('tutor.courses.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Buat Kursus Pertama
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>