<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Get all categories.
     */
    public function index()
    {
        $categories = Category::orderBy('id')->get();

        return response()->json([
            'data' => $categories,
        ]);
    }

    /**
     * Create a new category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name',
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:categories,slug',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'icon' => [
                'nullable',
                'string',
                'max:100',
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $validated['slug']
                ?? Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'icon' => $validated['icon'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => $category,
        ], 201);
    }

    /**
 * Update a category.
 */
public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => [
            'sometimes',
            'string',
            'max:255',
            'unique:categories,name,' . $category->id,
        ],
        'slug' => [
            'sometimes',
            'nullable',
            'string',
            'max:255',
            'unique:categories,slug,' . $category->id,
        ],
        'description' => [
            'sometimes',
            'nullable',
            'string',
        ],
        'icon' => [
            'sometimes',
            'nullable',
            'string',
            'max:100',
        ],
        'is_active' => [
            'sometimes',
            'boolean',
        ],
    ]);

    // Generate slug automatically if name changes
    // and slug is not provided
    if (
        isset($validated['name']) &&
        !array_key_exists('slug', $validated)
    ) {
        $validated['slug'] = Str::slug($validated['name']);
    }

    $category->update($validated);

    return response()->json([
        'message' => 'Category updated successfully.',
        'data' => $category->fresh(),
    ]);
}
    /**
     * Delete a category.
     */
    public function destroy(Category $category)
    {
        // Check if the category has projects
        if ($category->projects()->exists()) {
            return response()->json([
                'message' => 'Cannot delete this category because it has associated projects.',
            ], 422);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully.',
        ]);
    }
}

