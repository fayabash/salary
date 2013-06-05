<?php
App::uses('AppController', 'Controller');
/**
 * Taxes Controller
 *
 * @property Tax $Tax
 */
class TaxesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Tax->recursive = 0;
		$this->set('taxes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Tax->exists($id)) {
			throw new NotFoundException(__('Invalid tax'));
		}
		$options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
		$this->set('tax', $this->Tax->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tax->create();
			if ($this->Tax->save($this->request->data)) {
				$this->Session->setFlash(__('The tax has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
			}
		}
		$holders = $this->Tax->Holder->find('list');
		$taxeTypes = $this->Tax->TaxeType->find('list');
		$genders = $this->Tax->Gender->find('list');
		$this->set(compact('holders', 'taxeTypes', 'genders'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Tax->exists($id)) {
			throw new NotFoundException(__('Invalid tax'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tax->save($this->request->data)) {
				$this->Session->setFlash(__('The tax has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
			$this->request->data = $this->Tax->find('first', $options);
		}
		$holders = $this->Tax->Holder->find('list');
		$taxeTypes = $this->Tax->TaxeType->find('list');
		$genders = $this->Tax->Gender->find('list');
		$this->set(compact('holders', 'taxeTypes', 'genders'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Tax->id = $id;
		if (!$this->Tax->exists()) {
			throw new NotFoundException(__('Invalid tax'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tax->delete()) {
			$this->Session->setFlash(__('Tax deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tax was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
