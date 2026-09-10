<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Services\SupabaseStorageService;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    /**
     * Get all images for a project.
     */
    public function index(Project $project)
    {
        $images = $project->images()
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'project' => [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
            ],
            'images' => $images,
        ]);
    }

    /**
     * Upload an image for a project.
     */
    public function store(
        Request $request,
        Project $project,
        SupabaseStorageService $storage
    ) {
        $validated = $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'alt_text' => [
                'nullable',
                'string',
                'max:255',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'is_featured' => [
                'nullable',
                'boolean',
            ],
        ]);

        // Upload image to Supabase Storage
        $uploadedImage = $storage->uploadProjectImage(
            $request->file('image'),
            $project->slug
        );

        // If the new image is featured,
        // remove featured status from other images
        if ($request->boolean('is_featured')) {
            $project->images()->update([
                'is_featured' => false,
            ]);
        }

        // Save image in database
        $image = $project->images()->create([
            'path' => $uploadedImage['path'],
            'alt_text' => $validated['alt_text'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_featured' => $request->boolean('is_featured'),
        ]);

        // Update project cover image
        if ($image->is_featured) {
            $project->update([
                'cover_image' => $image->path,
            ]);
        }

        return response()->json([
            'message' => 'Image uploaded successfully.',
            'data' => $image,
        ], 201);
    }

    /**
     * Update project image information.
     */
    public function update(
        Request $request,
        ProjectImage $image
    ) {
        $validated = $request->validate([
            'alt_text' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],
            'sort_order' => [
                'sometimes',
                'integer',
                'min:0',
            ],
            'is_featured' => [
                'sometimes',
                'boolean',
            ],
        ]);

        $project = $image->project;

        // If this image becomes featured
        if (
            array_key_exists('is_featured', $validated)
            && $request->boolean('is_featured')
        ) {
            // Remove featured status from other images
            $project->images()
                ->where('id', '!=', $image->id)
                ->update([
                    'is_featured' => false,
                ]);

            // Update project cover image
            $project->update([
                'cover_image' => $image->path,
            ]);
        }

        // Update image
        $image->update($validated);

        return response()->json([
            'message' => 'Image updated successfully.',
            'data' => $image->fresh(),
        ]);
    }

    /**
     * Delete a project image.
     */
    public function destroy(
        ProjectImage $image,
        SupabaseStorageService $storage
    ) {
        $project = $image->project;
        $wasFeatured = $image->is_featured;

        // Delete image from Supabase Storage
        $response = $storage->delete($image->path);

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Failed to delete image from storage.',
                'error' => $response->body(),
            ], 500);
        }

        // Delete image record from database
        $image->delete();

        // If deleted image was the cover image,
        // select another image as featured and cover
        if ($wasFeatured) {

            $newFeaturedImage = $project->images()
                ->orderBy('sort_order')
                ->first();

            if ($newFeaturedImage) {

                $newFeaturedImage->update([
                    'is_featured' => true,
                ]);

                $project->update([
                    'cover_image' => $newFeaturedImage->path,
                ]);

            } else {

                // No images left
                $project->update([
                    'cover_image' => null,
                ]);
            }
        }

        return response()->json([
            'message' => 'Image deleted successfully.',
        ]);
    }
}