<?php

    namespace Dragonfly\App\Helpers\Messages;
    use Dragonfly\App\Helpers\Messages\SuccessMessage;

    require_once (APP_PATH . HELPERS_PATH . "messages/SuccessMessage.php");
    require_once (APP_PATH . HELPERS_PATH . "messages/ErrorMessage.php");
    require_once (APP_PATH . HELPERS_PATH . "messages/WarningMessage.php");
/**
     *  Represents a Factory of Message that will be displayed 
     *  in case of error, success or warning
     * 
     *  @author Yesid Perea
     *
     **/
	class MessageFactory {

        /**
         * Creates and return a Message Object according to the type
         * "success", "warning", "error".
         * @param $type
         * @param $text
         * @param null $url
         * @return ErrorMessage|Message|SuccessMessage|WarningMessage
         */
		public static function createMessage ($type, $text, $url = null) {
			
			switch ($type) {
				case 'success':
					return new SuccessMessage($type, $text, $url);
					break;

				case 'warning':
					return new WarningMessage($type, $text, $url);
					break;

				case 'error':
					return new ErrorMessage($type, $text, $url);
					break;

				default:
					return new Message($type, $text, $url);
					break;
			}
		}
	}

?>