<?php

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Models\Page;
use App\Models\SeoData;
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
        $page = Page::create($this->validateRequest($request));
        $page->seo()->create($request->get('seo'));

        return redirect()
            ->route('admin.pages.index')
            ->with('success', trans('Data stored successfully.'));
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate(array_merge([
            'title' => 'required|string|max:255',
            'text_short' => 'nullable|string|max:300',
            'text' => 'nullable|string',
            'status' => 'required|in:' . ContentStatus::valuesString(),
        ], SeoData::$rules));
    }

    public function edit(Page $page)
    {
        return view('admin.page.form', [
            'model' => $page,
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $page->update($this->validateRequest($request));
        $page->seo()->update($request->get('seo'));

        return redirect()
            ->route('admin.pages.index')
            ->with('success', trans('Data updated successfully.'));
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()
            ->route('admin.pages.index')
            ->with('success', trans('Data deleted successfully.'));
    }
}
