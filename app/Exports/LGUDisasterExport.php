<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;

class LGUDisasterExport implements  FromQuery, WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    
    use Exportable;

    protected $monthDisaster;
    protected $yearDisaster;

    function __construct($monthDisaster, $yearDisaster)
    {
        $this->monthDisaster = $monthDisaster;
        $this->yearDisaster = $yearDisaster;
    }

    public function query()
    {
        //return DisasterReport::all();

        $data = DB::table('disaster_reports')
            ->join('disaster_affected_streets', 'disaster_reports.id', '=', 'disaster_affected_streets.disaster_id')
            ->where('disaster_reports.month_disaster', $this->monthDisaster)
            ->where('disaster_reports.year_disaster', $this->yearDisaster)
            ->orderBy('disaster_reports.id');
        
        return $data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Type of Disaster',
            'Name of Disaster',
            'Month of Disaster',
            'Day of Disaster',
            'Year of Disaster',
            'Barangay',
            'Total Number of Families Affected',
            'Total Number fo Individuals Affected',
            'Total Number of Evacuees',
            'Created At',
            'Updated At',
            'Disaster ID',
            'Affected Streets',
            'Number of Families Affected per Street'
        ];
    }

    public function registerEvents(): array{
        return [
            Aftersheet::class => function (AfterSheet $event){
                $event->sheet->getStyle('A1:O1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
