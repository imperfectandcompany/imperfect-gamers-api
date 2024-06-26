<?php

class Dev {
    
    private $dbObject;

    public function __construct($dbObject)
    {
        $this->dbObject = $dbObject;
    }
    
    public function toggleDevMode(){
        $currentStatus = $this->getDevModeStatus();
        return $this->setDevModeStatus(!$currentStatus);
    }
    
    public function toggleDevModeFromValue(bool $value){
        return $this->setDevModeStatus($value);
    }

    public function getDevModeStatus(){
        return true;

    }

    private function setDevModeStatus($status){
        return $this->dbObject->updateData("app_settings", "devmode = :devmode", null, [
            [ 'value' => $status, 'type' => PDO::PARAM_BOOL ]
        ]);
    }
}
