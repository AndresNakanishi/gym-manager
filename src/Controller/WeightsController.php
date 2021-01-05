<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Weights Controller
 *
 * @property \App\Model\Table\WeightsTable $Weights
 * @method \App\Model\Entity\Weight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WeightsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $weights = $this->paginate($this->Weights);

        $this->set(compact('weights'));
    }

    /**
     * View method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weight = $this->Weights->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('weight'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weight = $this->Weights->newEmptyEntity();
        if ($this->request->is('post')) {
            $weight = $this->Weights->patchEntity($weight, $this->request->getData());
            if ($this->Weights->save($weight)) {
                $this->Flash->success(__('The weight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weight could not be saved. Please, try again.'));
        }
        $users = $this->Weights->Users->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weight = $this->Weights->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weight = $this->Weights->patchEntity($weight, $this->request->getData());
            if ($this->Weights->save($weight)) {
                $this->Flash->success(__('The weight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weight could not be saved. Please, try again.'));
        }
        $users = $this->Weights->Users->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weight = $this->Weights->get($id);
        if ($this->Weights->delete($weight)) {
            $this->Flash->success(__('The weight has been deleted.'));
        } else {
            $this->Flash->error(__('The weight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
