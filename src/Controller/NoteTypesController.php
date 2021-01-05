<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NoteTypes Controller
 *
 * @property \App\Model\Table\NoteTypesTable $NoteTypes
 * @method \App\Model\Entity\NoteType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NoteTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $noteTypes = $this->paginate($this->NoteTypes);

        $this->set(compact('noteTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Note Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noteType = $this->NoteTypes->get($id, [
            'contain' => ['Notes'],
        ]);

        $this->set(compact('noteType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $noteType = $this->NoteTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $noteType = $this->NoteTypes->patchEntity($noteType, $this->request->getData());
            if ($this->NoteTypes->save($noteType)) {
                $this->Flash->success(__('The note type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The note type could not be saved. Please, try again.'));
        }
        $this->set(compact('noteType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Note Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $noteType = $this->NoteTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $noteType = $this->NoteTypes->patchEntity($noteType, $this->request->getData());
            if ($this->NoteTypes->save($noteType)) {
                $this->Flash->success(__('The note type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The note type could not be saved. Please, try again.'));
        }
        $this->set(compact('noteType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Note Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noteType = $this->NoteTypes->get($id);
        if ($this->NoteTypes->delete($noteType)) {
            $this->Flash->success(__('The note type has been deleted.'));
        } else {
            $this->Flash->error(__('The note type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
