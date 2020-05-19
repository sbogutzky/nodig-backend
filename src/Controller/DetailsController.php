<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Detail;
use App\Model\Table\DetailsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * Details Controller
 *
 * @property DetailsTable $Details
 * @method Detail[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetailsController extends AppController
{
    /**
     * Index method
     *
     * @return Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sensors'],
        ];
        $details = $this->paginate($this->Details);

        $this->set(compact('details'));
    }

    /**
     * View method
     *
     * @param string|null $id Detail id.
     * @return Response|null|void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detail = $this->Details->get($id, [
            'contain' => ['Sensors'],
        ]);

        $this->set('detail', $detail);
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detail = $this->Details->newEmptyEntity();
        if ($this->request->is('post')) {
            $detail = $this->Details->patchEntity($detail, $this->request->getData());
            if ($this->Details->save($detail)) {
                $this->Flash->success(__('The detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detail could not be saved. Please, try again.'));
        }
        $sensors = $this->Details->Sensors->find('list', ['limit' => 200]);
        $this->set(compact('detail', 'sensors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detail id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detail = $this->Details->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detail = $this->Details->patchEntity($detail, $this->request->getData());
            if ($this->Details->save($detail)) {
                $this->Flash->success(__('The detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detail could not be saved. Please, try again.'));
        }
        $sensors = $this->Details->Sensors->find('list', ['limit' => 200]);
        $this->set(compact('detail', 'sensors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detail id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detail = $this->Details->get($id);
        if ($this->Details->delete($detail)) {
            $this->Flash->success(__('The detail has been deleted.'));
        } else {
            $this->Flash->error(__('The detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
