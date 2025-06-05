<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Modulos Controller
 *
 * @property \App\Model\Table\ModulosTable $Modulos
 * @method \App\Model\Entity\Modulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModulosController extends AppController
{
    public $Cursos = null;
    private function requireRole($roles = [])
{
    $usuario = $this->request->getSession()->read('Auth.Usuario');
    if (!$usuario || !in_array(strtolower($usuario->rol), $roles)) {
        $this->Flash->error('No tienes permisos para acceder a esta sección.');
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    return null;
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $modulos = $this->paginate($this->Modulos);

        $this->set(compact('modulos'));
    }

    /**
     * View method
     *
     * @param string|null $id Modulo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $modulo = $this->Modulos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('modulo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Cursos');
        $cursos = $this->Cursos->find('list')->toArray();
        $this->set(compact('cursos'));
        if (empty($cursos)) {
            $this->Flash->error('No hay cursos registrados. Debes crear un curso antes de establecer su módulo.');
            return $this->redirect(['controller' => 'Cursos', 'action' => 'add']);
        }
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $modulo = $this->Modulos->newEmptyEntity();
        if ($this->request->is('post')) {
            $modulo = $this->Modulos->patchEntity($modulo, $this->request->getData());
            if ($this->Modulos->save($modulo)) {
                $this->Flash->success(__('The modulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modulo could not be saved. Please, try again.'));
        }
        $this->set(compact('modulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modulo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $modulo = $this->Modulos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modulo = $this->Modulos->patchEntity($modulo, $this->request->getData());
            if ($this->Modulos->save($modulo)) {
                $this->Flash->success(__('The modulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modulo could not be saved. Please, try again.'));
        }
        $this->set(compact('modulo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modulo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $this->request->allowMethod(['post', 'delete']);
        $modulo = $this->Modulos->get($id);
        if ($this->Modulos->delete($modulo)) {
            $this->Flash->success(__('The modulo has been deleted.'));
        } else {
            $this->Flash->error(__('The modulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
