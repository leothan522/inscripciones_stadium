<?php

namespace App\Exports;

use App\Models\Evento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EventoExport implements FromView, ShouldAutoSize, WithTitle, WithStyles
{
    public $evento, $participantes;

    public function __construct($evento, $participantes)
    {
        $this->evento = $evento;
        $this->participantes= $participantes;
    }

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('dashboard.participantes.export')
            ->with('evento', $this->evento)
            ->with('participantes', $this->participantes);
    }

    public function title(): string
    {
        // TODO: Implement title() method.
        return "Atletas Registrados";
    }

    public function styles(Worksheet $sheet)
    {
        // TODO: Implement styles() method.
        return [
            // Style the first row as bold text.
            5    => [
                'font' => ['bold' => true],
                'fill' => ['fillType'   => Fill::FILL_SOLID, 'startColor' => ['argb' => Color::COLOR_CYAN]],
            ],
        ];
    }

}
