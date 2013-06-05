<?php
App::uses('AppController', 'Controller');
/**
 * Genders Controller
 *
 * @property Gender $Gender
 */
class GendersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Gender->recursive = 0;
		$this->set('genders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
		$this->set('gender', $this->Gender->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Gender->create();
			if ($this->Gender->save($this->request->data)) {
				$this->Session->setFlash(__('The gender has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender could not be saved. Please, try again.'));
			}
		}
		
		$parents[0] = "[ No Parent ]";
		$Genderlist = $this->Gender->generateTreeList(null,null,null," - ");
		if($Genderlist){
			foreach ($Genderlist as $key=>$value){
				$parents[$key] = $value;
			}
		}
		$this->set(compact('parents'));
		
		
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Gender->save($this->request->data)) {
				$this->Session->setFlash(__('The gender has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
			$this->request->data = $this->Gender->find('first', $options);
		}
		
		$parents[0] = "[ No Parent ]";
		$Genderlist = $this->Gender->generateTreeList(null,null,null," - ");
		if($Genderlist){
			foreach ($Genderlist as $key=>$value){
				$parents[$key] = $value;
			}
		}
		$this->set(compact('parents'));
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
		$this->Gender->id = $id;
		if (!$this->Gender->exists()) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Gender->delete()) {
			$this->Session->setFlash(__('Gender deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gender was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
