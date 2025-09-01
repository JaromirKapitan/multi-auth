<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatus;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\SeoData;
use App\Models\WebPage;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
    public function index()
    {
        return view('admin.web-page.index', [
            'list' => WebPage::parents()->get(),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.web-page.form', [
            'model' => new WebPage(session()->get('_old_input') ?? [
                'status' => ContentStatus::Draft->value,
                'language_id' => Language::where('code', $request->get('lang') ?? config('app.locale'))->first()->id,
                'parent_id' => $request->get('parent_id') ?? null,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $webPage = WebPage::create($this->validateRequest($request));
        $webPage->seo()->create($request->get('seo'));

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('Data stored successfully.'));
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate(array_merge([
            'parent_id' => 'nullable|integer',
            'language_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'text_short' => 'nullable|string|max:300',
            'text' => 'nullable|string',
            'status' => 'required|in:' . ContentStatus::valuesString(),
        ], SeoData::$rules));
    }

    public function edit(WebPage $webPage)
    {
        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function update(Request $request, WebPage $webPage)
    {
        $webPage->update($this->validateRequest($request));
        $webPage->seo()->update($request->get('seo'));

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('Data updated successfully.'));
    }

    public function destroy(WebPage $webPage)
    {
        $webPage->delete();
        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('Data deleted successfully.'));
    }
}
