<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
//use Cake\ORM\TableRegistry;

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
        
        // $this->loadModel('Users');
        // $user = $this->Users->newEntity();
        // $user = TableRegistry::get('Users')->newEntity();
        $user = new User();
        if ($this->request->is(['post'])) {
            exit;
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        $this->request->allowMethod(['post']);
        $user = $this->request->getData();
        $this->loadModel('Users');
        $user = $this->Users->newEntity();
        return $this->redirect(['controller' => 'articles']);
    }

}
