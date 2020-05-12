<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Datasource\RepositoryInterface;
use Cake\Http\Response;

/**
 * Details Controller
 * @property RepositoryInterface|null Details
 */
class DetailsController extends AppController
{

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post']);
        $detail = $this->Details->newEntity($this->request->input('json_decode', true));
        if ($this->Details->save($detail)) {
            $message = 'Saved';
        } else {
            // TODO: Error specification
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'detail' => $detail,
        ]);
        $this->viewBuilder()->setOption('serialize', ['detail', 'message']);
    }
}
