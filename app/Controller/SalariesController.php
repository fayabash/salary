<?php
App::uses('AppController', 'Controller');
/**
 * Salaries Controller
 *
 * @property Salary $Salary
 */
class SalariesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Salary->recursive = 0;
		$this->set('salaries', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Salary->exists($id)) {
			throw new NotFoundException(__('Invalid salary'));
		}
		$options = array('conditions' => array('Salary.' . $this->Salary->primaryKey => $id));
		$this->set('salary', $this->Salary->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Salary->create();
			if ($this->Salary->save($this->request->data)) {
				$this->Session->setFlash(__('The salary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Salary->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Salary->exists($id)) {
			throw new NotFoundException(__('Invalid salary'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Salary->save($this->request->data)) {
				$this->Session->setFlash(__('The salary has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Salary.' . $this->Salary->primaryKey => $id));
			$this->request->data = $this->Salary->find('first', $options);
		}
		$employees = $this->Salary->Employee->find('list');
		$this->set(compact('employees'));
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
		$this->Salary->id = $id;
		if (!$this->Salary->exists()) {
			throw new NotFoundException(__('Invalid salary'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Salary->delete()) {
			$this->Session->setFlash(__('Salary deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Salary was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
