<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    private function requireRole($roles = [])
{
    $usuario = $this->request->getSession()->read('Auth.Usuario');
    if (!$usuario || !in_array(strtolower($usuario->rol), $roles)) {
        $this->Flash->error('No tienes permisos para acceder a esta sección.');
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    return null;
}
    public function index()
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;

        $cursos = $this->paginate($this->Cursos);

        $this->set(compact('cursos'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('curso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $curso = $this->Cursos->newEmptyEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('The curso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The curso could not be saved. Please, try again.'));
        }
        $this->set(compact('curso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $curso = $this->Cursos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('The curso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The curso could not be saved. Please, try again.'));
        }
        $this->set(compact('curso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success(__('The curso has been deleted.'));
        } else {
            $this->Flash->error(__('The curso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
