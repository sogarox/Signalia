<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Estudiante Controller
 *
 * @method \App\Model\Entity\Estudiante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstudianteController extends AppController

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
        $redirect = $this->requireRole(['estudiante']);
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
        $estudiante = $this->paginate($this->Estudiante);

        $this->set(compact('estudiante'));
    }

    /**
     * View method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redirect = $this->requireRole(['moderador','educador']);
    if ($redirect) return $redirect;
        $estudiante = $this->Estudiante->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('estudiante'));
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
        $estudiante = $this->Estudiante->newEmptyEntity();
        if ($this->request->is('post')) {
            $estudiante = $this->Estudiante->patchEntity($estudiante, $this->request->getData());
            if ($this->Estudiante->save($estudiante)) {
                $this->Flash->success(__('The estudiante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estudiante could not be saved. Please, try again.'));
        }
        $this->set(compact('estudiante'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['estudiante','moderador']);
    if ($redirect) return $redirect;
        $estudiante = $this->Estudiante->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estudiante = $this->Estudiante->patchEntity($estudiante, $this->request->getData());
            if ($this->Estudiante->save($estudiante)) {
                $this->Flash->success(__('The estudiante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estudiante could not be saved. Please, try again.'));
        }
        $this->set(compact('estudiante'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador']);
    if ($redirect) return $redirect;
        $this->request->allowMethod(['post', 'delete']);
        $estudiante = $this->Estudiante->get($id);
        if ($this->Estudiante->delete($estudiante)) {
            $this->Flash->success(__('The estudiante has been deleted.'));
        } else {
            $this->Flash->error(__('The estudiante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
