<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $imgDir = public_path('assets/MK/Images');
        $bookDir = public_path('assets/MK/Books');

        // Read folders & sort by newest uploads
        $allImages = File::isDirectory($imgDir) ? collect(File::files($imgDir))->sortByDesc->getMTime()->values() : collect();
        $allBooks  = File::isDirectory($bookDir) ? collect(File::files($bookDir))->sortByDesc->getMTime()->values() : collect();

        // Paginate segments
        $images = $this->Paginate($allImages, 12, 'photos_page', $request);
        $books  = $this->Paginate($allBooks, 10, 'books_page', $request);

        return view('gallery', compact('images', 'books'));
    }

    protected function Paginate($items, $perPage, $pageName, $request)
    {
        $page = LengthAwarePaginator::resolveCurrentPage($pageName);

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values()->all(),
            $items->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
                'pageName' => $pageName,
            ]
        );
    }
}