<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CivilStatus Controller
 *
 * @property \App\Model\Table\CivilStatusTable $CivilStatus
 * @method \App\Model\Entity\CivilStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CivilStatusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $civilStatus = $this->paginate($this->CivilStatus);

        $this->set(compact('civilStatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Civil Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $civilStatus = $this->CivilStatus->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('civilStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $civilStatus = $this->CivilStatus->newEmptyEntity();
        if ($this->request->is('post')) {
            $civilStatus = $this->CivilStatus->patchEntity($civilStatus, $this->request->getData());
            if ($this->CivilStatus->save($civilStatus)) {
                $this->Flash->success(__('The civil status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civil status could not be saved. Please, try again.'));
        }
        $this->set(compact('civilStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Civil Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $civilStatus = $this->CivilStatus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $civilStatus = $this->CivilStatus->patchEntity($civilStatus, $this->request->getData());
            if ($this->CivilStatus->save($civilStatus)) {
                $this->Flash->success(__('The civil status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civil status could not be saved. Please, try again.'));
        }
        $this->set(compact('civilStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Civil Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $civilStatus = $this->CivilStatus->get($id);
        if ($this->CivilStatus->delete($civilStatus)) {
            $this->Flash->success(__('The civil status has been deleted.'));
        } else {
            $this->Flash->error(__('The civil status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
