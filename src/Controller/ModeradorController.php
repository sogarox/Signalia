<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Moderador Controller
 *
 * @method \App\Model\Entity\Moderador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModeradorController extends AppController
{
    private function requireRole($roles = [])
{
    $usuario = $this->request->getSession()->read('Auth.Usuario');
    if (!$usuario || !in_array(strtolower($usuario->rol), $roles)) {
        $this->Flash->error('No tienes permisos para acceder a esta sección.');
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    return null;
}
    public function dashboard()
{
    $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;

        $moderador = $this->paginate($this->Moderador);

        $this->set(compact('moderador'));
    }

    /**
     * View method
     *
     * @param string|null $id Moderador id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;

        $moderador = $this->Moderador->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('moderador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;

        $moderador = $this->Moderador->newEmptyEntity();
        if ($this->request->is('post')) {
            $moderador = $this->Moderador->patchEntity($moderador, $this->request->getData());
            if ($this->Moderador->save($moderador)) {
                $this->Flash->success(__('The moderador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moderador could not be saved. Please, try again.'));
        }
        $this->set(compact('moderador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Moderador id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;

        $moderador = $this->Moderador->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moderador = $this->Moderador->patchEntity($moderador, $this->request->getData());
            if ($this->Moderador->save($moderador)) {
                $this->Flash->success(__('The moderador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moderador could not be saved. Please, try again.'));
        }
        $this->set(compact('moderador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Moderador id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;

        $this->request->allowMethod(['post', 'delete']);
        $moderador = $this->Moderador->get($id);
        if ($this->Moderador->delete($moderador)) {
            $this->Flash->success(__('The moderador has been deleted.'));
        } else {
            $this->Flash->error(__('The moderador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
