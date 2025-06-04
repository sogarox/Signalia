<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Educador Controller
 *
 * @method \App\Model\Entity\Educador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EducadorController extends AppController
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
    public $Cursos = null;
    public function dashboard()
{
    $redirect = $this->requireRole(['educador']);
    if ($redirect) return $redirect;
    $this->loadModel('Cursos');
    $cursos = $this->Cursos->find('all')->all();
    $this->set(compact('cursos'));
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
        $educador = $this->paginate($this->Educador);

        $this->set(compact('educador'));
    }

    /**
     * View method
     *
     * @param string|null $id Educador id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;
        $educador = $this->Educador->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('educador'));
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
        $educador = $this->Educador->newEmptyEntity();
        if ($this->request->is('post')) {
            $educador = $this->Educador->patchEntity($educador, $this->request->getData());
            if ($this->Educador->save($educador)) {
                $this->Flash->success(__('The educador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The educador could not be saved. Please, try again.'));
        }
        $this->set(compact('educador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Educador id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;
        $educador = $this->Educador->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $educador = $this->Educador->patchEntity($educador, $this->request->getData());
            if ($this->Educador->save($educador)) {
                $this->Flash->success(__('The educador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The educador could not be saved. Please, try again.'));
        }
        $this->set(compact('educador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Educador id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;
        $this->request->allowMethod(['post', 'delete']);
        $educador = $this->Educador->get($id);
        if ($this->Educador->delete($educador)) {
            $this->Flash->success(__('The educador has been deleted.'));
        } else {
            $this->Flash->error(__('The educador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
