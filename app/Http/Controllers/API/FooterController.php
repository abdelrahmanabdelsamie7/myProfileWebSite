<?php
namespace App\Http\Controllers\API;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use App\Traits\ResponseJsonTrait;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }
    public function index()
    {
        $footerData = Footer::all();
        return $this->sendSuccess('Footer Data Retrieved Successfully!', $footerData);
    }
    public function store(FooterRequest $request)
    {
        $footer = Footer::create($request->validated());
        return $this->sendSuccess('Footer Data Added Successfully!', $footer);
    }
    public function show(string $uuid)
    {
        $footer = Footer::findOrFail($uuid);
        return $this->sendSuccess('Footer Data Retrieved Successfully!', $footer);
    }
    public function destroy(string $uuid)
    {
        $footer = Footer::findOrFail($uuid);
        $footer->delete();
        return $this->sendSuccess('Footer Data Deleted Successfully!');
    }
}
