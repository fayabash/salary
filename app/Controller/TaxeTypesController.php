<?php
App::uses('AppController', 'Controller');
/**
 * TaxeTypes Controller
 *
 * @property TaxeType $TaxeType
 */
class TaxeTypesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TaxeType->recursive = 0;
		$this->set('taxeTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TaxeType->exists($id)) {
			throw new NotFoundException(__('Invalid taxe type'));
		}
		$options = array('conditions' => array('TaxeType.' . $this->TaxeType->primaryKey => $id));
		$this->set('taxeType', $this->TaxeType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TaxeType->create();
			if ($this->TaxeType->save($this->request->data)) {
				$this->Session->setFlash(__('The taxe type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taxe type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TaxeType->exists($id)) {
			throw new NotFoundException(__('Invalid taxe type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TaxeType->save($this->request->data)) {
				$this->Session->setFlash(__('The taxe type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taxe type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TaxeType.' . $this->TaxeType->primaryKey => $id));
			$this->request->data = $this->TaxeType->find('first', $options);
		}
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
		$this->TaxeType->id = $id;
		if (!$this->TaxeType->exists()) {
			throw new NotFoundException(__('Invalid taxe type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaxeType->delete()) {
			$this->Session->setFlash(__('Taxe type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Taxe type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
