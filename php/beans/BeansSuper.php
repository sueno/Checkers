<?php

class BeansSuper implements BeansInterface{
    
	protected $data;
	protected $tableTitle = "";
		
    /**
     * @Override
     */
    public function /* string */ getTablelTitle() {
        return $this->tableTitle;
    }
    
    /**
     * @Override
     */
	public function /* string[] */ getCalams() {
	    return array_keys($this->data);
	}
	
    /**
     * @Override
     */
	public function setByKey($key, $value) {
	    $this->data[$key] = $value;
	}
	
    /**
     * @Override
     */
	public function getElement($key) {
	   return $this->data[$key];
	}
	
}

?>
	