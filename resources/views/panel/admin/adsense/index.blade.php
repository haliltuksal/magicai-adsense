@extends('panel.layout.app')

@section('title', 'Google Adsense Settings')

@section('content')
    <div class="page-header">
        <div class="container-xl">
            <div class="row g-2 items-center">
                <div class="col">
                    <h2 class="page-title">
                        Google Adsense Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="adsense_settings_form" onsubmit="return adsenseSettingsSave();" action="{{ route('dashboard.admin.settings.admin.adsense.update') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="form-label">Adsense Code</label>
                                    <textarea name="adsense_code" class="form-control" rows="5">{{ $settings->adsense_code ?? '' }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ ($settings->is_active ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active/Passive</label>
                                    </div>
                                </div>

                                <div id="additional_ad_settings" class="{{ ($settings->is_active ?? false) ? '' : 'd-none' }}">
                                    <!-- Display Ads -->
                                    <div class="form-group mb-3">
                                        <label class="form-label">Display Ads</label>
                                        <textarea name="display_ads_code" class="form-control" rows="5">{{ $settings->display_ads_code ?? '' }}</textarea>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="display_ads_status" name="display_ads_status" {{ ($settings->display_ads_status ?? false) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="display_ads_status">Active/Passive</label>
                                        </div>
                                    </div>

                                    <!-- In-feed Ads -->
                                    <div class="form-group mb-3">
                                        <label class="form-label">In-feed Ads</label>
                                        <textarea name="in_feed_ads_code" class="form-control" rows="5">{{ $settings->in_feed_ads_code ?? '' }}</textarea>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="in_feed_ads_status" name="in_feed_ads_status" {{ ($settings->in_feed_ads_status ?? false) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="in_feed_ads_status">Active/Passive</label>
                                        </div>
                                    </div>

                                    <!-- In-article Ads -->
                                    <div class="form-group mb-3">
                                        <label class="form-label">In-article Ads</label>
                                        <textarea name="in_article_ads_code" class="form-control" rows="5">{{ $settings->in_article_ads_code ?? '' }}</textarea>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="in_article_ads_status" name="in_article_ads_status" {{ ($settings->in_article_ads_status ?? false) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="in_article_ads_status">Active/Passive</label>
                                        </div>
                                    </div>

                                    <!-- Multiplex Ads -->
                                    <div class="form-group mb-3">
                                        <label class="form-label">Multiplex Ads</label>
                                        <textarea name="multiplex_ads_code" class="form-control" rows="5">{{ $settings->multiplex_ads_code ?? '' }}</textarea>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="multiplex_ads_status" name="multiplex_ads_status" {{ ($settings->multiplex_ads_status ?? false) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="multiplex_ads_status">Active/Passive</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="adsense_settings_button">
                                    <span class="spinner-border spinner-border-sm me-2 d-none" role="status" id="adsense_settings_button_loading"></span>
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#is_active').change(function() {
                if($(this).is(':checked')) {
                    $('#additional_ad_settings').removeClass('d-none');
                } else {
                    $('#additional_ad_settings').addClass('d-none');
                }
            });
        });
    </script>
@endsection