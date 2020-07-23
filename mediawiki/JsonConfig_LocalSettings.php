<!-- Suggested LocalSettings.php to work with JsonConfig tabular and map data -->

wfLoadExtension( 'JsonConfig' );

$wgJsonConfigModels = [];
$wgJsonConfigs = [];

// https://www.mediawiki.org/wiki/Extension:JsonConfig#Configuration

$wgJsonConfigModels['Tabular.JsonConfig'] = 'JsonConfig\JCTabularContent';
$wgJsonConfigs['Tabular.JsonConfig'] = [
	'namespace' => 486,
	'nsName' => 'Data',
	// page name must end in ".tab", and contain at least one symbol
	'pattern' => '/.\.tab$/',
	'license' => 'CC0-1.0'
];

$wgJsonConfigModels['Map.JsonConfig'] = 'JsonConfig\JCMapDataContent';
$wgJsonConfigs['Map.JsonConfig'] = [
	'namespace' => 486,
	'nsName' => 'Data',
	// page name must end in ".map", and contain at least one symbol
	'pattern' => '/.\.map$/',
	'license' => 'CC0-1.0'
];