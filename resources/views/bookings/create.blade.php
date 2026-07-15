<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Guru: ' . ($tutor->full_name ?? $tutor->name)) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('bookings.store', $tutor) }}">
                        @csrf
                        
                        <!-- Tutor Info -->
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <img src="{{ $tutor->avatar ? '/uploads/avatars/' . $tutor->avatar : 'https://via.placeholder.com/80' }}" 
                                     alt="{{ $tutor->full_name }}" class="w-16 h-16 rounded-full">
                                <div class="ml-4">
                                    <h3 class="font-bold text-lg">{{ $tutor->full_name ?? $tutor->name }}</h3>
                                    <p class="text-gray-600">{{ $tutor->city }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="mb-4">
                            <label for="subject" class="block font-medium text-sm text-gray-700">Mata Pelajaran</label>
                            <input type="text" name="subject" id="subject" 
                                   value="{{ old('subject', $tutor->subjects) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Session Date -->
                        <div class="mb-4">
                            <label for="session_date" class="block font-medium text-sm text-gray-700">Tanggal & Waktu</label>
                            <input type="datetime-local" name="session_date" id="session_date" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            @error('session_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Duration -->
                        <div class="mb-4">
                            <label for="duration" class="block font-medium text-sm text-gray-700">Durasi (menit)</label>
                            <select name="duration" id="duration" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                <option value="60">60 menit - Rp {{ number_format($tutor->privateTutor->hourly_rate ?? 0) }}</option>
                                <option value="90">90 menit - Rp {{ number_format(($tutor->privateTutor->hourly_rate ?? 0) * 1.5) }}</option>
                                <option value="120">120 menit - Rp {{ number_format(($tutor->privateTutor->hourly_rate ?? 0) * 2) }}</option>
                            </select>
                            @error('duration')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="mb-4">
                            <label for="notes" class="block font-medium text-sm text-gray-700">Catatan (opsional)</label>
                            <textarea name="notes" id="notes" rows="3" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                      placeholder="Catatan tambahan untuk guru...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('tutors.show', $tutor) }}" class="mr-4 text-gray-600 hover:text-gray-900">Batal</a>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Kirim Permintaan Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>