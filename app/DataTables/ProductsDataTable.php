<?php

namespace App\DataTables;

use App\Http\Traits\ProductTrait;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    use ProductTrait;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('show', function ($query) {
                return '<a class="btn btn-outline-info"  href="' . route('admin.product.show', $query->product) . '">
                            <i class="far fa-eye"></i>
                        </a>';
            })
            ->editColumn('product_id', function ($query) {
                return '<a class="text-outline-info"  href="' . route('admin.product.show', $query->product) . '">
               ' . $query->product->id . '
                        </a>';
            })
            ->editColumn('edit', function ($query) {
                return '<a class="btn btn-outline-primary"  href="' . route('admin.product.edit', $query->product) . '">
                            <i class="fas fa-pen"></i>
                        </a>';
            })
            ->editColumn('delete', 'admin.pages.product.columns.delete')
            ->editColumn('store.name', function ($query) {
                return $query->store->name ?? '';
            })
            ->editColumn('product.published', function ($query) {
                if ($query->product->published == 1) {
                    return "<span class='text-success'>ظاهر</span>";
                }
                return "<span class='text-danger'>مخفي</span>";
            })
            ->editColumn('unit.name', function ($query) {
                return $query->unit->name ?? '';
            })
            ->editColumn('product.category.name', function ($query) {
                return $query->product->category->name ?? '';
            })
            ->editColumn('product.supplier.name', function ($query) {
                return $query->product->supplier->name ?? '';
            })
            ->rawColumns(['edit', 'show', 'delete', 'product.published', 'product_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model): QueryBuilder
    {
        return $this->getProductsForDataTable();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Blfrtip',
                'lengthMenu'   => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons'      => [
                    ['extend' => 'print', 'className' => 'btn btn-primary mr-5px', 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'excel', 'className' => 'btn btn-success ', 'text' => '<i class="fa fa-file"></i> Export '],
                ],
                'order' => [
                    0, 'desc'
                ],
                'scrollX' => true,
                'initComplete' => "function() {
                    this.api().columns().every(function() {
                        var that = this;
                        $('input', this.header()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                if (this.id == 'exact') {
                                    var val = this.value;
                                    that.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                } else {
                                    that.search(this.value).draw();
                                }
                            }
                        });
                    });
                }",
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            ['name' => 'product_id', 'data' => 'product_id', 'title' => 'رقم الهوية <input type="text" style="width:100px" id="exact" />'],
            ['name' => 'product.name', 'data' => 'product.name', 'title' => 'اسم المنتج <input type="text" style="width:200px" />'],
            ['name' => 'store.name', 'data' => 'store.name', 'title' => 'المخزن <input type="text" style="width:100px" />'],
            ['name' => 'unit.name', 'data' => 'unit.name', 'title' => 'الوحدة <input type="text" style="width:100px" />'],
            ['name' => 'count', 'data' => 'count', 'title' => 'الكمية <input type="text" style="width:100px" />'],
            ['name' => 'buy_price', 'data' => 'buy_price', 'title' => 'سعر الشراء <input type="text" style="width:100px" />'],
            ['name' => 'trade_price', 'data' => 'trade_price', 'title' => 'سعر الجملة <input type="text" style="width:100px" />'],
            ['name' => 'discount', 'data' => 'discount', 'title' => 'الخصم <input type="text" style="width:100px" />'],
            ['name' => 'price', 'data' => 'price', 'title' => 'السعر القطاعي <input type="text" style="width:100px" />'],
            ['name' => 'expire_date', 'data' => 'expire_date', 'title' => 'تاريخ الانتهاء <input type="text" style="width:100px" />'],
            ['name' => 'product.category.name', 'data' => 'product.category.name', 'title' => 'التصنيف <input type="text" style="width:100px" />'],
            ['name' => 'product.supplier.name', 'data' => 'product.supplier.name', 'title' => 'المورد <input type="text" style="width:100px" />'],
            ['name' => 'product.published', 'data' => 'product.published', 'title' => 'حالة النشر <input type="text" style="width:100px" />'],
            ['name' => 'show', 'data' => 'show', 'title' => 'تفاصيل', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
            ['name' => 'edit', 'data' => 'edit', 'title' => 'تعديل', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
            ['name' => 'delete', 'data' => 'delete', 'title' => 'حذف', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
