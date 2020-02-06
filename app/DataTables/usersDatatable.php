<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class usersDatatable extends DataTable
{
 


    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.dataTables.buttonAction.user.edit')
            ->addColumn('delete', 'admin.dataTables.buttonAction.user.delete');


    }


    // public function query(Admin $model)
    // {
    //     return $model->newQuery();
    // }


    public function query()
        {
            $admin = User::select();
            // $admin = User::when(request()->level,function($q){
            //     return $q->where("level",request()->level);
            // });


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
            Column::make('name')->title(trans('admin.tb_name')),
            Column::make('email')->title(trans('admin.tb_email')),
            Column::make('level')->title(trans('admin.level')),
            Column::make('created_at')->title(trans('admin.tb_created')),
            Column::make('updated_at')->title(trans('admin.tb_updated')),
            Column::computed('edit')
                  ->title(trans('admin.tb_edit'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(30)
                  ->addClass('text-center'),
            Column::computed('delete')
                  ->title(trans('admin.tb_delete'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(30)
                  ->addClass('text-center'),
        ];
    }


    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
