<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RoutineDays Controller
 *
 * @property \App\Model\Table\RoutineDaysTable $RoutineDays
 * @method \App\Model\Entity\RoutineDay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutineDaysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $routineDays = $this->paginate($this->RoutineDays);

        $this->set(compact('routineDays'));
    }

    /**
     * View method
     *
     * @param string|null $id Routine Day id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routineDay = $this->RoutineDays->get($id, [
            'contain' => ['Reps', 'Routines'],
        ]);

        $this->set(compact('routineDay'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routineDay = $this->RoutineDays->newEmptyEntity();
        if ($this->request->is('post')) {
            $routineDay = $this->RoutineDays->patchEntity($routineDay, $this->request->getData());
            if ($this->RoutineDays->save($routineDay)) {
                $this->Flash->success(__('The routine day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine day could not be saved. Please, try again.'));
        }
        $reps = $this->RoutineDays->Reps->find('list', ['limit' => 200]);
        $routines = $this->RoutineDays->Routines->find('list', ['limit' => 200]);
        $this->set(compact('routineDay', 'reps', 'routines'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routine Day id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routineDay = $this->RoutineDays->get($id, [
            'contain' => ['Reps', 'Routines'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routineDay = $this->RoutineDays->patchEntity($routineDay, $this->request->getData());
            if ($this->RoutineDays->save($routineDay)) {
                $this->Flash->success(__('The routine day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine day could not be saved. Please, try again.'));
        }
        $reps = $this->RoutineDays->Reps->find('list', ['limit' => 200]);
        $routines = $this->RoutineDays->Routines->find('list', ['limit' => 200]);
        $this->set(compact('routineDay', 'reps', 'routines'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routine Day id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routineDay = $this->RoutineDays->get($id);
        if ($this->RoutineDays->delete($routineDay)) {
            $this->Flash->success(__('The routine day has been deleted.'));
        } else {
            $this->Flash->error(__('The routine day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
