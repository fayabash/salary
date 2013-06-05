<?php
App::uses('AppController', 'Controller');
/**
 * Holders Controller
 *
 * @property Holder $Holder
 */
class HoldersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Holder->recursive = 0;
		$this->set('holders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Holder->exists($id)) {
			throw new NotFoundException(__('Invalid holder'));
		}
		$options = array('conditions' => array('Holder.' . $this->Holder->primaryKey => $id));
		$this->set('holder', $this->Holder->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Holder->create();
			if ($this->Holder->save($this->request->data)) {
				$this->Session->setFlash(__('The holder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holder could not be saved. Please, try again.'));
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
		if (!$this->Holder->exists($id)) {
			throw new NotFoundException(__('Invalid holder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Holder->save($this->request->data)) {
				$this->Session->setFlash(__('The holder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holder could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Holder.' . $this->Holder->primaryKey => $id));
			$this->request->data = $this->Holder->find('first', $options);
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
		$this->Holder->id = $id;
		if (!$this->Holder->exists()) {
			throw new NotFoundException(__('Invalid holder'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Holder->delete()) {
			$this->Session->setFlash(__('Holder deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Holder was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
