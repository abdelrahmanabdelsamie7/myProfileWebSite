<?php
namespace App\Http\Controllers\API;
use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use App\Traits\ResponseJsonTrait;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }
    public function index()
    {
        $experienceData = Experience::all();
        return $this->sendSuccess('Experience Data Retrieved Successfully!', $experienceData);
    }
    public function store(ExperienceRequest $request)
    {
        $experienceData = Experience::create($request->validated());
        return $this->sendSuccess('Experience Data Added Successfully!', $experienceData);
    }
    public function show(string $uuid)
    {
        $experienceData = Experience::findOrFail($uuid);
        return $this->sendSuccess('Experience Data Retrieved Successfully!', $experienceData);
    }
    public function destroy(string $uuid)
    {
        $experienceData = Experience::findOrFail($uuid);
        $experienceData->delete();
        return $this->sendSuccess('Experience Data Deleted Successfully!');
    }
}
