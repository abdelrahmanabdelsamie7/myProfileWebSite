<?php
namespace App\Http\Controllers\API;
use App\Models\About;
use App\Traits\ResponseJsonTrait;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }
    public function index()
    {
        $aboutData = About::all();
        return $this->sendSuccess('About Me Data Retrieved Successfully!', $aboutData);
    }
    public function store(AboutRequest $request)
    {
        $aboutMe = About::create($request->validated());
        return $this->sendSuccess('About Me Data Added Successfully!', $aboutMe);
    }
    public function show(string $uuid)
    {
        $aboutMe = About::findOrFail($uuid);
        return $this->sendSuccess('About Me Data Retrieved Successfully!', $aboutMe);
    }
    public function destroy(string $uuid)
    {
        $aboutMe = About::findOrFail($uuid);
        $aboutMe->delete();
        return $this->sendSuccess('About Me Data Deleted Successfully!');
    }
}
