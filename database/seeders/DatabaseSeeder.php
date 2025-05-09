<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(DatabaseSeeder::class);
        DB::table('soals')->insert([
            // Petualangan (10 soal)
            [
                'level' => 1,
                'pertanyaan' => 'Apa yang dimaksud dengan data?',
                'opsi_a' => 'Informasi acak',
                'opsi_b' => 'Informasi yang sudah disusun',
                'opsi_c' => 'Kumpulan fakta',
                'opsi_d' => 'Fakta tanpa arti',
                'jawaban_benar' => 'C',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 1,
                'pertanyaan' => 'Manakah yang merupakan data kuantitatif?',
                'opsi_a' => 'Warna baju',
                'opsi_b' => 'Jenis kelamin',
                'opsi_c' => 'Berat badan',
                'opsi_d' => 'Nama siswa',
                'jawaban_benar' => 'C',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 2,
                'pertanyaan' => 'Apa tujuan dari penyajian data dalam tabel?',
                'opsi_a' => 'Membuat data lebih banyak',
                'opsi_b' => 'Membingungkan pembaca',
                'opsi_c' => 'Mempermudah analisis',
                'opsi_d' => 'Menyembunyikan data',
                'jawaban_benar' => 'C',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 2,
                'pertanyaan' => 'Diagram batang cocok digunakan untuk menyajikan...',
                'opsi_a' => 'Data tidak berurutan',
                'opsi_b' => 'Data kualitatif yang sedikit',
                'opsi_c' => 'Data kuantitatif dalam kelompok',
                'opsi_d' => 'Data terus menerus',
                'jawaban_benar' => 'C',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 3,
                'pertanyaan' => 'Ukuran pemusatan data yang menunjukkan nilai tengah adalah...',
                'opsi_a' => 'Mean',
                'opsi_b' => 'Median',
                'opsi_c' => 'Modus',
                'opsi_d' => 'Range',
                'jawaban_benar' => 'B',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 3,
                'pertanyaan' => 'Modus dari data 3, 4, 4, 5, 6 adalah...',
                'opsi_a' => '4',
                'opsi_b' => '5',
                'opsi_c' => '6',
                'opsi_d' => '3',
                'jawaban_benar' => 'A',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 4,
                'pertanyaan' => 'Jika nilai mean dari 5 siswa adalah 8, maka jumlah total nilainya adalah...',
                'opsi_a' => '40',
                'opsi_b' => '30',
                'opsi_c' => '20',
                'opsi_d' => '10',
                'jawaban_benar' => 'A',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 4,
                'pertanyaan' => 'Langkah pertama dalam analisis data adalah...',
                'opsi_a' => 'Mengolah data',
                'opsi_b' => 'Mengumpulkan data',
                'opsi_c' => 'Menyajikan data',
                'opsi_d' => 'Menyimpulkan data',
                'jawaban_benar' => 'B',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 5,
                'pertanyaan' => 'Diagram garis cocok untuk...',
                'opsi_a' => 'Data yang tetap',
                'opsi_b' => 'Data yang berubah dari waktu ke waktu',
                'opsi_c' => 'Data berpasangan',
                'opsi_d' => 'Data statis',
                'jawaban_benar' => 'B',
                'tipe_game' => 'petualangan',
            ],
            [
                'level' => 5,
                'pertanyaan' => 'Data dari survei warna favorit termasuk data...',
                'opsi_a' => 'Kuantitatif diskrit',
                'opsi_b' => 'Kuantitatif kontinu',
                'opsi_c' => 'Kualitatif',
                'opsi_d' => 'Numerik',
                'jawaban_benar' => 'C',
                'tipe_game' => 'petualangan',
            ],

            // Multiplayer (10 soal)
            [
                'level' => 1,
                'pertanyaan' => 'Apa yang disebut ukuran pemusatan data?',
                'opsi_a' => 'Jumlah data',
                'opsi_b' => 'Nilai tengah data',
                'opsi_c' => 'Selisih data',
                'opsi_d' => 'Frekuensi data',
                'jawaban_benar' => 'B',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 1,
                'pertanyaan' => 'Mean dari 4, 5, 6, 5 adalah...',
                'opsi_a' => '4',
                'opsi_b' => '5',
                'opsi_c' => '6',
                'opsi_d' => '7',
                'jawaban_benar' => 'B',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 2,
                'pertanyaan' => 'Jika modus adalah 7, berarti...',
                'opsi_a' => 'Data rata-rata 7',
                'opsi_b' => 'Nilai 7 muncul paling sering',
                'opsi_c' => 'Nilai 7 paling kecil',
                'opsi_d' => 'Jumlah data 7',
                'jawaban_benar' => 'B',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 2,
                'pertanyaan' => 'Berikut ini adalah jenis penyajian data, kecuali...',
                'opsi_a' => 'Tabel',
                'opsi_b' => 'Diagram garis',
                'opsi_c' => 'Diagram tulang ikan',
                'opsi_d' => 'Diagram lingkaran',
                'jawaban_benar' => 'C',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 3,
                'pertanyaan' => 'Jika total nilai 6 siswa adalah 60, maka mean-nya adalah...',
                'opsi_a' => '6',
                'opsi_b' => '10',
                'opsi_c' => '12',
                'opsi_d' => '5',
                'jawaban_benar' => 'B',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 3,
                'pertanyaan' => 'Diagram lingkaran digunakan untuk menunjukkan...',
                'opsi_a' => 'Perbandingan bagian terhadap keseluruhan',
                'opsi_b' => 'Perubahan waktu',
                'opsi_c' => 'Nilai rata-rata',
                'opsi_d' => 'Selisih nilai',
                'jawaban_benar' => 'A',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 4,
                'pertanyaan' => 'Apa arti dari median?',
                'opsi_a' => 'Data dengan nilai terbesar',
                'opsi_b' => 'Data dengan frekuensi terbanyak',
                'opsi_c' => 'Data tengah setelah diurutkan',
                'opsi_d' => 'Jumlah seluruh data',
                'jawaban_benar' => 'C',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 4,
                'pertanyaan' => 'Berapa banyak data yang diperlukan untuk menentukan median?',
                'opsi_a' => '1',
                'opsi_b' => '2',
                'opsi_c' => 'Tergantung jumlah data',
                'opsi_d' => 'Semua salah',
                'jawaban_benar' => 'C',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 5,
                'pertanyaan' => 'Data nilai: 7, 8, 8, 9. Modus dari data tersebut adalah...',
                'opsi_a' => '7',
                'opsi_b' => '8',
                'opsi_c' => '9',
                'opsi_d' => 'Tidak ada',
                'jawaban_benar' => 'B',
                'tipe_game' => 'multiplayer',
            ],
            [
                'level' => 5,
                'pertanyaan' => 'Data 2, 3, 5, 7, 9. Median dari data tersebut adalah...',
                'opsi_a' => '5',
                'opsi_b' => '4',
                'opsi_c' => '6',
                'opsi_d' => '7',
                'jawaban_benar' => 'A',
                'tipe_game' => 'multiplayer',
            ],
        ]);
    }
}
