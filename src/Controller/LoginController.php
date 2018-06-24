<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is(['post'])) {
            exit;
        }
    }

    public function login()
    {

        // $this->request->allowMethod(['post']);
        // return $this->redirect(['action' => 'index']);
    }

}
