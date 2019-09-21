<?php

    namespace Dragonfly\App\Helpers\Messages;

    require_once (APP_PATH . HELPERS_PATH . "messages/Message.php");

    /**
     *  Represents a Success Message
     * 
     *  @author Yesid Perea
     *
     **/
	class SuccessMessage extends Message {

	    /**
	     *  Returns a whole HTML text of message to be displayed
	     *  using the "alert-success" CSS Bootstrap Style 
	     */
		public function display () {

			$text  = '';
			$text .= '<div class="alert alert-success" role="alert">' . $this->text ;

			if (!empty($this->url)){
				$text .= ' <a href="'. $this->url .'" class="alert-link">CLICK HERE</a> to continue.';
			}
			$text .= '</div>';
			
			return $text;
		}
	}
?>