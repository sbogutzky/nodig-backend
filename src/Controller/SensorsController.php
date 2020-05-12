<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sensors Controller
 *
 * @property \App\Model\Table\SensorsTable $Sensors
 * @method \App\Model\Entity\Sensor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SensorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Plots'],
        ];
        $sensors = $this->paginate($this->Sensors);

        $this->set(compact('sensors'));
    }

    /**
     * View method
     *
     * @param string|null $id Sensor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sensor = $this->Sensors->get($id, [
            'contain' => ['Plots', 'Details'],
        ]);

        $this->set('sensor', $sensor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sensor = $this->Sensors->newEmptyEntity();
        if ($this->request->is('post')) {
            $sensor = $this->Sensors->patchEntity($sensor, $this->request->getData());
            if ($this->Sensors->save($sensor)) {
                $this->Flash->success(__('The sensor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sensor could not be saved. Please, try again.'));
        }
        $plots = $this->Sensors->Plots->find('list', ['limit' => 200]);
        $this->set(compact('sensor', 'plots'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sensor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sensor = $this->Sensors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sensor = $this->Sensors->patchEntity($sensor, $this->request->getData());
            if ($this->Sensors->save($sensor)) {
                $this->Flash->success(__('The sensor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sensor could not be saved. Please, try again.'));
        }
        $plots = $this->Sensors->Plots->find('list', ['limit' => 200]);
        $this->set(compact('sensor', 'plots'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sensor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sensor = $this->Sensors->get($id);
        if ($this->Sensors->delete($sensor)) {
            $this->Flash->success(__('The sensor has been deleted.'));
        } else {
            $this->Flash->error(__('The sensor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
