<?php

    namespace Dragonfly\App\Helpers\Messages;

    require_once (APP_PATH . HELPERS_PATH . "messages/Message.php");

    /**
     *  Represents a Warning Message
     * 
     *  @author Yesid Perea
     *
     **/
	class WarningMessage extends Message {

	    /**
	     *  Returns a whole HTML text of message to be displayed
	     *  using the "alert-warning" CSS Bootstrap Style 
	     */
		public function display () {

			$text  = '';
			$text .= '<div class="alert alert-warning" role="alert">' . $this->text ;

			if (!empty($this->url)){
				$text .= ' <a href="'. $this->url .'" class="alert-link">CLICK HERE</a> to continue.';
			}
			$text .= '</div>';
			
			return $text;
		}
	}
?>