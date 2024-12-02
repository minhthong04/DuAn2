<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Sửa lại namespace cho đúng
use Illuminate\Support\Str;


trait FileUploadTrait
{
  public function handleFileUpload(Request $request, string $fieldName, ?string $oldPath = null, string $dir = 'uploads'): ?string
  {
    // Check if the request has a file
    if (!$request->hasFile($fieldName)) {
      return null;
    }

    // Delete the existing image if it exists
    if ($oldPath && File::exists(public_path($oldPath))) {
      File::delete(public_path($oldPath));
    }

    $file = $request->file($fieldName);
    $extension = $file->getClientOriginalExtension();
    $updatedFileName = Str::random(30) . '.' . $extension;
    $file->move(public_path($dir), $updatedFileName);

    $filePath = $dir . '/' . $updatedFileName;

    return $filePath;
  }

  public function deleteFile(string $path): void
  {
    if ($path && File::exists(public_path($path))) {
      File::delete(public_path($path));
    }
  }
}
