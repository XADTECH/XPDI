<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageSettingRequest;
use App\Models\PageSetting;
use App\Services\admin\PageService;
use Illuminate\Http\Request;

class PageSettingController extends Controller
{

    protected $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }



    public function index()
    {
        $page_data = PageSetting::first();
        return view('backend.admin.page-setting.index', compact('page_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageSettingRequest $request)
    {

        $data = $request->validated();

        // FAQ fields to JSON
    if (isset($request->fields)) {
        $data['faq'] = json_encode($request->fields);
    }
         // Pass data and files to the service
         $this->pageService->savePageService($data, $request->file('about_image'));
         return redirect()->back()->with('success', 'Page information updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
