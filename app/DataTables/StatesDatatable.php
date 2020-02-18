<?php

namespace App\DataTables;

use App\State;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StatesDatatable extends DataTable
{
 


    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.dataTables.buttonAction.states.edit')
            ->addColumn('delete', 'admin.dataTables.buttonAction.states.delete');


    }




    public function query()
        {
            $admin = State::with('country','city')->select();

            return $this->applyScopes($admin);
        }




    public function html()
    {
        return $this->builder()
                    ->setTableId('admindatatable-table')
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
                    )
                    ->language(datatableLang());
    }

    protected function getColumns()
    {
        return [
    
            Column::make('id'),
            Column::make('state_name_en')->title(trans('admin.name_en')),
            Column::make('state_name_ar')->title(trans('admin.name_ar')),
            Column::make('country.name_'.langLocal())->title(trans('admin.country')),
            Column::make('city.city_name_'.langLocal())->title(trans('admin.city')),
            Column::make('created_at')->title(trans('admin.tb_created')),
            Column::make('updated_at')->title(trans('admin.tb_updated')),
            Column::computed('edit')
                  ->title(trans('admin.tb_edit'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::computed('delete')
                  ->title(trans('admin.tb_delete'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }


    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
