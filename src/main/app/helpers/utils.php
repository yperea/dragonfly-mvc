<?php

/**
 *  Checks the image to be uploaded
 */
function uploadImage ($image, &$imageName, $uploadFolder) {

    $imgType   = $image['type'];
    $imgSize   = $image['size'];

    if ((($imgType == 'image/gif')
            || ($imgType == 'image/jpeg')
            || ($imgType == 'image/pjpeg')
            || ($imgType == 'image/png'))
        && ($imgSize > 0)) {

        list($imgWidth, $imgHeight) = getimagesize($image['tmp_name']);

        if (defined('MAX_FILE_SIZE') && ($imgSize > MAX_FILE_SIZE)) {
            return false;
        }

        if (defined('MAX_IMG_WIDTH') && ($imgWidth > MAX_IMG_WIDTH)) {
            return false;
        }

        if (defined('MAX_IMG_HEIGHT') && ($imgHeight > MAX_IMG_HEIGHT)) {
            return false;
        }

        if ($image['error'] == 0) {
            // Move the file to the target upload folder

            $imageName = time(). '_' . trim($image['name']);

            $target = APP_PATH . 'public/content/'. $uploadFolder . basename($imageName);

            if (!move_uploaded_file($image['tmp_name'], $target)) {
                // The new picture file move failed, so delete the temporary file and set the error flag
                @unlink($image['tmp_name']);
                $textMessage	= 'Sorry, there was a problem uploading your picture.';
                return false;
            }
        }
        else {
            // The new picture file is not valid, so delete the temporary file and set the error flag
            @unlink($image['tmp_name']);
            $textMessage = 'Your picture must be a GIF, JPEG, or PNG image file no greater than 
	                               ' . (MAX_FILE_SIZE / 1024) .
                ' KB and ' . MAX_IMG_WIDTH .
                ' x ' . MAX_IMG_HEIGHT . ' pixels in size.';
            return false;
        }
        return true;
    }
    else {
        return false;
    }
}
