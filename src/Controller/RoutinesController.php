<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Routines Controller
 *
 * @property \App\Model\Table\RoutinesTable $Routines
 * @method \App\Model\Entity\Routine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $routines = $this->paginate($this->Routines);

        $this->set(compact('routines'));
    }

    /**
     * View method
     *
     * @param string|null $id Routine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routine = $this->Routines->get($id, [
            'contain' => ['RoutineDays', 'Users'],
        ]);

        $this->set(compact('routine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routine = $this->Routines->newEmptyEntity();
        if ($this->request->is('post')) {
            $routine = $this->Routines->patchEntity($routine, $this->request->getData());
            if ($this->Routines->save($routine)) {
                $this->Flash->success(__('The routine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine could not be saved. Please, try again.'));
        }
        $routineDays = $this->Routines->RoutineDays->find('list', ['limit' => 200]);
        $this->set(compact('routine', 'routineDays'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routine = $this->Routines->get($id, [
            'contain' => ['RoutineDays'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routine = $this->Routines->patchEntity($routine, $this->request->getData());
            if ($this->Routines->save($routine)) {
                $this->Flash->success(__('The routine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine could not be saved. Please, try again.'));
        }
        $routineDays = $this->Routines->RoutineDays->find('list', ['limit' => 200]);
        $this->set(compact('routine', 'routineDays'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routine = $this->Routines->get($id);
        if ($this->Routines->delete($routine)) {
            $this->Flash->success(__('The routine has been deleted.'));
        } else {
            $this->Flash->error(__('The routine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
