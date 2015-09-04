<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RolesUsers Controller
 *
 * @property \App\Model\Table\RolesUsersTable $RolesUsers
 */
class RolesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Users']
        ];
        $this->set('rolesUsers', $this->paginate($this->RolesUsers));
        $this->set('_serialize', ['rolesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Roles User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rolesUser = $this->RolesUsers->get($id, [
            'contain' => ['Roles', 'Users']
        ]);
        $this->set('rolesUser', $rolesUser);
        $this->set('_serialize', ['rolesUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rolesUser = $this->RolesUsers->newEntity();
        if ($this->request->is('post')) {
            $rolesUser = $this->RolesUsers->patchEntity($rolesUser, $this->request->data);
            if ($this->RolesUsers->save($rolesUser)) {
                $this->Flash->success('The roles user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The roles user could not be saved. Please, try again.');
            }
        }
        $roles = $this->RolesUsers->Roles->find('list', ['limit' => 200]);
        $users = $this->RolesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('rolesUser', 'roles', 'users'));
        $this->set('_serialize', ['rolesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Roles User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rolesUser = $this->RolesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rolesUser = $this->RolesUsers->patchEntity($rolesUser, $this->request->data);
            if ($this->RolesUsers->save($rolesUser)) {
                $this->Flash->success('The roles user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The roles user could not be saved. Please, try again.');
            }
        }
        $roles = $this->RolesUsers->Roles->find('list', ['limit' => 200]);
        $users = $this->RolesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('rolesUser', 'roles', 'users'));
        $this->set('_serialize', ['rolesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Roles User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rolesUser = $this->RolesUsers->get($id);
        if ($this->RolesUsers->delete($rolesUser)) {
            $this->Flash->success('The roles user has been deleted.');
        } else {
            $this->Flash->error('The roles user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
