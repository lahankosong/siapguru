BIGENZI 2.0
The Largest Private Tutor Marketplace

Bukan sekadar tempat mencari guru, tetapi sebuah ekosistem pendidikan.

Pilar 1 — Discovery

Ini adalah halaman yang pertama kali dibuka siswa.

Misalnya seperti Tokopedia mencari barang.

Tetapi yang dicari adalah guru.

Contohnya:

Saya ingin belajar...

☑ Matematika
☑ Bahasa Inggris
☑ Mengaji
☑ Piano
☑ Coding
☑ Akuntansi
☑ Public Speaking
☑ IELTS
☑ CPNS
☑ SBMPTN
☑ Desain Grafis
☑ Renang
☑ Gitar
☑ Editing Video

Lalu filter

Online
Offline
Datang ke rumah
Rumah guru
Harga
Rating
Pengalaman
Kota
Kecamatan
Bahasa

Pilar 2 — Marketplace

Inilah inti bisnisnya.

Setiap guru memiliki "toko".

Misalnya

Guru :
Ayu Pratiwi

★★★★★ 4.9

Mengajar

✔ Matematika SD
✔ Matematika SMP
✔ Olimpiade

Harga

60 menit = Rp75.000

90 menit = Rp100.000

120 menit = Rp140.000

Jam tersedia

Senin
08.00-11.00
19.00-21.00

Selasa
...

Button

Pesan Sekarang
Chat
Ikuti

Persis seperti marketplace.

Pilar 3 — Booking Engine

Ini bagian yang belum ada pada konsep awal.

Contoh:

1.
Pilih guru

↓

2.
Pilih mapel

↓

3.
Pilih paket

↓

4.
Pilih tanggal

↓

5.
Pilih jam

↓

6.
Pembayaran

↓

7.
Guru menerima

↓

8.
Kelas berlangsung

↓

9.
Review

Semuanya otomatis.

Pilar 4 — Calendar

Guru memiliki kalender.

Misalnya

Senin

08-09 Terisi

09-10 Kosong

10-11 Kosong

11-12 Terisi

Siswa tidak bisa booking jadwal yang sudah penuh.

Ini akan menjadi fitur yang sangat penting.

Pilar 5 — Radius

Kalau offline.

Misalnya

Guru berada di

Purwokerto

Radius mengajar

5 km

Siswa yang berada di luar radius tidak bisa memesan.

Atau ada tambahan biaya transport.

Misalnya

0-5 km

Gratis

5-10 km

+20.000

10-20 km

+40.000

Pilar 6 — Chat

Chat sebelum booking

Chat sesudah booking

Kirim

Foto
PDF
Voice note
Lokasi

Pilar 7 — Video Meeting

Untuk kelas online.

Tidak perlu Zoom.

Bisa memakai

WebRTC
Livekit
Jitsi Meet

Langsung dari website.

Pilar 8 — Progress Belajar

Setelah selesai mengajar.

Guru mengisi

Hari ini

Materi :

Pecahan

Nilai

80

PR

Halaman 25

Catatan

Perlu latihan lagi.

Orang tua bisa melihat perkembangan anak.

Pilar 9 — Marketplace Course

Guru bisa menjual

Video

PDF

Bank Soal

Template

Modul

Ebook

Jadi tidak hanya mengajar privat.

Pilar 10 — Komunitas

Mirip Facebook.

Guru posting

Tips belajar

Video

Artikel

Siswa bisa follow.

Di sinilah fitur artikel yang sudah Anda rancang tetap memiliki peran sebagai sarana membangun reputasi guru.

Pilar 11 — Guru Verified

Semua guru memiliki badge.

Misalnya

🥉 Bronze

🥈 Silver

🥇 Gold

💎 Platinum

Naik berdasarkan

jumlah murid
rating
jam mengajar
sertifikat
respons chat
penyelesaian kelas

Pilar 12 — Sistem Reputasi

Setiap selesai kelas.

Siswa memberi

★★★★★

Komunikasi

★★★★★

Ketepatan waktu

★★★★★

Penguasaan materi

★★★★★

Kesabaran

Nilai ini akan menentukan peringkat guru.

Pilar 13 — Orang Tua

Banyak marketplace hanya fokus pada guru dan siswa.

Padahal yang membayar sering kali adalah orang tua.

Karena itu tambahkan role baru:

Parent

Fitur:

booking untuk anak
melihat progres
pembayaran
chat guru
laporan bulanan
riwayat kelas

Ini akan membuat platform lebih relevan untuk segmen K-12.

Pilar 14 — AI Assistant

Ini pembeda terbesar dibanding kompetitor.

Misalnya setelah guru selesai mengajar.

AI membantu membuat

rangkuman materi
latihan soal otomatis
PR otomatis
evaluasi
rekomendasi materi berikutnya

Guru cukup menekan tombol Generate, lalu AI menyusun draft yang bisa diedit sebelum dikirim ke siswa.

Role yang Saya Sarankan

Saya akan mengembangkan role menjadi:

Role	Fungsi
Admin	Mengelola seluruh sistem
Tutor	Membuka jasa mengajar
Student	Mengikuti kelas
Parent	Memesan kelas dan memantau anak
Author	Menulis artikel edukasi
Verifikator	Memeriksa dokumen guru
Finance	Mengelola pembayaran dan pencairan
Customer Service	Menangani komplain dan bantuan

Model Monetisasi

Agar bisnis berkelanjutan, pendapatan bisa berasal dari beberapa sumber:

Komisi per transaksi (misalnya 10–15% dari biaya les).
Langganan tutor (fitur premium seperti prioritas pencarian, analitik, atau promosi).
Penjualan kursus digital dan modul.
Iklan atau penempatan tutor unggulan (Featured Tutor).
Paket untuk sekolah atau lembaga yang ingin merekrut tutor dalam jumlah besar.

Saran Arsitektur

Melihat proyek Anda sudah menggunakan Laravel 11 + Breeze dan memisahkan role dengan middleware, saya menyarankan untuk mengubah paradigma dari "platform artikel yang memiliki fitur tutor" menjadi "marketplace tutor yang memiliki fitur artikel". Dengan begitu:

Artikel menjadi alat membangun kredibilitas guru, bukan fitur utama.
Profil tutor menjadi pusat aktivitas.
Booking, kalender, pembayaran, dan progres belajar menjadi inti bisnis.
Semua fitur lain (chat, artikel, komunitas, AI) mendukung proses tersebut.

Marketplace besar seperti Tokopedia, Shopee, bahkan Ruangguru pun tidak langsung memiliki seluruh fitur pembayaran yang matang. Untuk tahap awal, fokuslah membuktikan bahwa guru dan murid bisa saling menemukan, berkomunikasi, dan membuat janji belajar. Pembayaran bisa dilakukan di luar sistem (transfer bank, QRIS pribadi guru, tunai, atau e-wallet). Platform hanya berperan sebagai penghubung (matchmaking platform).

Dengan pendekatan ini, pengembangan menjadi jauh lebih sederhana:

Tidak perlu payment gateway.
Tidak perlu settlement.
Tidak perlu pencairan dana.
Tidak perlu menangani refund.
Tidak perlu menghitung komisi otomatis.
Risiko hukum dan teknis jauh lebih kecil.

Ketika jumlah pengguna sudah mulai bertambah, Anda baru bisa menambahkan payment gateway sebagai fitur opsional.

---

## Roadmap Pengembangan ke Laravel

### Keuntungan Migrasi ke Laravel
- **Ecosystem yang kaya**: Eloquent ORM, Blade templating, Artisan commands
- **Built-in authentication**: Laravel Breeze/Jetstream untuk auth system
- **Queue & Job**: Untuk proses AI, email, notifikasi
- **API Ready**: Laravel Sanctum untuk API authentication
- **Testing**: PHPUnit integration built-in
- **Package ecosystem**: Ribuan package siap pakai

### Rencana Migrasi (Phase by Phase)

#### Phase 1: Foundation (Laravel + Core Features)
- [x] Setup Laravel 12 project (bigenzi-laravel)
- [x] Database migration (9 migration files migrated)
- [x] Authentication system (Breeze)
- [x] Role-based middleware (admin, tutor, student, parent)
- [x] User profile management
- [x] Basic article system (model + controller)
```

#### Phase 2: Marketplace Core
- [x] Tutor discovery & search
- [x] Tutor profile marketplace
- [x] Booking system (basic)
- [x] Calendar integration
- [x] Chat system (real-time)

#### Phase 3: Advanced Features
- [x] Payment integration (midtrans, duitku)
- [x] Video meeting (Jitsi API)
- [x] Progress tracking
- [x] Course marketplace
- [ ] Community features

#### Phase 4: AI & Scaling
- [ ] AI Assistant integration
- [ ] Reputation system
- [ ] Parent dashboard
- [ ] Verification system
- [ ] Analytics & reporting

---

## Alternatif Frontend Stack (Interaktif & Modern)

### Opsi 1: Tailwind CSS + Alpine.js (Rekomendasi)
```bash
# Install
npm install -D tailwindcss alpinejs
```
- **Keuntungan**: Ringan, utility-first, reactive
- **Komponen**: Flowbite, DaisyUI, atau custom
- **Animasi**: Alpine.js transitions
- **Contoh**: Filter interaktif, modal, dropdown yang smooth

### Opsi 2: Vue.js 3 + Vite
```bash
# Install
composer require laravel/ui
php artisan ui vue
npm install vue@next vite
```
- **Keuntungan**: Reactive, component-based
- **UI Library**: Naive UI, PrimeVue, atau Quasar
- **Fitur**: SPA experience, state management (Pinia)

### Opsi 3: React + Inertia.js
```bash
# Install
composer require inertiajs/inertia-laravel
npm install react react-dom
```
- **Keuntungan**: SPA experience, banyak library
- **UI Library**: Material UI, Chakra UI, Tailwind UI

### Opsi 4: Livewire (Laravel Ecosystem)
```bash
# Install
composer require livewire/livewire
```
- **Keuntungan**: PHP-only, reactive tanpa JavaScript
- **Komponen**: Livewire UI components
- **Cocok untuk**: Tim yang fokus PHP

---

## Rekomendasi Stack untuk Bigenzi 2.0

### Backend: Laravel 11
- **Database**: MySQL 8.0 / PostgreSQL
- **Cache**: Redis
- **Queue**: Redis / Database
- **Storage**: Laravel Filesystem (local/S3)

### Frontend: Tailwind CSS + Alpine.js + Livewire
- **UI Kit**: Flowbite atau Pines UI
- **Icon**: Heroicons atau Tabler Icons
- **Rich Text**: Trix Editor (built-in Laravel) atau TinyMCE
- **Calendar**: FullCalendar.js
- **Video**: Jitsi External API

### Fitur Tambahan
- **Real-time**: Laravel Echo + Pusher/Soketi
- **AI**: OpenAI API integration
- **Payment**: Midtrans/Duitku API
- **Maps**: Google Maps API (untuk radius)

---

## Prioritas Pengembangan MVP

### Sprint 1-2: Core Marketplace
1. User registration & profile
2. Tutor discovery (search/filter)
3. Basic booking system
4. Chat functionality

### Sprint 3-4: Booking & Calendar
1. Calendar availability
2. Booking management
3. Basic payment flow
4. Session tracking

### Sprint 5-6: Enhancement
1. Review & rating system
2. Progress tracking
3. Course marketplace
4. Parent role

---

## Model Monetisasi

| Sumber | Persentase | Keterangan |
|--------|------------|------------|
| Komisi transaksi | 10-15% | Dari biaya les |
| Langganan premium | - | Fitur tutor premium |
| Penjualan kursus | - | Digital content |
| Iklan featured | - | Tutor unggulan |
| Paket instansi | - | Sekolah/lembaga |

---

## Lisensi

Private project - Bigenzi Platform 2.0