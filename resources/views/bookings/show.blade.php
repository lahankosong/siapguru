<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Status Badge -->
                    <div class="mb-4">
                        @if($booking->status === 'pending')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">Menunggu Konfirmasi</span>
                        @elseif($booking->status === 'confirmed')
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Dikonfirmasi</span>
                        @elseif($booking->status === 'completed')
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Selesai</span>
                        @elseif($booking->status === 'cancelled')
                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">Dibatalkan</span>
                        @endif
                    </div>

                    <!-- Booking Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-bold text-lg mb-3">Informasi Sesi</h3>
                            <div class="space-y-2">
                                <p><span class="font-semibold">Mata Pelajaran:</span> {{ $booking->subject }}</p>
                                <p><span class="font-semibold">Tanggal & Waktu:</span> {{ $booking->session_date->format('d M Y H:i') }}</p>
                                <p><span class="font-semibold">Durasi:</span> {{ $booking->duration }} menit</p>
                                <p><span class="font-semibold">Total Harga:</span> Rp {{ number_format($booking->price) }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-bold text-lg mb-3">Guru</h3>
                            <div class="flex items-center">
                                <img src="{{ $booking->tutor->avatar ? '/uploads/avatars/' . $booking->tutor->avatar : 'https://via.placeholder.com/60' }}" 
                                     alt="{{ $booking->tutor->full_name }}" class="w-16 h-16 rounded-full">
                                <div class="ml-3">
                                    <p class="font-semibold">{{ $booking->tutor->full_name ?? $booking->tutor->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $booking->tutor->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($booking->notes)
                    <div class="mt-4">
                        <h3 class="font-bold text-lg mb-2">Catatan</h3>
                        <p class="text-gray-700">{{ $booking->notes }}</p>
                    </div>
                    @endif

                    <!-- Actions -->
                    <div class="mt-6 flex space-x-3">
                        @if(Auth::id() === $booking->tutor_id && $booking->status === 'pending')
                            <form method="POST" action="{{ route('bookings.confirm', $booking) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    Konfirmasi Booking
                                </button>
                            </form>
                        @endif

                        @if($booking->status === 'confirmed' && Auth::id() === $booking->tutor_id)
                            <form method="POST" action="{{ route('bookings.complete', $booking) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Tandai Selesai
                                </button>
                            </form>
                        @endif

                        @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                            <form method="POST" action="{{ route('bookings.cancel', $booking) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700"
                                        onclick="return confirm('Yakin ingin membatalkan booking ini?')">
                                    Batalkan
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('chat.create', $booking->tutor) }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-comment mr-2"></i>Chat dengan Guru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>