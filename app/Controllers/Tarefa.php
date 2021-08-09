<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarefaModel;
use App\Models\CategoriaModel;
use App\Models\ResponsavelModel;

/**
 * Controle responsavel pelas operações de registros de TAREFAS registrados.
 * 
 * @author Manoel Louro
 * @date 07/08/2021
 */
class Tarefa extends BaseController {

    /**
     * Model principal
     * @var TarefaModel
     */
    private $tarefaModel;

    /**
     * Nome da class
     * @var string
     */
    private $className = 'Tarefa';

    /**
     * Nome da class formatada
     * @var string
     */
    private $classNameFormatado = 'Tarefa';

    /**
     * Construtor
     */
    public function __construct() {
        $this->tarefaModel = new TarefaModel();
    }

    /**
     * FUNCTION
     * Controle geral de registros
     * 
     * @return array
     * @date 07/08/2021
     */
    public function index() {
        return view($this->className . '/index', [
            'className' => $this->className,
            'pageTitle' => $this->classNameFormatado . ' - Controle de registros',
            'registros' => $this->tarefaModel->getJoinRegistro()
        ]);
    }

    /**
     * FUNCTION
     * Abre formulario de CREATE/EDIT de registro
     * 
     * @return array
     * @date 07/08/2021
     */
    public function create() {
        $categoriaModel = new CategoriaModel();
        $responsavelModel = new ResponsavelModel();
        return view($this->className . '/form', [
            'className' => $this->className,
            'categorias' => $categoriaModel->withDeleted()->findAll(),
            'responsaveis' => $responsavelModel->withDeleted()->findAll(),
            'pageTitle' => $this->classNameFormatado . '- Cadastro de registro'
        ]);
    }

    /**
     * FUNCTION
     * Efetua INSERT/UPDATE através de POST informado.
     * 
     * @return array
     * @date 07/08/2021
     */
    public function store() {
        if ($this->tarefaModel->save($this->request->getPost())) {
            return view('messages', [
                'className' => $this->className,
                'pageTitle' => $this->classNameFormatado . '- Edição de registro #' . $this->request->getPost()['id'],
                'messageClass' => 'alert-success',
                'message' => 'Registro salvo com sucesso',
                'returnPage' => '/' . $this->className . '/index'
            ]);
        } else {
            echo 'Ocorreu um erro';
        }
    }

    /**
     * FUNCTION
     * Efetua função de DELETE de registro informado. 
     * 
     * @param type $id ID do registro
     * @return array
     * @date 07/08/221
     */
    public function delete($id) {
        if ($this->tarefaModel->delete($id)) {
            return view('messages', [
                'className' => $this->className,
                'pageTitle' => $this->classNameFormatado . '- Exclusão de registro #' . $id,
                'messageClass' => 'alert-success',
                'message' => $this->classNameFormatado . ' foi excluída com sucesso',
                'returnPage' => '/' . $this->className . '/index'
            ]);
        } else {
            echo 'Ocorreu um erro';
        }
    }

    /**
     * FUNCTION
     * Efetua função de DELETE de registro informado. 
     * 
     * @param type $id ID do registro
     * @return array
     * @date 07/08/221
     */
    public function finish($id) {
        if ($this->tarefaModel->setFinalizarTarefa($id)) {
            return view('messages', [
                'className' => $this->className,
                'pageTitle' => $this->classNameFormatado . '- Finalização de registro #' . $id,
                'messageClass' => 'alert-success',
                'message' => $this->classNameFormatado . ' foi finalizada com sucesso',
                'returnPage' => '/' . $this->className . '/index'
            ]);
        } else {
            echo 'Ocorreu um erro';
        }
    }

    /**
     * FUNCTION
     * Abre formulario de EDIÇÃO de registro.
     * 
     * @param type $id ID do registro
     * @return array
     * @date 07/08/221
     */
    public function edit($id) {
        $registro = $this->tarefaModel->find($id);
        if (count($registro) > 0 && $registro['situacao_registro'] == 2) {
            $this->view($id);
        } else {
            $categoriaModel = new CategoriaModel();
            $responsavelModel = new ResponsavelModel();
            return view($this->className . '/form', [
                'className' => $this->className,
                'categorias' => $categoriaModel->withDeleted()->findAll(),
                'responsaveis' => $responsavelModel->withDeleted()->findAll(),
                'pageTitle' => $this->classNameFormatado . '- Editor de registro #' . $id,
                'registro' => $this->tarefaModel->find($id)
            ]);
        }
    }

    /**
     * FUNCTION
     * Abre formulario de VISUALIZAÇÃO de registro.
     * 
     * @param type $id ID do registro
     * @return array
     * @date 07/08/221
     */
    public function view($id) {
        $registro = $this->tarefaModel->find($id);
        if ($registro && count($registro) > 0) {
            $categoriaModel = new CategoriaModel();
            $responsavelModel = new ResponsavelModel();
            return view($this->className . '/view', [
                'className' => $this->className,
                'categoria' => $categoriaModel->withDeleted()->find($registro['fk_categoria']),
                'responsavel' => $responsavelModel->withDeleted()->find($registro['fk_responsavel']),
                'pageTitle' => $this->classNameFormatado . '- Visualizador de registro #' . $id,
                'registro' => $registro
            ]);
        } else {
            echo 'Ocorreu um erro!';
        }
    }

}
