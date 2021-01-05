<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExerciceTypes Controller
 *
 * @property \App\Model\Table\ExerciceTypesTable $ExerciceTypes
 * @method \App\Model\Entity\ExerciceType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExerciceTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $exerciceTypes = $this->paginate($this->ExerciceTypes);

        $this->set(compact('exerciceTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercice Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exerciceType = $this->ExerciceTypes->get($id, [
            'contain' => ['Exercices'],
        ]);

        $this->set(compact('exerciceType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exerciceType = $this->ExerciceTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $exerciceType = $this->ExerciceTypes->patchEntity($exerciceType, $this->request->getData());
            if ($this->ExerciceTypes->save($exerciceType)) {
                $this->Flash->success(__('The exercice type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercice type could not be saved. Please, try again.'));
        }
        $this->set(compact('exerciceType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercice Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exerciceType = $this->ExerciceTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exerciceType = $this->ExerciceTypes->patchEntity($exerciceType, $this->request->getData());
            if ($this->ExerciceTypes->save($exerciceType)) {
                $this->Flash->success(__('The exercice type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercice type could not be saved. Please, try again.'));
        }
        $this->set(compact('exerciceType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercice Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exerciceType = $this->ExerciceTypes->get($id);
        if ($this->ExerciceTypes->delete($exerciceType)) {
            $this->Flash->success(__('The exercice type has been deleted.'));
        } else {
            $this->Flash->error(__('The exercice type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
