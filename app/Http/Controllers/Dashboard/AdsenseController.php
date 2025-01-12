<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdsenseSetting;
use Illuminate\Http\Request;

class AdsenseController extends Controller
{
    public function index()
    {
        $settings = AdsenseSetting::first();
        return view('panel.admin.adsense.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'adsense_code' => 'required|string',
        ]);

        $settings = AdsenseSetting::firstOrNew();
        $settings->adsense_code = $request->adsense_code;
        $settings->is_active = $request->has('is_active');
        
        // Additional ad settings
        $settings->display_ads_code = $request->display_ads_code;
        $settings->display_ads_status = $request->has('display_ads_status');
        
        $settings->in_feed_ads_code = $request->in_feed_ads_code;
        $settings->in_feed_ads_status = $request->has('in_feed_ads_status');
        
        $settings->in_article_ads_code = $request->in_article_ads_code;
        $settings->in_article_ads_status = $request->has('in_article_ads_status');
        
        $settings->multiplex_ads_code = $request->multiplex_ads_code;
        $settings->multiplex_ads_status = $request->has('multiplex_ads_status');
        
        $settings->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Adsense settings updated successfully.']);
        }
        
        return redirect()->back()->with('success', 'Adsense settings updated successfully.');
    }
}