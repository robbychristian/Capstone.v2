<?php

namespace App\DataTables;

use App\Models\EvacuationCenters;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EvacuationCentersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'evacuationcenters.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EvacuationCenter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EvacuationCenters $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('evacuationcenters-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           'id',
           'added_by',
           'evac_name',
           'evac_latitude',
           'evac_longitude',
           'nearest_landmark',
           'brgy_loc',
           'phone_no',
           'capacity',
           'availability',
           'is_approved'
           
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'EvacuationCenters_' . date('YmdHis');
    }
}
