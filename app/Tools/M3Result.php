<?php 

class M3Result {

	public $ret;
	public $msg;


	// 将对象转为 JSON 对象
	public function toJson() {
		return json_encode($this, JSON_UNESCAPED_UNICODE);
	}

	public function toSave($condition,$successText,$failedText){

		if ($condition) {
			$this->status  = 0;
			$this->ret     = 0;
			$this->message = $successText;
			$this->msg 	   = $successText;
		}else{
			$this->status  = 1;
			$this->ret     = 1;
			$this->message = $failedText;
			$this->msg 	   = $failedText;
		}

		return $this->toJson();
	}

}
