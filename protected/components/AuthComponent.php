<?php
/**
 * 
 * Yii Auth Component
 * Check multi access with single query
 * (didn't checked bizRule)
 * 
 * @author Nabi Karamalizadeh <info@nabi.ir>
 * @link www.nabi.ir
 * @since 2014-02-22
 * @version 1.0
 * @license GNU General Public License v3
 * @copyright 2014 Nabi Karamalizadeh
 * 
 */
class AuthComponent extends CApplicationComponent
{
	private $allAccess = array();
	public $userId = null;
	public $cacheDuration = false;
	
	public $connectionID = 'db';
	public $itemTable = 'AuthItem';
	public $itemChildTable = 'AuthItemChild';
	public $assignmentTable = 'AuthAssignment';
	public $db;
	
	public function init() {
		$this->run();
		parent::init();
	}
	
	protected function getDbConnection()
	{
		if($this->db!==null)
			return $this->db;
		elseif(($this->db=Yii::app()->getComponent($this->connectionID)) instanceof CDbConnection)
			return $this->db;
		else
			throw new CException(Yii::t('yii','AuthComponent.connectionID "{id}" is invalid. Please make sure it refers to the ID of a CDbConnection application component.',
				array('{id}'=>$this->connectionID)));
	}
	
	public function getAllAccessAsArray($userId=null)
	{
		if($userId == null) {
			if (!Yii::app()->user->isGuest)
				$userId = Yii::app()->user->getId();
			else
				return array();
		}
	
		$connection = $this->db;
	
		$command = $connection->cache($this->cacheDuration)->createCommand("
				SELECT DISTINCT a.parent as c1, a.child as c2, b.child as c3 FROM ".$this->itemChildTable." a
				LEFT JOIN ".$this->itemChildTable." b ON a.child=b.parent
				WHERE a.parent IN (SELECT itemname FROM ".$this->assignmentTable." WHERE userid=:userId)
				UNION
				SELECT itemname as c1, null, null FROM ".$this->assignmentTable." WHERE userid=:userId
				");
	
		$command->bindParam(":userId", $userId);
	
		$rows = $command->queryAll();
	
		$allAccess = array();
		foreach($rows as $row) {
			$allAccess[] = $row['c1'];
			$allAccess[] = $row['c2'];
			$allAccess[] = $row['c3'];
		}
		$allAccess = array_filter($allAccess);
		$allAccess = array_unique($allAccess);
	
		return $allAccess;
	
	}
	
	public function setUserId($userId) {
		$this->userId = $userId;
	}
	
	public function setCacheDuration($cacheDuration) {
		$this->cacheDuration = $cacheDuration;
	}
	
	private function setAllAccess($userId) {
		$this->allAccess = $this->getAllAccessAsArray($userId);
	}
	
	public function getAllAccess() {
		return $this->allAccess;
	}
	
	public function run() {
		$this->getDbConnection();
		$this->setAllAccess($this->userId);
	}
	
	public function checkAccess($accessName) {
		if (in_array($accessName, $this->allAccess))
			return true;
		else
			return false;
	}
	

}