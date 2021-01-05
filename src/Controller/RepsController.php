<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reps Controller
 *
 * @property \App\Model\Table\RepsTable $Reps
 * @method \App\Model\Entity\Rep[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RepsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exercices'],
        ];
        $reps = $this->paginate($this->Reps);

        $this->set(compact('reps'));
    }

    /**
     * View method
     *
     * @param string|null $id Rep id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rep = $this->Reps->get($id, [
            'contain' => ['Exercices', 'RoutineDays'],
        ]);

        $this->set(compact('rep'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rep = $this->Reps->newEmptyEntity();
        if ($this->request->is('post')) {
            $rep = $this->Reps->patchEntity($rep, $this->request->getData());
            if ($this->Reps->save($rep)) {
                $this->Flash->success(__('The rep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rep could not be saved. Please, try again.'));
        }
        $exercices = $this->Reps->Exercices->find('list', ['limit' => 200]);
        $routineDays = $this->Reps->RoutineDays->find('list', ['limit' => 200]);
        $this->set(compact('rep', 'exercices', 'routineDays'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rep id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rep = $this->Reps->get($id, [
            'contain' => ['RoutineDays'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rep = $this->Reps->patchEntity($rep, $this->request->getData());
            if ($this->Reps->save($rep)) {
                $this->Flash->success(__('The rep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rep could not be saved. Please, try again.'));
        }
        $exercices = $this->Reps->Exercices->find('list', ['limit' => 200]);
        $routineDays = $this->Reps->RoutineDays->find('list', ['limit' => 200]);
        $this->set(compact('rep', 'exercices', 'routineDays'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rep id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rep = $this->Reps->get($id);
        if ($this->Reps->delete($rep)) {
            $this->Flash->success(__('The rep has been deleted.'));
        } else {
            $this->Flash->error(__('The rep could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
