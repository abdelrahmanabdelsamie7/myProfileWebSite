<?php
namespace App\Http\Controllers\API;
use App\Models\Service;
use App\Traits\ResponseJsonTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }
    public function index()
    {
        $serviceData = Service::all();
        return $this->sendSuccess('Services Data Retrieved Successfully!', $serviceData);
    }
    public function store(ServiceRequest $request)
    {
        $service = Service::create($request->validated());
        return $this->sendSuccess('Service Data Added Successfully!', $service);
    }
    public function show(string $uuid)
    {
        $service = Service::findOrFail($uuid);
        return $this->sendSuccess('Service Data Retrieved Successfully!', $service);
    }
    public function destroy(string $uuid)
    {
        $service = Service::findOrFail($uuid);
        $service->delete();
        return $this->sendSuccess('Service Data Deleted Successfully!');
    }
}
