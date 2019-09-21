<?php

	namespace Dragonfly\App\Helpers\Messages;

    /**
     *  Represents a Message that will be displayed in case of error, success or warning
     * 
     *  @author Yesid Perea
     *
     **/
	class Message {
		
		protected $text;
		protected $url;
		protected $type;

		/**
		 * Initialize the object with the type of message
		 * "success", "warning", "error".
		 * @param null $type
		 * @param null $text
		 * @param null $url
		 */
		public function __construct ($type=null, $text = null, $url = null) {
			$this->setType ($type);
			$this->setText($text);
			$this->setUrl($url);
		}   
		
	    /**
	     *  Sets the text of the message
	     */
		public function setText ($text) {
			$this->text = $text;
		}
		
	    /**
	     *  Returns the text of the message
	     */
		public function getText () {
			return $this->text;
		}

	    /**
	     *  Sets the text of the message: "success", "warning" or "error".
	     */
		public function setType ($type) {
			$this->type = $type;
		}
		
	    /**
	     *  Returns the text of the message: "success", "warning" or "error".
	     */
		public function getType () {
			return $this->type;
		}

	    /**
	     *  Sets the redirect url once the message has been displayed
	     */
		public function setUrl ($url) {
			$this->url = $url;
		}
		
	    /**
	     *  Returns the redirect url once the message has been displayed
	     */
		public function geturl () {
			return $url->url;
		}

	    /**
	     *  Returns the whole HTML text of message to be displayed
	     */
		public function display () {
			
			$text  = '';
			$text .= '<div class="alert alert-info" role="alert">' . $this->text ;

			if (!empty($this->url)){
				$text .= ' <a href="'. $this->url 
					   . '" class="alert-link">CLICK HERE</a> to continue.';
			}
			$text .= '</div>';
			
			return $text;
		}
	}

?>
