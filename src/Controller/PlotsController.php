<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Plots Controller
 *
 * @property \App\Model\Table\PlotsTable $Plots
 * @method \App\Model\Entity\Plot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $plots = $this->paginate($this->Plots);

        $this->set(compact('plots'));
    }

    /**
     * View method
     *
     * @param string|null $id Plot id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plot = $this->Plots->get($id, [
            'contain' => ['Sensors'],
        ]);

        $this->set('plot', $plot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plot = $this->Plots->newEmptyEntity();
        if ($this->request->is('post')) {
            $plot = $this->Plots->patchEntity($plot, $this->request->getData());
            if ($this->Plots->save($plot)) {
                $this->Flash->success(__('The plot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plot could not be saved. Please, try again.'));
        }
        $this->set(compact('plot'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plot id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plot = $this->Plots->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plot = $this->Plots->patchEntity($plot, $this->request->getData());
            if ($this->Plots->save($plot)) {
                $this->Flash->success(__('The plot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plot could not be saved. Please, try again.'));
        }
        $this->set(compact('plot'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plot id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plot = $this->Plots->get($id);
        if ($this->Plots->delete($plot)) {
            $this->Flash->success(__('The plot has been deleted.'));
        } else {
            $this->Flash->error(__('The plot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
