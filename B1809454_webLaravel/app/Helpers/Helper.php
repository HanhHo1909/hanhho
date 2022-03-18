<?php

use App\Setting;

function getConfigFromSetting($configKey)
{
	$setting = Setting::where('config_key', $configKey)->first();
	if(!empty($setting)){
		return $setting->config_value;
	}
	return NULL;
}