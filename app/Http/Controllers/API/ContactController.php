<?php
namespace App\Http\Controllers\API;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Traits\ResponseJsonTrait;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('list', 'destroy');
    }
    public function index()
    {
        $contactData = Contact::all();
        return $this->sendSuccess('Contact Data Retrieved Successfully!', $contactData);
    }
    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());
        return $this->sendSuccess('Contact Data Added Successfully!', $contact);
    }
    public function show(string $uuid)
    {
        $contact = Contact::findOrFail($uuid);
        return $this->sendSuccess('Contact Data Retrieved Successfully!', $contact);
    }
    public function destroy(string $uuid)
    {
        $contact = Contact::findOrFail($uuid);
        $contact->delete();
        return $this->sendSuccess('Contact Data Deleted Successfully!');
    }
}
