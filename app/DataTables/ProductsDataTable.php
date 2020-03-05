<?php

namespace App\DataTables;

use App\Model\Products;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
 


    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.dataTables.buttonAction.products.edit')
            ->addColumn('delete', 'admin.dataTables.buttonAction.products.delete');


    }




    public function query()
        {
            $admin = Products::select();

            return $this->applyScopes($admin);
        }




    public function html()
    {
        return $this->builder()
                    ->setTableId('admindatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->responsive(true)
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
            Column::make('title')->title(trans('admin.title')),
            Column::make('content')->title(trans('admin.content')),
            Column::make('price')->title(trans('admin.price')),
            Column::make('price_offer')->title(trans('admin.price_offer')),
            Column::make('stock')->title(trans('admin.stock')),
            // Column::make('created_at')->title(trans('admin.tb_created')),
            // Column::make('updated_at')->title(trans('admin.tb_updated')),
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
