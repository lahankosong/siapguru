<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $course->thumbnail ? '/storage/' . $course->thumbnail : 'https://via.placeholder.com/800x400' }}" 
                     alt="{{ $course->title }}" class="w-full h-64 object-cover">
                
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $course->type_label }}</span>
                        <span class="text-gray-500">{{ $course->subject }}</span>
                    </div>

                    <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
                    
                    <div class="flex items-center mb-4">
                        <img src="{{ $course->tutor->avatar ? '/storage/' . $course->tutor->avatar : 'https://via.placeholder.com/40' }}" 
                             alt="{{ $course->tutor->name }}" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="font-semibold">{{ $course->tutor->full_name ?? $course->tutor->name }}</p>
                            <p class="text-sm text-gray-500">Pengajar</p>
                        </div>
                    </div>

                    <p class="text-gray-700 mb-6">{{ $course->description }}</p>

                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500">Harga</p>
                                <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($course->price) }}</p>
                            </div>
                            
                            <a href="{{ route('tutors.show', $course->tutor) }}" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-900">
                                Hubungi Guru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>