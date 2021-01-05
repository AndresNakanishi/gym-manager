<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MembershipTypes Controller
 *
 * @property \App\Model\Table\MembershipTypesTable $MembershipTypes
 * @method \App\Model\Entity\MembershipType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembershipTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $membershipTypes = $this->paginate($this->MembershipTypes);

        $this->set('title', 'Tipos de Membresías');
        $this->set(compact('membershipTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Membership Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membershipType = $this->MembershipTypes->get($id, [
            'contain' => ['Memberships'],
        ]);

        $this->set(compact('membershipType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membershipType = $this->MembershipTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $membershipType = $this->MembershipTypes->patchEntity($membershipType, $this->request->getData());
            if ($this->MembershipTypes->save($membershipType)) {
                $this->Flash->success(__('The membership type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership type could not be saved. Please, try again.'));
        }
        $this->set('title', 'Agregar Tipo de Membresía');
        $this->set(compact('membershipType'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Membership Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membershipType = $this->MembershipTypes->get($id, [
            'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $membershipType = $this->MembershipTypes->patchEntity($membershipType, $this->request->getData());
                if ($this->MembershipTypes->save($membershipType)) {
                    $this->Flash->success(__('The membership type has been saved.'));
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The membership type could not be saved. Please, try again.'));
            }
            $this->set('title', 'Editar Tipo de Membresía');
            $this->set(compact('membershipType'));
        }
        
    /**
     * Delete method
     *
     * @param string|null $id Membership Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membershipType = $this->MembershipTypes->get($id);
        if ($this->MembershipTypes->delete($membershipType)) {
            $this->Flash->success(__('The membership type has been deleted.'));
        } else {
            $this->Flash->error(__('The membership type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
