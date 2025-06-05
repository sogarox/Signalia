<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Actividades Controller
 *
 * @property \App\Model\Table\ActividadesTable $Actividades
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadesController extends AppController
{
    public $Modulos = null;
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
        $actividades = $this->paginate($this->Actividades);

        $this->set(compact('actividades'));
    }

    /**
     * View method
     *
     * @param string|null $id Actividad id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $actividad = $this->Actividades->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('actividad'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Modulos');
    $modulos = $this->Modulos->find('list')->toArray();

    if (empty($modulos)) {
        $this->Flash->error('No hay Modulos registrados. Debe existir un modulo para asignarle una actividad.');
        return $this->redirect(['controller' => 'Modulos', 'action' => 'add']);
    }
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $actividad = $this->Actividades->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividad = $this->Actividades->patchEntity($actividad, $this->request->getData());
            if ($this->Actividades->save($actividad)) {
                $this->Flash->success(__('The actividad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividad could not be saved. Please, try again.'));
        }
        $this->set(compact('actividad'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividad id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $actividad = $this->Actividades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actividad = $this->Actividades->patchEntity($actividad, $this->request->getData());
            if ($this->Actividades->save($actividad)) {
                $this->Flash->success(__('The actividad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividad could not be saved. Please, try again.'));
        }
        $this->set(compact('actividad'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividad id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
    if ($redirect) return $redirect;
        $this->request->allowMethod(['post', 'delete']);
        $actividad = $this->Actividades->get($id);
        if ($this->Actividades->delete($actividad)) {
            $this->Flash->success(__('The actividad has been deleted.'));
        } else {
            $this->Flash->error(__('The actividad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
