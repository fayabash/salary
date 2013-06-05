<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 */
class EmployeesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Employee->recursive = 0;
		$this->set('employees', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
		$this->set('employee', $this->Employee->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Employee->create();
			if ($this->Employee->save($this->request->data)) {
				$this->Session->setFlash(__('The employee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
			}
		}
		$genders = $this->Employee->Gender->find('list');
		$this->set(compact('genders'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Employee->save($this->request->data)) {
				$this->Session->setFlash(__('The employee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
		$genders = $this->Employee->Gender->find('list');
		$this->set(compact('genders'));
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
		$this->Employee->id = $id;
		if (!$this->Employee->exists()) {
			throw new NotFoundException(__('Invalid employee'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Employee->delete()) {
			$this->Session->setFlash(__('Employee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Employee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
