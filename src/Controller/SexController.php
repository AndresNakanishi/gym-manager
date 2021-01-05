<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sex Controller
 *
 * @property \App\Model\Table\SexTable $Sex
 * @method \App\Model\Entity\Sex[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SexController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sex = $this->paginate($this->Sex);

        $this->set(compact('sex'));
    }

    /**
     * View method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sex = $this->Sex->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('sex'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sex = $this->Sex->newEmptyEntity();
        if ($this->request->is('post')) {
            $sex = $this->Sex->patchEntity($sex, $this->request->getData());
            if ($this->Sex->save($sex)) {
                $this->Flash->success(__('The sex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sex could not be saved. Please, try again.'));
        }
        $this->set(compact('sex'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sex = $this->Sex->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sex = $this->Sex->patchEntity($sex, $this->request->getData());
            if ($this->Sex->save($sex)) {
                $this->Flash->success(__('The sex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sex could not be saved. Please, try again.'));
        }
        $this->set(compact('sex'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sex = $this->Sex->get($id);
        if ($this->Sex->delete($sex)) {
            $this->Flash->success(__('The sex has been deleted.'));
        } else {
            $this->Flash->error(__('The sex could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
