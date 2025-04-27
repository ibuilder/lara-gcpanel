<?php

namespace App\Services;

use Supabase\Client;

class SupabaseStorageService
{
    protected $supabase;

    public function __construct()
    {
        $this->supabase = new Client([
            'url' => env('SUPABASE_URL'),
            'key' => env('SUPABASE_KEY'),
        ]);
    }

    public function uploadFile($bucket, $filePath, $fileName)
    {
        return $this->supabase->storage->from($bucket)->upload($filePath, $fileName);
    }

    public function getFileUrl($bucket, $fileName)
    {
        return $this->supabase->storage->from($bucket)->getPublicUrl($fileName);
    }

    public function deleteFile($bucket, $fileName)
    {
        return $this->supabase->storage->from($bucket)->remove($fileName);
    }

    public function listFiles($bucket)
    {
        return $this->supabase->storage->from($bucket)->list();
    }
}