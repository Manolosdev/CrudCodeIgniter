<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

/**
 * Controle responsavel pelas operações de registros de CATEGORIA registrados.
 * 
 * @author Manoel Louro
 * @date 07/08/2021
 */
class Categoria extends BaseController {

    /**
     * Model principal
     * @var CategoriaModel
     */
    private $categoriaModel;

    /**
     * Nome da class
     * @var string
     */
    private $className = 'Categoria';

    /**
     * Nome da class formatada
     * @var string
     */
    private $classNameFormatado = 'Categoria';

    /**
     * Construtor
     */
    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
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
            'registros' => $this->categoriaModel->paginate(10),
            'pager' => $this->categoriaModel->pager
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
        return view($this->className . '/form', [
            'className' => $this->className,
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
        if ($this->categoriaModel->save($this->request->getPost())) {
            return view('messages', [
                'className' => $this->className,
                'pageTitle' => $this->classNameFormatado . '- Cadastro de registro',
                'messageClass' => 'alert-success',
                'message' => $this->classNameFormatado . ' salva com sucesso',
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
        if ($this->categoriaModel->delete($id)) {
            return view('messages', [
                'className' => $this->className,
                'pageTitle' => $this->classNameFormatado . '- Exclusão de registro #' . $id,
                'messageClass' => 'alert-success',
                'message' => $this->classNameFormatado . ' foi excluído com sucesso',
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
        return view($this->className .'/form', [
            'className' => $this->className,
            'pageTitle' => $this->classNameFormatado . '- Editor de registro #' . $id,
            'registro' => $this->categoriaModel->find($id)
        ]);
    }

}
