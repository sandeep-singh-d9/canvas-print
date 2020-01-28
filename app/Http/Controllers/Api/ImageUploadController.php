<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\LibraryAsset;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUpload(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->image->extension();
            $path = '/uploads/images/';
            $request->image->move(public_path($path), $imageName);

            $imageExist = LibraryAsset::find(1);

            // if ($imageExist) {
            //     LibraryAsset::whereId(1)->update([
            //         'image' => $path . '/' . $imageName,
            //     ]);
            // } else {
            //     LibraryAsset::create([
            //         'userId' => 1,
            //         'image' => $path . '/' . $imageName,
            //     ]);

            // }
            // $imageData = LibraryAsset::whereId(1)->first();
            $imageData = $path . $imageName;
            return response()->json([
                'image' => $imageData,
                'success' => true,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'data' => $th->getMessage(),
                'success' => false,
            ], 500);
        }

    }
}
