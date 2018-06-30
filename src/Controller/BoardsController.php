<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Boards Controller
 *
 *
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $boards = [];
        // $boards = $this->Boards->find("list");
        if($this->request->is('post')) {
            $input = $this->request->data('input');
            $boards = $this->Boards
                ->find()
                // ->where(['id <=' => $input ])
                ->where(function($exp, $q) use($input){
                    return $exp->eq('id', $input);
                })
                ->order(['id' => 'desc']);    
                // var_dump($boards);
                // exit;
        }else {
            // $boards = $this->Boards->find("all");
            $connection = ConnectionManager::get('default');
            $boards = $connection
                ->execute('select * from boards')
                ->fetchAll('assoc');
                // var_dump($boards);
                // exit;
        }
        
        // $boards = $this->Boards->get('karl');
        // $count = $boards->count();

        // $sql = $this->Boards->sql; 
        // var_dump($boards->toArray());
        // exit;
        // $this->set("boards", $boards->toArray());
        // $this->set(compact('boards', 'count', 'sql'));
        $this->set(compact('boards'));
    }

    public function validation()
    {
        $board = $this->Boards->newEntity();
        if($this->request->is('post')) {
            $board = $this->Boards->patchEntity($board, $this->request->getData());
            if ($this->Boards->save($board)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('board'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => []
        ]);

        $this->set('board', $board);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $board = $this->Boards->newEntity();
        if ($this->request->is('post')) {
            $board = $this->Boards->patchEntity($board, $this->request->getData());
            if ($this->Boards->save($board)) {
                $this->Flash->success(__('The board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The board could not be saved. Please, try again.'));
        }
        $this->set(compact('board'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $board = $this->Boards->patchEntity($board, $this->request->getData());
            if ($this->Boards->save($board)) {
                $this->Flash->success(__('The board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The board could not be saved. Please, try again.'));
        }
        $this->set(compact('board'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $board = $this->Boards->get($id);
        if ($this->Boards->delete($board)) {
            $this->Flash->success(__('The board has been deleted.'));
        } else {
            $this->Flash->error(__('The board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
