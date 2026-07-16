<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\PrivateTutor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create dummy tutors
        $tutors = [
            [
                'name' => 'Ayu Pratiwi',
                'full_name' => 'Ayu Pratiwi, S.Pd',
                'email' => 'ayu@bigenzi.com',
                'password' => Hash::make('password'),
                'role' => 'tutor',
                'city' => 'Jakarta',
                'bio' => 'Guru matematika berpengalaman 5 tahun mengajar di SMP/sederajat. Lulusan S2 Matematika ITB.',
                'subjects' => 'Matematika SD,Matematika SMP,Matematika SMA,Olimpiade',
                'phone' => '081234567890',
            ],
            [
                'name' => 'Budi Santoso',
                'full_name' => 'Budi Santoso, M.Pd',
                'email' => 'budi@bigenzi.com',
                'password' => Hash::make('password'),
                'role' => 'tutor',
                'city' => 'Bandung',
                'bio' => 'Guru fisika dan kimia dengan pengalaman 8 tahun. Pernah mengajar di SMAN favorit.',
                'subjects' => 'Fisika,Kimia,SMA IPA',
                'phone' => '081234567891',
            ],
            [
                'name' => 'Citra Dewi',
                'full_name' => 'Citra Dewi, S.S',
                'email' => 'citra@bigenzi.com',
                'password' => Hash::make('password'),
                'role' => 'tutor',
                'city' => 'Surabaya',
                'bio' => 'Guru bahasa Inggris native speaker. Pengalaman mengajar 10 tahun.',
                'subjects' => 'Bahasa Inggris SD,Bahasa Inggris SMP,Bahasa Inggris Umum',
                'phone' => '081234567892',
            ],
            [
                'name' => 'Dedi Kurniawan',
                'full_name' => 'Dedi Kurniawan',
                'email' => 'dedi@bigenzi.com',
                'password' => Hash::make('password'),
                'role' => 'tutor',
                'city' => 'Medan',
                'bio' => 'Guru mengaji dan tahfidz dengan metode jujar. Pengalaman 6 tahun.',
                'subjects' => 'Mengaji,Tahfidz,Quran',
                'phone' => '081234567893',
            ],
            [
                'name' => 'Eka Sari',
                'full_name' => 'Eka Sari, S.Kom',
                'email' => 'eka@bigenzi.com',
                'password' => Hash::make('password'),
                'role' => 'tutor',
                'city' => 'Makassar',
                'bio' => 'Programmer fullstack dengan pengalaman 4 tahun. Mengajar coding untuk pemula.',
                'subjects' => 'Coding,Web Development,Python',
                'phone' => '081234567894',
            ],
            [
                'name' => 'Fajar Rahman',
                'full_name' => 'Fajar Rahman',
                'email' => 'fajar@bigenzi.com',
                'password' => Hash::make('password'),
                'role' => 'tutor',
                'city' => 'Yogyakarta',
                'bio' => 'Guru play piano dan keyboard dengan pengalaman 7 tahun.',
                'subjects' => 'Piano,Keyboard,Musik',
                'phone' => '081234567895',
            ],
        ];

        foreach ($tutors as $tutorData) {
            $user = User::create($tutorData);
            
            // Create private tutor profile
            PrivateTutor::create([
                'user_id' => $user->id,
                'hourly_rate' => rand(50000, 150000),
                'rating' => rand(40, 50) / 10,
                'total_students' => rand(10, 100),
                'total_sessions' => rand(50, 500),
                'experience_years' => rand(1, 10),
                'qualifications' => 'Sarjana/S2 ' . $tutorData['subjects'],
                'is_available' => true,
            ]);
        }

        // Create dummy articles
        $articles = [
            [
                'title' => 'Tips Belajar Matematika yang Efektif untuk Anak SD',
                'content' => 'Belajar matematika untuk anak SD membutuhkan pendekatan yang tepat agar tidak terlalu membosankan...',
                'subject' => 'Matematika',
                'author_id' => 1,
                'status' => 'approved',
            ],
            [
                'title' => 'Strategi Mengaji yang Mudah Dipahami',
                'content' => 'Mengaji bukan hanya untuk anak kecil, remaja pun bisa mengaji dengan metode yang tepat...',
                'subject' => 'Mengaji',
                'author_id' => 4,
                'status' => 'approved',
            ],
            [
                'title' => 'Dasar-dasar Pemrograman untuk Pemula',
                'content' => 'Ingin belajar coding? Mulailah dari dasar-dasar logika pemrograman...',
                'subject' => 'Coding',
                'author_id' => 5,
                'status' => 'approved',
            ],
        ];

        foreach ($articles as $articleData) {
            Article::create($articleData);
        }

        $this->command->info('Dummy data created successfully!');
    }
}