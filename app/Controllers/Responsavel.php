<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResponsavelModel;

/**
 * Controle responsavel pelas operações de registros de REPONSAVEIS registrados.
 * 
 * @author Manoel Louro
 * @date 07/08/2021
 */
class Responsavel extends BaseController {

    /**
     * Model principal
     * @var ResponsavelModel
     */
    private $responsavelModel;

    /**
     * Nome da class
     * @var string
     */
    private $className = 'Responsavel';

    /**
     * Nome da class formatada
     * @var string
     */
    private $classNameFormatado = 'Responsável';

    /**
     * Construtor
     */
    public function __construct() {
        $this->responsavelModel = new ResponsavelModel();
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
            'registros' => $this->responsavelModel->paginate(10),
            'pager' => $this->responsavelModel->pager
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
        if ($this->responsavelModel->save($this->request->getPost())) {
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
        if ($this->responsavelModel->delete($id)) {
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
        return view($this->className . '/form', [
            'className' => $this->className,
            'pageTitle' => $this->classNameFormatado . '- Editor de registro #' . $id,
            'registro' => $this->responsavelModel->find($id)
        ]);
    }

}
