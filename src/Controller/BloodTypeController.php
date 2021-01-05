<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BloodType Controller
 *
 * @property \App\Model\Table\BloodTypeTable $BloodType
 * @method \App\Model\Entity\BloodType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BloodTypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $bloodType = $this->paginate($this->BloodType);

        $this->set(compact('bloodType'));
    }

    /**
     * View method
     *
     * @param string|null $id Blood Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bloodType = $this->BloodType->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('bloodType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bloodType = $this->BloodType->newEmptyEntity();
        if ($this->request->is('post')) {
            $bloodType = $this->BloodType->patchEntity($bloodType, $this->request->getData());
            if ($this->BloodType->save($bloodType)) {
                $this->Flash->success(__('The blood type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blood type could not be saved. Please, try again.'));
        }
        $this->set(compact('bloodType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blood Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bloodType = $this->BloodType->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bloodType = $this->BloodType->patchEntity($bloodType, $this->request->getData());
            if ($this->BloodType->save($bloodType)) {
                $this->Flash->success(__('The blood type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blood type could not be saved. Please, try again.'));
        }
        $this->set(compact('bloodType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blood Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bloodType = $this->BloodType->get($id);
        if ($this->BloodType->delete($bloodType)) {
            $this->Flash->success(__('The blood type has been deleted.'));
        } else {
            $this->Flash->error(__('The blood type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
