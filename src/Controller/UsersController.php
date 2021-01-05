<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\AssistanceController;
use Cake\Auth\DefaultPasswordHasher; 
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use App\Model\Entity\User;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->Users->find('all', ['contain' => ['Profiles', 'Routines', 'CivilStatus', 'BloodType', 'Sex', 'Assistance', 'Memberships', 'Notes', 'Sales', 'Weights']])->all();
        
        $this->set('title', 'Mis Clientes');
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Profiles', 'Routines', 'CivilStatus', 'BloodType', 'Sex', 'Assistance', 'Memberships', 'Notes', 'Sales', 'Weights'],
        ]);

        $this->set('title', "$user->name $user->surname");
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $newUser = $this->request->getData();
            $newUser["birthday"] = new FrozenTime($newUser["birthday"]);
            $newUser["password"] = $newUser["dni"];
            $user = $this->Users->patchEntity($user, $newUser);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $profiles = $this->Users->Profiles->find('list', ['contain' => ['Levels']])->where(['levels.number' => 3]);
        $civilStatus = $this->Users->CivilStatus->find('list');
        $bloodType = $this->Users->BloodType->find('list');
        $sex = $this->Users->Sex->find('list');
        $this->set('title', 'Agregar Cliente');
        $this->set(compact('user', 'profiles', 'civilStatus', 'bloodType', 'sex'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $newData = $this->request->getData();
            $newData["birthday"] = new FrozenTime($newData["birthday"]);
            $user = $this->Users->patchEntity($user, $newData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $profiles = $this->Users->Profiles->find('list', ['contain' => ['Levels']])->where(['levels.number !=' => 0]);
        $routines = $this->Users->Routines->find('list');
        $civilStatus = $this->Users->CivilStatus->find('list');
        $bloodType = $this->Users->BloodType->find('list');
        $sex = $this->Users->Sex->find('list');
        
        $this->set('title', 'Editar Cliente');
        $this->set(compact('user', 'profiles', 'routines', 'civilStatus', 'bloodType', 'sex'));
    }


    public function profile($id = null)
    {
        $user_id = $_SESSION['Auth']->id;
        
        if (strval($user_id) !== $id) {
            $this->Flash->warning(__('No podes ver los datos de otro <b>mostri</b>.'));
            return $this->redirect(['action' => 'profile', $user_id]);
        }
        
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        
        $this->set('title', 'Mi Perfil');
        $this->set(compact('user'));
    }
    
    public function changePassword($id = null)
    {
        $user_id = $_SESSION['Auth']->id;
        
        if (strval($user_id) !== $id) {
            $this->Flash->warning(__('No podes cambiar la pass de otro <b>mostri</b>.'));
            return $this->redirect(['action' => 'changePassword', $user_id]);
        }

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $password = $data['new_password'];
            $new_password_confirm = $data['new_password_confirm'];
            $new_password = [
                'password' => $password
            ];
            if ($password !== $new_password_confirm){
                $this->Flash->error(__('Las contraseñas nuevas no coinciden.'));
                return $this->redirect(['action' => 'changePassword', $user_id]);
            }
            
            if  (!(new DefaultPasswordHasher())->check($data['old_password'], $user->password)) {
           
                $this->Flash->error(__('La contraseña anterior es errónea.'));
                return $this->redirect(['action' => 'changePassword', $user_id]);
               
            }
            
            $user = $this->Users->patchEntity($user, $new_password);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Se ha cambiado la contraseña correctamente.'));
                return $this->redirect(['action' => 'profile', $user_id]);
            } else {
                $this->Flash->error(__('No se ha podido cambiar la contraseña. Por favor conáctese con el administrador del sistema'));
            }
        }

        $this->set('title', 'Cambiar Contraseña');
        $this->set(compact('user'));
    }

    public function dashboard()
    {
        $usersTable = TableRegistry::get('users');

        /* Usuarios en el Establecimiento */
        $queryCheckedInUsers = $usersTable->find();
        $queryCheckedInUsers->innerJoinWith('Assistance', function ($q) {
            return $q->where(['Assistance.checkout IS NULL']);
        })
        ->contain('Assistance', function ($q) {
            return $q->where(['Assistance.checkout IS NULL']);
        })
        ->contain('Profiles');
        $checkedInUsers = $queryCheckedInUsers->all();
        
        /* Usuarios a Listarse */
        $queryUsers = $usersTable->find();
        $queryUsers->select([
            'users.id',
            'users.name',
            'users.surname',
            'p.name',
        ])
        ->join([[
            'table' => 'assistance',
            'alias' => 'a',
            'type' => 'LEFT',
            'conditions' => ['users.id=a.user_id'],
        ]])
        ->join([[
            'table' => 'profiles',
            'alias' => 'p',
            'type' => 'LEFT',
            'conditions' => ['p.id=users.profile_id'],
        ]])
        ->where(['OR' => [['a.user_id IS NULL'], ['a.checkout IS NOT NULL']]]);
        
        $users = $queryUsers->all();
        

        $this->set('title', 'Dashboard');
        $this->set(compact('users','checkedInUsers'));
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('auth');
        $this->set('title', 'Ingresar');

        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/dashboard';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Usuario o Password inválido.');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function checkin($id = null)
    {
        $this->autoRender = false;
        
        AssistanceController::insertCheckIn($id);

        return $this->redirect(['action' => 'dashboard']);
    }

    public function checkout($id = null)
    {
        $this->autoRender = false;
        
        AssistanceController::insertCheckOut($id);

        return $this->redirect(['action' => 'dashboard']);
    }


    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }
}
