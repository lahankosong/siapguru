<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Kursus Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('tutor.courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block font-medium text-sm">Judul Kursus</label>
                            <input type="text" name="title" required class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Deskripsi</label>
                            <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Tipe Kursus</label>
                            <select name="type" required class="mt-1 block w-full border-gray-300 rounded-md">
                                <option value="">-- Pilih Tipe --</option>
                                <option value="video">Video</option>
                                <option value="pdf">PDF</option>
                                <option value="bank_soal">Bank Soal</option>
                                <option value="template">Template</option>
                                <option value="modul">Modul</option>
                                <option value="ebook">Ebook</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">File Kursus</label>
                            <input type="file" name="file_path" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Thumbnail</label>
                            <input type="file" name="thumbnail" accept="image/*" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Harga (Rp)</label>
                            <input type="number" name="price" required class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Durasi (menit)</label>
                            <input type="number" name="duration" class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Level</label>
                            <select name="level" class="mt-1 block w-full border-gray-300 rounded-md">
                                <option value="">-- Pilih Level --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm">Mata Pelajaran</label>
                            <input type="text" name="subject" class="mt-1 block w-full border-gray-300 rounded-md">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Simpan Kursus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>