<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ParkImage;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Services\ParkService;
use App\Http\Requests\ParkStoreRequest;
use App\Models\ParkActivity;

class ParkController extends Controller
{
    private $service;

    public function __construct(ParkService $service) {
        $this->service = $service;
    }

    public function index() {
        $items = $this->service->read();
        return view("admin.park.index", compact("items"));
    }

    public function getBySlug($slug) {
        $item = $this->service->get($slug, true, ["images", "activities.activity"]);
        return view("admin.park.details", compact("item"));
    }

    public function create() {
        $activities = Activity::orderBy("name", "asc")->get();
        return view("admin.park.create", ["activities" => $activities]);
    }

    public function store(ParkStoreRequest $request) {
        $data = $request->validated();

        // 1. Collect park data
        $park = $this->service->create([
            'name' => $data['name'],
            'street' => $data['street'],
            'city' => $data['city'],
            'country' => $data['country'],
            'area' => $data['area'],
            'opens_at' => $data['opens_at'],
            'closes_at' => $data['closes_at'],
            'google_maps_url' => $data['google_maps_url']
        ]);

        // 2. Upload images & save to db
        $uploadedImages = FileUpload::uploadFiles($data['images']);
        foreach ($uploadedImages as $image) {
            ParkImage::create([
                'filename' => $image,
                'park_id' => $park->id
            ]);
        }

        // 3. Save activities
        foreach ($data['activities'] as $activity) {
            ParkActivity::create([
                'park_id' => $park->id,
                'activity_id' => $activity
            ]);
        }

        return response()->json($park);
    }
}
