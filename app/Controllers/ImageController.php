<?php

namespace App\Controllers;

class ImageController extends BaseController
{
    public function show($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        if (is_file($path)) {
            $mimeType = mime_content_type($path);
            header('Content-Type: ' . $mimeType);
            readfile($path);
        } else {
            // Handle not found images, e.g., show a default image or return a 404 response.
        }
    }
}

