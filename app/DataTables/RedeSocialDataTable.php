<?php

namespace App\DataTables;

use App\Models\RedeSocial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class RedeSocialDataTable extends DataTable
{
    /**
     * Build DataTable class.
     * 
     * @param QueryBuilder<RedeSocial> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Editar', function($query){
                $editar = '<a href="'.route('redes-sociais.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
                $deletar = '<a href="'.route('redes-sociais.destroy', $query->id).'" class="btn btn-primary delete-item ml-2 mr-2" ><i class="fa fa-trash-alt"></i></a>';

                return $editar . $deletar;
            })

            ->addColumn('icone', function($query){
                $icone = '<i class="'.$query->icone.'" style="font-size: 24px;"></i>';
                return $icone;
            })

            ->addColumn('created_at',  function($query){
                return $data = date('d/m/Y H:i:s', strtotime($query->created_at));
            })

            ->addColumn('updated_at',  function($query){
                return $data = date('d/m/Y H:i:s', strtotime($query->updated_at));
            })

            ->rawColumns(['Editar', 'icone'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param RedeSocial $model
     * @return QueryBuilder<RedeSocial>
     */

    public function query(RedeSocial $model): QueryBuilder
    {
        $idUser = Auth::id(); //serve o conteúdo de acordo com o id do usuário logado
        $tipo = 'redeSocialAdmin'; //separa pelo tipo de conteúdo
        return $model->newQuery()
        ->where('tipo', $tipo)
        ->where('usuario', $idUser);
    }

    /**
     * Optional method if you want to use the html builder.
     */

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('redes-sociais-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->language([
                'url' => asset ('backend/assets/traducao-datatable-brasil-ms/pt-BR.json')
            ])
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */

    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('created_at')->title('Criado'),
            Column::make('icone')->title('Ícone'),
            Column::make('nome')->title('Nome'),
            Column::make('updated_at')->title('Atualizado'),
            Column::computed('Editar')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),

            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RedeSocial_' . date('YmdHis');
    }
}
