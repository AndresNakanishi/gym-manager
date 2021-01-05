<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RoutinesRoutineDays Controller
 *
 * @property \App\Model\Table\RoutinesRoutineDaysTable $RoutinesRoutineDays
 * @method \App\Model\Entity\RoutinesRoutineDay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutinesRoutineDaysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Routines', 'RoutineDays'],
        ];
        $routinesRoutineDays = $this->paginate($this->RoutinesRoutineDays);

        $this->set(compact('routinesRoutineDays'));
    }

    /**
     * View method
     *
     * @param string|null $id Routines Routine Day id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routinesRoutineDay = $this->RoutinesRoutineDays->get($id, [
            'contain' => ['Routines', 'RoutineDays'],
        ]);

        $this->set(compact('routinesRoutineDay'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routinesRoutineDay = $this->RoutinesRoutineDays->newEmptyEntity();
        if ($this->request->is('post')) {
            $routinesRoutineDay = $this->RoutinesRoutineDays->patchEntity($routinesRoutineDay, $this->request->getData());
            if ($this->RoutinesRoutineDays->save($routinesRoutineDay)) {
                $this->Flash->success(__('The routines routine day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routines routine day could not be saved. Please, try again.'));
        }
        $routines = $this->RoutinesRoutineDays->Routines->find('list', ['limit' => 200]);
        $routineDays = $this->RoutinesRoutineDays->RoutineDays->find('list', ['limit' => 200]);
        $this->set(compact('routinesRoutineDay', 'routines', 'routineDays'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routines Routine Day id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routinesRoutineDay = $this->RoutinesRoutineDays->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routinesRoutineDay = $this->RoutinesRoutineDays->patchEntity($routinesRoutineDay, $this->request->getData());
            if ($this->RoutinesRoutineDays->save($routinesRoutineDay)) {
                $this->Flash->success(__('The routines routine day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routines routine day could not be saved. Please, try again.'));
        }
        $routines = $this->RoutinesRoutineDays->Routines->find('list', ['limit' => 200]);
        $routineDays = $this->RoutinesRoutineDays->RoutineDays->find('list', ['limit' => 200]);
        $this->set(compact('routinesRoutineDay', 'routines', 'routineDays'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routines Routine Day id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routinesRoutineDay = $this->RoutinesRoutineDays->get($id);
        if ($this->RoutinesRoutineDays->delete($routinesRoutineDay)) {
            $this->Flash->success(__('The routines routine day has been deleted.'));
        } else {
            $this->Flash->error(__('The routines routine day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
