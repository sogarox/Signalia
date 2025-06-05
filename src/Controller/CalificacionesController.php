<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Calificaciones Controller
 *
 * @property \App\Model\Table\CalificacionesTable $Calificaciones
 * @method \App\Model\Entity\Calificacione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CalificacionesController extends AppController
{
    public $Actividades = null;
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
        $calificaciones = $this->paginate($this->Calificaciones);

        $this->set(compact('calificaciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Calificacione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
        if ($redirect) return $redirect;
        $calificacione = $this->Calificaciones->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('calificacione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Actividades');
        $actividades = $this->Actividades->find('list')->toArray();
        $this->set(compact('actividades'));
        if (empty($actividades)) {
            $this->Flash->error('No hay actividades registradas. Debes crear una actividad antes de calificar.');
            return $this->redirect(['controller' => 'Actividades', 'action' => 'add']);
        }

        $redirect = $this->requireRole(['moderador', 'educador']);
        if ($redirect) return $redirect;
        $calificacione = $this->Calificaciones->newEmptyEntity();
        if ($this->request->is('post')) {
            $calificacione = $this->Calificaciones->patchEntity($calificacione, $this->request->getData());
            if ($this->Calificaciones->save($calificacione)) {
                $this->Flash->success(__('The calificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('calificacione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Calificacione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
        if ($redirect) return $redirect;
        $calificacione = $this->Calificaciones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calificacione = $this->Calificaciones->patchEntity($calificacione, $this->request->getData());
            if ($this->Calificaciones->save($calificacione)) {
                $this->Flash->success(__('The calificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('calificacione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Calificacione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $redirect = $this->requireRole(['moderador', 'educador']);
        if ($redirect) return $redirect;
        $this->request->allowMethod(['post', 'delete']);
        $calificacione = $this->Calificaciones->get($id);
        if ($this->Calificaciones->delete($calificacione)) {
            $this->Flash->success(__('The calificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The calificacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
