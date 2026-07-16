<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kursus Digital') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter -->
            <div class="mb-6 flex flex-wrap gap-4">
                <select onchange="filterCourses()" id="typeFilter" class="border-gray-300 rounded-md">
                    <option value="">Semua Tipe</option>
                    <option value="video">Video</option>
                    <option value="pdf">PDF</option>
                    <option value="bank_soal">Bank Soal</option>
                    <option value="template">Template</option>
                    <option value="modul">Modul</option>
                    <option value="ebook">Ebook</option>
                </select>
                
                <input type="text" id="subjectFilter" placeholder="Mata pelajaran..." 
                       class="border-gray-300 rounded-md px-3 py-1"
                       onkeyup="filterCourses()">
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="coursesGrid">
                @forelse($courses as $course)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $course->thumbnail ? '/storage/' . $course->thumbnail : 'https://via.placeholder.com/400x200' }}" 
                         alt="{{ $course->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $course->type_label }}</span>
                        <h3 class="font-bold text-lg mt-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($course->description, 80) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-blue-600 font-bold">Rp {{ number_format($course->price) }}</span>
                            <a href="{{ route('courses.show', $course) }}" class="text-sm text-blue-600 hover:text-blue-800">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-book text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Belum ada kursus tersedia</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $courses->links() }}
            </div>
        </div>
    </div>

    <script>
        function filterCourses() {
            const type = document.getElementById('typeFilter').value;
            const subject = document.getElementById('subjectFilter').value;
            const url = new URL(window.location);
            if (type) url.searchParams.set('type', type);
            else url.searchParams.delete('type');
            if (subject) url.searchParams.set('subject', subject);
            else url.searchParams.delete('subject');
            window.location = url;
        }
    </script>
</x-app-layout>