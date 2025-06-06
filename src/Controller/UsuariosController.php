<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
         $usuario = $this->request->getSession()->read('Auth.Usuario');
    if (!$usuario || $usuario->rol !== 'Moderador') {
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('usuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'loginPass']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Registro exitoso Inicia sesión a continuación.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Registro fallido, por favor intenta de nuevo.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function loginPass()
    {
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->find()
                ->where([
                    'usuario' => $this->request->getData('usuario'),
                    'contrasena' => $this->request->getData('contrasena')
                ])
                ->first();

            if ($usuario) {
                // Guardar usuario en sesión
                $this->request->getSession()->write('Auth.Usuario', $usuario);

                // Redirigir según el rol
                switch ($usuario->rol) {
                    case 'Moderador':
                        return $this->redirect(['controller' => 'Moderador', 'action' => 'dashboard']);
                    case 'Estudiante':
                        return $this->redirect(['controller' => 'Estudiante', 'action' => 'dashboard']);
                    case 'Educador':
                        return $this->redirect(['controller' => 'Educador', 'action' => 'dashboard']);
                    default:
                        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
                }
            } else {
                $this->Flash->error('Usuario o contraseña incorrectos.');
            }
        }
    }
    public function logout()
{
    $this->request->getSession()->destroy();
    $this->Flash->success('Sesión cerrada correctamente.');
    return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
}
}
