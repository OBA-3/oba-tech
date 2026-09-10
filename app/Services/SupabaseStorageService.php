<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SupabaseStorageService
{
    protected string $url;
    protected string $key;
    protected string $bucket;

    public function __construct()
    {
        $this->url = rtrim(env('SUPABASE_URL'), '/');
        $this->key = env('SUPABASE_KEY');
        $this->bucket = env('SUPABASE_STORAGE_BUCKET', 'project-images');
    }

    /**
     * Upload a file to Supabase Storage.
     */
    public function upload(
        string $path,
        string $contents,
        string $contentType
    ): Response {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->key,
            'apikey' => $this->key,
            'x-upsert' => 'true',
        ])
        ->withBody($contents, $contentType)
        ->put(
            "{$this->url}/storage/v1/object/{$this->bucket}/{$path}"
        );
    }

    /**
     * Upload a project image to Supabase Storage.
     */
    public function uploadProjectImage(
        UploadedFile $file,
        string $projectSlug
    ): array {
        $extension = $file->getClientOriginalExtension()
            ?: $file->extension()
            ?: 'jpg';

        $fileName = Str::uuid() . '.' . $extension;

        $path = "projects/{$projectSlug}/{$fileName}";

        $response = $this->upload(
            $path,
            file_get_contents($file->getRealPath()),
            $file->getMimeType() ?: 'image/jpeg'
        );

        if (!$response->successful()) {
            throw new \RuntimeException(
                'Failed to upload image to Supabase: ' . $response->body()
            );
        }

        return [
            'path' => $path,
            'url' => $this->getPublicUrl($path),
        ];
    }

    /**
     * Get the public URL of a file.
     */
    public function getPublicUrl(string $path): string
    {
        return "{$this->url}/storage/v1/object/public/{$this->bucket}/{$path}";
    }

    /**
     * Delete a file from Supabase Storage.
     */
    /**
 * Delete a file from Supabase Storage.
 */
/**
 * Delete a file from Supabase Storage.
 */
public function delete(string $path): Response
{
    return Http::withHeaders([
        'Authorization' => 'Bearer ' . $this->key,
        'apikey' => $this->key,
        'Content-Type' => 'application/json',
    ])->send(
        'DELETE',
        "{$this->url}/storage/v1/object/{$this->bucket}",
        [
            'json' => [
                'prefixes' => [$path],
            ],
        ]
    );
}
}