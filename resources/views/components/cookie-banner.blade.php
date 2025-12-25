<div id="cookie-container">
    <div id="cookie-consent-banner" style="display:none;">
        <p>
            {{ __('cookies.text') }}
            <a href="{{ route('datenschutzerklarung') }}" target="_blank">
                {{ __('cookies.policy_link') }}
            </a>
        </p>

        <button id="accept-cookies">{{ __('cookies.accept') }}</button>
        <button id="reject-cookies">{{ __('cookies.reject') }}</button>
        <button id="manage-cookies">{{ __('cookies.manage') }}</button>
    </div>

    <div id="cookie-management-panel" style="display:none;">
        <h2>{{ __('cookies.settings_title') }}</h2>

        <form id="cookie-management-form">
            <label>
                <input type="checkbox" checked disabled>
                {{ __('cookies.necessary') }}
            </label>
            <p>{{ __('cookies.necessary_desc') }}</p>

            <label>
                <input type="checkbox" name="analytics">
                {{ __('cookies.analytics') }}
            </label>
            <p>{{ __('cookies.analytics_desc') }}</p>

            <label>
                <input type="checkbox" name="marketing">
                {{ __('cookies.marketing') }}
            </label>
            <p>{{ __('cookies.marketing_desc') }}</p>

            <button type="button" id="save-cookie-preferences">
                {{ __('cookies.save') }}
            </button>
        </form>
    </div>
</div>
