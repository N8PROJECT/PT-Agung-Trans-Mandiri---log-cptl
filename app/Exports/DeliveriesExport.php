<?php

namespace App\Exports;

use App\Models\Delivery;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DeliveriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate, $userId)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->userId = $userId;
    }

    public function collection(): Collection
    {
        $deliveries = Delivery::with('capital_branch')
            ->whereBetween('tanggal_kirim', [$this->startDate, $this->endDate])
            ->where('user_id', $this->userId) // Filter deliveries by user_id
            ->get()
            ->map(function ($delivery) {
                return [
                    'area' => $delivery->area,
                    'tanggal_kirim' => $delivery->tanggal_kirim,
                    'pengirim' => $delivery->pengirim,
                    'cabang_pengirim' => $delivery->cabang_pengirim,
                    'tujuan_dokumen' => $delivery->tujuan_dokumen,
                    'cabang_tujuan' => $delivery->capital_branch->name,
                    'code_branch' => $delivery->capital_branch->code,
                    'kota' => $delivery->kota,
                    'jenis_kiriman' => $delivery->jenis_kiriman,
                    'nama_penerima' => $delivery->nama_penerima,
                    'tanggal_terima' => $delivery->tanggal_terima,
                    'nama_kurir' => $delivery->user->name
                ];
            });

        $deliveries->prepend([
            'Area', 'Tanggal Kirim', 'Pengirim', 'Cabang Pengirim', 'Tujuan Dokumen',
            'Cabang Tujuan', 'Code Branch', 'Kota', 'Jenis Kiriman', 'Nama Penerima',
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
