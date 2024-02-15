<?php

namespace Database\Seeders;

use App\Models\CapitalBranch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CapitalBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            "Daanmogot" => 181,
            "Taman Palem" => 141,
            "Kayu Besar" => null,
            "Cengkareng" => 165,
            "Duta Mas" => 148,
            "Latumenten" => 171,
            "Grogol" => 184,
            "Roxy" => 122,
            "Kapuk Gresida" => 166,
            "Pantai Indah Kapuk" => 162,
            "Muara Karang" => 177,
            "Pluit Kencana" => 137,
            "Jembatan Dua" => 144,
            "Bandengan" => 174,
            "Teluk Gong" => 163,
            "Kebon Jeruk Baru" => 152,
            "Puri Indah" => 133,
            "Arjuna Utara" => 173,
            "Tanjung Duren" => 179,
            "Green Ville" => 120,
            "Caringin" => 176,
            "Pangeran Jayakarta" => 131,
            "Harco Mangga Dua" => 140,
            "Mangga Dua" => 116,
            "Kopi / Kota" => 164,
            "Asemka" => 142,
            "Jembatan Lima" => 170,
            "Gajah Mada" => null,
            "Gunung Sahari" => 129,
            "Sawah Besar" => 124,
            "Glodok" => 112,
            "Hayam Wuruk" => 129,
            "Tn Abang Bukit" => 150,
            "Metro Tn Abang" => 125,
            "Sona Topaz" => null,
            "Plz Klp Gading" => 157,
            "Klp Gading Boulevard" => 119,
            "Sunter" => 132,
            "ITC Cempaka Mas" => 177,
            "Rawa Sari" => 149,
            "Jatinegara" => 118,
            "Salemba" => 143,
            "Plaza Menteng" => 154,
            "Cikini" => 77,
            "Fatmawati" => 158,
            "Simatupang" => 135,
            "Panglima Polim" => 115,
            "Ratu Plaza" => 178,
            "Plaza Semanggi" => 147,
            "Wolter Monginsidi" => null,
            "Radio Dalam" => 126,
            "Arteri Pd Indah" => 182,
            "Kebayoran Lama" => 169,
            "Permata Hijau" => 136,
            "Palmerah" => 145,
            "Citicon" => 155,
            "Pasar Minggu" => 167,
            "Mampang" => 130,
            "Tebet" => 168,
            "Wisma Kodel Kuningan" => 123,
            "Mega Kuningan" => 128,
            "Menara Hijau" => 156,
            "Cikarang" => null,
            "Sumarecon Bekasi" => null,
            "Plz Pulogadung" => 172
        ];
        
        foreach ($branches as $name => $code) {
            CapitalBranch::create([
                'name' => $name,
                'code' => $code,
            ]);
        }        
    }
}
