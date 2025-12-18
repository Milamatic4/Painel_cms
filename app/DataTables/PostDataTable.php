<?php

namespace App\DataTables;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class PostDataTable extends DataTable
{
    /**
     * Build DataTable class.
     * 
     * @param QueryBuilder<Post> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Editar', function($query){
                $editar = '<a href="'.route('posts.edit', $query->id).'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';

                $deletar = '<a href="'.route('posts.destroy', $query->id).'" class="btn btn-primary delete-item ml-2 mr-2" ><i class="fa fa-trash-alt"></i></a>';

                return $editar . $deletar;
            })
            ->addColumn('status', function($query){
                if ($query->status == 'S') {
                $status = 

                '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input muda-status">
                <span class="custom-switch-indicator"></span>
                </label>
                ';
                } else {
                    return 
                '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input muda-status">
                <span class="custom-switch-indicator"></span>
                </label>
                ';
                }
                return $status;
            })
            ->addColumn('capa', function($query){
                $capa = '<img src="'.asset('storage/'.$query->capa).'" width="30%" height="auto">';
                return $capa;
            })
            ->addColumn('created_at',  function($query){
                return $data = date('d/m/Y H:i:s', strtotime($query->created_at));
            })
            ->addColumn('updated_at',  function($query){
                return $data = date('d/m/Y H:i:s', strtotime($query->updated_at));
            })

            ->rawColumns(['Editar', 'capa', 'status', 'created_at'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $model
     * @return QueryBuilder<Post> 
     */

    public function query(Post $model): QueryBuilder
    {
    $idUser = Auth::id(); //serve o conteúdo de acordo com o id do usuário logado
    $tipo = 'postAdmin'; //separa pelo tipo de conteúdo
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
            //->setTableId('slide-destaque-table')
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
            Column::make('capa')->title('Capa'),
            Column::make('titulo')->title('Título'),
            Column::make('status')->title('Status'),
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
        return 'Posts_' . date('YmdHis');
    }
}
