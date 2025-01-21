<?php
namespace App\Http\Controllers\API;
use App\Http\Requests\EducationRequest;
use App\Models\Education;
use App\Traits\ResponseJsonTrait;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }
    public function index()
    {
        $educationData = Education::all();
        return $this->sendSuccess('Education Data Retrieved Successfully!', $educationData);
    }
    public function store(EducationRequest $request)
    {
        $education = Education::create($request->validated());
        return $this->sendSuccess('Education Data Added Successfully!', $education);
    }
    public function show(string $uuid)
    {
        $education = Education::findOrFail($uuid);
        return $this->sendSuccess('Education Data Retrieved Successfully!', $education);
    }
    public function destroy(string $uuid)
    {
        $education = Education::findOrFail($uuid);
        $education->delete();
        return $this->sendSuccess('Education Data Deleted Successfully!');
    }
}
