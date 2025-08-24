<?php

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.index', [
            'list' => Page::all(),
        ]);
    }

    public function create()
    {
        return view('admin.page.form', [
            'model' => new Page(session()->get('_old_input') ?? [
                'status' => ContentStatus::Draft->value
            ]),
        ]);
    }

    public function store(Request $request)
    {
        Page::create($this->validateRequest($request));

        return redirect()
            ->route('admin.pages.index')
            ->with('success', trans('Data stored successfully.'));
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'text_short' => 'nullable|string|max:1000',
            'text' => 'nullable|string',
            'status' => 'required|in:' . ContentStatus::valuesString(),
        ]);
    }
}
