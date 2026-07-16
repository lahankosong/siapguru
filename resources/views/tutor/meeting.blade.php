<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Video Meeting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="font-bold text-lg">Meeting dengan {{ $booking->student->full_name ?? $booking->student->name }}</h3>
                        <p class="text-gray-600">Mata Pelajaran: {{ $booking->subject }}</p>
                        <p class="text-gray-600">Waktu: {{ $booking->session_date->format('d M Y H:i') }}</p>
                    </div>

                    <div class="border rounded-lg overflow-hidden" style="height: 600px;">
                        <iframe 
                            src="https://meet.jit.si/bigenzi-{{ $booking->id }}-{{ Str::random(8) }}" 
                            width="100%" 
                            height="100%" 
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('bookings.show', $booking) }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                            Kembali ke Detail Booking
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>