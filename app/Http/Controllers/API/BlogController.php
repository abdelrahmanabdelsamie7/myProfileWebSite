<?php
namespace App\Http\Controllers\API;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Traits\ResponseJsonTrait;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    use ResponseJsonTrait;
    public function __construct()
    {
        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }
    public function index()
    {
        $blogData = Blog::all();
        return $this->sendSuccess('Blog Data Retrieved Successfully!', $blogData);
    }
    public function store(BlogRequest $request)
    {
        $validatedData = $request->validated();
        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        $blog = Blog::create([
            'image' => $imagePath,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'link_url' => $validatedData['link_url'],
            'user_id' => auth('api')->id(),
        ]);

        return $this->sendSuccess('Blog Data Added Successfully!', $blog);
    }
    public function show(string $uuid)
    {
        $blog = Blog::findOrFail($uuid);
        return $this->sendSuccess('Blog Data Retrieved Successfully!', $blog);
    }
    public function destroy(string $uuid)
    {
        $blog = Blog::findOrFail($uuid);
        $blog->delete();
        return $this->sendSuccess('Blog Data Deleted Successfully!');
    }
}
