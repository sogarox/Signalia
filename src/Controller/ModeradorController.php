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
    public function dashboard()
{
    // Aquí puedes poner lógica o simplemente mostrar la vista
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
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
