<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RoutineDaysReps Controller
 *
 * @property \App\Model\Table\RoutineDaysRepsTable $RoutineDaysReps
 * @method \App\Model\Entity\RoutineDaysRep[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutineDaysRepsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RoutineDays', 'Reps'],
        ];
        $routineDaysReps = $this->paginate($this->RoutineDaysReps);

        $this->set(compact('routineDaysReps'));
    }

    /**
     * View method
     *
     * @param string|null $id Routine Days Rep id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routineDaysRep = $this->RoutineDaysReps->get($id, [
            'contain' => ['RoutineDays', 'Reps'],
        ]);

        $this->set(compact('routineDaysRep'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routineDaysRep = $this->RoutineDaysReps->newEmptyEntity();
        if ($this->request->is('post')) {
            $routineDaysRep = $this->RoutineDaysReps->patchEntity($routineDaysRep, $this->request->getData());
            if ($this->RoutineDaysReps->save($routineDaysRep)) {
                $this->Flash->success(__('The routine days rep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine days rep could not be saved. Please, try again.'));
        }
        $routineDays = $this->RoutineDaysReps->RoutineDays->find('list', ['limit' => 200]);
        $reps = $this->RoutineDaysReps->Reps->find('list', ['limit' => 200]);
        $this->set(compact('routineDaysRep', 'routineDays', 'reps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routine Days Rep id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routineDaysRep = $this->RoutineDaysReps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routineDaysRep = $this->RoutineDaysReps->patchEntity($routineDaysRep, $this->request->getData());
            if ($this->RoutineDaysReps->save($routineDaysRep)) {
                $this->Flash->success(__('The routine days rep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine days rep could not be saved. Please, try again.'));
        }
        $routineDays = $this->RoutineDaysReps->RoutineDays->find('list', ['limit' => 200]);
        $reps = $this->RoutineDaysReps->Reps->find('list', ['limit' => 200]);
        $this->set(compact('routineDaysRep', 'routineDays', 'reps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routine Days Rep id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routineDaysRep = $this->RoutineDaysReps->get($id);
        if ($this->RoutineDaysReps->delete($routineDaysRep)) {
            $this->Flash->success(__('The routine days rep has been deleted.'));
        } else {
            $this->Flash->error(__('The routine days rep could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
