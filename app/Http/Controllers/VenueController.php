<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\VenueRepository;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAllCategories();

        $venues = [];
        if (request('category_id')) {
            $venueRepository = new VenueRepository();
            $venues = $venueRepository->exploreVenues(request('category_id'));
        }

        return view('index', [
            'categories' => $categories,
            'venues' => $venues
        ]);
    }
}
