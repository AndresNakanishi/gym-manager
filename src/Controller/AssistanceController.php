<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

/**
 * Assistance Controller
 *
 * @property \App\Model\Table\AssistanceTable $Assistance
 * @method \App\Model\Entity\Assistance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssistanceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {      
        $assistance = $this->Assistance->find('all', ['contain' => ['Users']])->all();
        
        $this->set('title', 'Asistencias');
        $this->set(compact('assistance'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assistance id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assistance = $this->Assistance->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newData = $this->request->getData();
            $newData['checkout'] = new FrozenTime($newData['checkout']);
            if ($newData['checkout'] > $assistance->checkin){
                $assistance = $this->Assistance->patchEntity($assistance, $newData);
                if ($this->Assistance->save($assistance)) {
                    $this->Flash->success(__('La asistencia fue guardada exitosamente.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se pudo guardar la asistencia, intente más tarde.'));
            } else {
                $this->Flash->error(__('No se puede guardar un checkout anterior al checkin.'));
            }
        }
        $users = $this->Assistance->Users->find('list');
        $this->set('title', 'Editar Asistencia');
        $this->set(compact('assistance', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assistance id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assistance = $this->Assistance->get($id);
        $now = new FrozenTime();
        $oldDate = $assistance->checkin->modify('+1 days');
        if ($oldDate > $now){
            if ($this->Assistance->delete($assistance)) {
            } else {
                $this->Flash->error(__('No se pudo borrar la asistencia.'));
            }
        } else {
            $this->Flash->error(__('No se pueden borrar las asistencias pasado un día.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    static function insertCheckIn($user_id = null) {
        $assistanceTable = TableRegistry::get('Assistance');
        $assistance = $assistanceTable->newEmptyEntity();
        $assistance->checkin = new FrozenTime();        
        $assistance->date = new FrozenTime();        
        $assistance->user_id = $user_id;
        try {
            $assistanceTable->save($assistance);
        } catch(\Exception $e) {
            $this->Flash->error(__('Hubo un error en el checkin.'));
        }
    }
    
    static function insertCheckOut($id = null) {
        $assistanceTable = TableRegistry::get('Assistance');
        $assistanceQuery = $assistanceTable->find()->where(['id' => $id])->andWhere(['checkout IS NULL']);
        $assistance = $assistanceQuery->first();
        $assistance->checkout = new FrozenTime();
        if ($assistance->checkout > $assistance->checkin){
            try {
                $assistanceTable->save($assistance);
            } catch(\Exception $e) {
                $this->Flash->error(__('Hubo un error en el checkout.'));
            }
        } else {
            $this->Flash->error(__('El checkout no puede ser antes que el checkin.'));
        }
    }
}
