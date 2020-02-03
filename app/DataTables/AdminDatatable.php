<?php

namespace App\DataTables;

use App\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminDatatable extends DataTable
{
 


    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.dataTables.buttonAction.edit')
            ->addColumn('delete', 'admin.dataTables.buttonAction.delete');


    }


    // public function query(Admin $model)
    // {
    //     return $model->newQuery();
    // }


    public function query()
        {
            $admin = Admin::select();

            return $this->applyScopes($admin);
        }


  public static function langJson(){

  return [
             "sEmptyTable"=>     trans("admin.sEmptyTable"),
             "sInfo"=>           trans("admin.sInfo"),
             "sInfoEmpty"=>      trans('admin.login'),
             "sInfoFiltered"=>   trans("admin.sInfoFiltered"),
             "sInfoPostFix"=>    "",
             "sInfoThousands"=>      ".",
             "sLengthMenu"=>     trans("admin.sLengthMenu"),
             "sLoadingRecords"=>     trans("admin.sLoadingRecords"),
             "sProcessing"=>     trans("admin.sLoadingRecords"),
             "sSearch"=>         trans("admin.sSearch"),
             "sZeroRecords"=>    trans("admin.sZeroRecords"),
             "oPaginate"=> [
                 "sFirst"=>      trans("admin.sFirst"),
                 "sPrevious"=>   trans("admin.sPrevious"),
                 "sNext"=>       trans("admin.sNext"),
                 "sLast"=>       trans("admin.sLast")
             ],
             "oAria"=> [
                 "sSortAscending"=>  ": aktivieren, um Spalte aufsteigend zu sortieren",
                 "sSortDescending"=> ": aktivieren, um Spalte absteigend zu sortieren"
             ]
         ];

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
                    ->language(self::langJson());
    }

    protected function getColumns()
    {
        return [
    
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('edit')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::computed('delete')
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
