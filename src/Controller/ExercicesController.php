<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Exercices Controller
 *
 * @property \App\Model\Table\ExercicesTable $Exercices
 * @method \App\Model\Entity\Exercice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExercicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExerciceTypes'],
        ];
        $exercices = $this->paginate($this->Exercices);

        $this->set(compact('exercices'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exercice = $this->Exercices->get($id, [
            'contain' => ['ExerciceTypes', 'Reps'],
        ]);

        $this->set(compact('exercice'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exercice = $this->Exercices->newEmptyEntity();
        if ($this->request->is('post')) {
            $exercice = $this->Exercices->patchEntity($exercice, $this->request->getData());
            if ($this->Exercices->save($exercice)) {
                $this->Flash->success(__('The exercice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercice could not be saved. Please, try again.'));
        }
        $exerciceTypes = $this->Exercices->ExerciceTypes->find('list', ['limit' => 200]);
        $this->set(compact('exercice', 'exerciceTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercice id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercice = $this->Exercices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercice = $this->Exercices->patchEntity($exercice, $this->request->getData());
            if ($this->Exercices->save($exercice)) {
                $this->Flash->success(__('The exercice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercice could not be saved. Please, try again.'));
        }
        $exerciceTypes = $this->Exercices->ExerciceTypes->find('list', ['limit' => 200]);
        $this->set(compact('exercice', 'exerciceTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercice id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercice = $this->Exercices->get($id);
        if ($this->Exercices->delete($exercice)) {
            $this->Flash->success(__('The exercice has been deleted.'));
        } else {
            $this->Flash->error(__('The exercice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
