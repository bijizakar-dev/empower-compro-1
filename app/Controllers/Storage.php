<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;

class Storage extends Controller
{
    public function file(...$segments)
    {
        if (empty($segments)) {
            throw PageNotFoundException::forPageNotFound("Path kosong");
        }

        $path = implode('/', $segments);

        $fullPath = WRITEPATH . 'uploads/' . $path;

        if (!is_file($fullPath)) {
            throw PageNotFoundException::forPageNotFound("File tidak ditemukan: " . $path);
        }

        $mime = mime_content_type($fullPath);

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setBody(file_get_contents($fullPath));
    }
}