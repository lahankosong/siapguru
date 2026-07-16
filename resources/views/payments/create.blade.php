<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Detail Pembayaran</h3>
                    
                    <div class="border rounded-lg p-4 mb-6">
                        <div class="flex justify-between mb-2">
                            <span>Guru:</span>
                            <span class="font-semibold">{{ $booking->tutor->full_name ?? $booking->tutor->name }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Mata Pelajaran:</span>
                            <span class="font-semibold">{{ $booking->subject }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Tanggal:</span>
                            <span class="font-semibold">{{ $booking->session_date->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Durasi:</span>
                            <span class="font-semibold">{{ $booking->duration }} menit</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total:</span>
                            <span class="text-blue-600">Rp {{ number_format($booking->price) }}</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('payment.store', $booking) }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block font-medium text-sm mb-2">Metode Pembayaran</label>
                            <select name="payment_method" class="w-full border-gray-300 rounded-md" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="manual">Transfer Manual (Bank/Gopay)</option>
                                <option value="midtrans">Midtrans (Kartu/ATM/QRIS)</option>
                                <option value="duitku">Duitku (E-money)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm mb-2">Bukti Pembayaran (opsional)</label>
                            <input type="file" name="payment_proof" accept="image/*" class="w-full border-gray-300 rounded-md">
                            <p class="text-sm text-gray-500 mt-1">Upload bukti transfer jika metode manual</p>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Konfirmasi Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>