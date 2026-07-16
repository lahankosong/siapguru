<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('tutor.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Basic Info -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold mb-4">Informasi Dasar</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-medium text-sm">Nama Lengkap</label>
                                    <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block font-medium text-sm">No. Telepon</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block font-medium text-sm">Kota</label>
                                    <input type="text" name="city" value="{{ old('city', $user->city) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block font-medium text-sm">Provinsi</label>
                                    <input type="text" name="province" value="{{ old('province', $user->province) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="mb-6">
                            <label class="block font-medium text-sm">Bio / Deskripsi</label>
                            <textarea name="bio" rows="3" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                      placeholder="Deskripsi tentang diri Anda...">{{ old('bio', $user->bio) }}</textarea>
                        </div>

                        <!-- Subjects -->
                        <div class="mb-6">
                            <label class="block font-medium text-sm">Mata Pelajaran (pisahkan koma)</label>
                            <input type="text" name="subjects" value="{{ old('subjects', $user->subjects) }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                   placeholder="Matematika, Fisika, Kimia">
                        </div>

                        <!-- Pricing -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold mb-4">Harga & Pengalaman</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-medium text-sm">Tarif per Jam (Rp)</label>
                                    <input type="number" name="hourly_rate" value="{{ old('hourly_rate', $tutorProfile->hourly_rate ?? '') }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                
                                <div>
                                    <label class="block font-medium text-sm">Pengalaman (tahun)</label>
                                    <input type="number" name="experience_years" value="{{ old('experience_years', $tutorProfile->experience_years ?? 0) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <label class="block font-medium text-sm">Kualifikasi</label>
                                <textarea name="qualifications" rows="2" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                          placeholder="Pendidikan, sertifikat, dll...">{{ old('qualifications', $tutorProfile->qualifications ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Availability -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold mb-4">Jadwal Mengajar</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                @php
                                    $days = ['monday' => 'Senin', 'tuesday' => 'Selasa', 'wednesday' => 'Rabu', 
                                             'thursday' => 'Kamis', 'friday' => 'Jumat', 'saturday' => 'Sabtu', 'sunday' => 'Minggu'];
                                @endphp
                                
                                @foreach($days as $dayKey => $dayName)
                                    @php
                                        $availability = $availabilities->where('day', $dayKey)->first();
                                    @endphp
                                    <div class="border rounded-lg p-3">
                                        <p class="font-semibold mb-2">{{ $dayName }}</p>
                                        <div class="space-y-2">
                                            <input type="time" name="availabilities[{{ $dayKey }}][start]" 
                                                   value="{{ $availability->start_time ?? '' }}" 
                                                   class="w-full border-gray-300 rounded-md text-sm"
                                                   onchange="updateAvailability('{{ $dayKey }}', this.value, 'end')">
                                            <input type="time" name="availabilities[{{ $dayKey }}][end]" 
                                                   value="{{ $availability->end_time ?? '' }}" 
                                                   class="w-full border-gray-300 rounded-md text-sm">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Simpan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>