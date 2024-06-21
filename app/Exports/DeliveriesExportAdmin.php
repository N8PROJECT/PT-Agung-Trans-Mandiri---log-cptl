<?php

namespace App\Exports;

use App\Models\Delivery;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DeliveriesExportAdmin implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;
    protected $kurir;

    public function __construct($startDate, $endDate, $kurir)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->kurir = $kurir;
    }

    public function collection(): Collection
    {
        $query = Delivery::with('capital_branch')
                           ->whereBetween('tanggal_kirim', [$this->startDate, $this->endDate]);

        if ($this->kurir != 'all') {
            $query->where('user_id', $this->kurir);
        }
        $deliveries = $query->get()
                ->map(function ($delivery) {
                    return [
                        'area' => $delivery->area,
                        'tanggal_kirim' => $delivery->tanggal_kirim,
                        'pengirim' => $delivery->pengirim,
                        'cabang_pengirim' => $delivery->cabang_pengirim,
                        'tujuan' => $delivery->tujuan,
                        'cabang_tujuan' => $delivery->capital_branch->name,
                        'code_branch' => $delivery->capital_branch->code, // Ambil code_branch dari relasi
                        'nomor_segel' => $delivery->nomor_segel,
                        'kota' => $delivery->kota,
                        'jenis_kiriman' => $delivery->jenis_kiriman,
                        'jumlah' => $delivery->jumlah,
                        'nama_penerima' => $delivery->nama_penerima,
                        'tanggal_terima' => $delivery->tanggal_terima,
                        'nama_kurir' => $delivery->user->name
                    ];
                });

        $deliveries->prepend([
            'Area', 'Tanggal Kirim', 'Pengirim', 'Cabang Pengirim', 'Tujuan', 
            'Cabang Tujuan', 'Code Branch', 'Nomor Segel', 'Kota', 'Jenis Kiriman', 'Jumlah', 'Nama Penerima', 
            'Tanggal Terima', 'Nama Kurir'
        ]);

        return $deliveries;
    }
    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Styling baris pertama (header)
            1 => [
                'font' => ['bold' => true],
                'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFFF00']]
            ],
        ];
    }
}
