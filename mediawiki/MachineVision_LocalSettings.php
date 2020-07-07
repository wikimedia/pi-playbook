<!-- Suggested LocalSettings.php to work with MachineVision extension -->
$wgEnableWikibaseRepo = true;
$wgEnableWikibaseClient = false;
require_once "$IP/extensions/Wikibase/repo/Wikibase.php";

$baseNs = 100;

# Define the namespaces
$wgExtraNamespaces[WB_NS_PROPERTY] = 'Property';
$wgExtraNamespaces[WB_NS_PROPERTY_TALK] = 'Property_talk';

# Assigning the correct entity types to the namespaces
$wgWBRepoSettings['entityNamespaces']['item'] = NS_MAIN;
$wgWBRepoSettings['entityNamespaces']['property'] = WB_NS_PROPERTY;

$wgWBRepoSettings['allowEntityImport'] = true;

wfLoadExtension( 'WikibaseMediaInfo' );

$wgMediaInfoProperties = ['depicts' => 'P4'];

// $wgDepictsQualifierProperties = ['features' =>  'P2',
// 	'color' =>  'P3',
// 	'wears' =>  'P4',
// 	'part' =>  'P5',
// 	'inscription' =>  'P6',
// 	'symbolizes' =>  'P7',
// 	'position' =>  'P8',
// 	'quantity' =>  'P9',
// ];

// $wgCSPReportOnlyHeader = [
// 	'useNonces' => false,
// 	'includeCORS' => false,
// 	'default-src' => [
// 		'*.wikimedia.org',
// 		'*.wikipedia.org',
// 		'*.wikinews.org',
// 		'*.wiktionary.org',
// 		'*.wikibooks.org',
// 		'*.wikiversity.org',
// 		'*.wikisource.org',
// 		'wikisource.org',
// 		'*.wikiquote.org',
// 		'*.wikidata.org',
// 		'*.wikivoyage.org',
// 		'*.mediawiki.org',
// 	],
// 	'script-src' => [
// 		// A future refinement might be
// 		// to not allow wildcard on *.wikimedia.org
// 		// but explicitly list instead
// 		'*.wikimedia.org',
// 		'*.wikipedia.org',
// 		'*.wikinews.org',
// 		'*.wiktionary.org',
// 		'*.wikibooks.org',
// 		'*.wikiversity.org',
// 		'*.wikisource.org',
// 		'wikisource.org',
// 		'*.wikiquote.org',
// 		'*.wikidata.org',
// 		'*.wikivoyage.org',
// 		'*.mediawiki.org',
// 	],
// ];

//$wgUploadWizardConfig['wikibase']['enabled'];
wfLoadExtension( 'MachineVision' );

$wgMachineVisionGoogleCredentialsFileLocation = '/vagrant/google-application-credentials.json';
$wgMachineVisionRequestLabelsFromWikidataPublicApi = true;
$wgMachineVisionRequestLabelsOnUploadComplete = true;
$wgMachineVisionHandlers['google'] = [
    'class' => 'MediaWiki\\Extension\\MachineVision\\Handler\\GoogleCloudVisionHandler',
    'services' => [
		'MachineVisionFetchGoogleCloudVisionAnnotationsJobFactory',
        'MachineVisionRepository',
        'MachineVisionRepoGroup',
        'MachineVisionDepictsSetter',
        'MachineVisionLabelResolver',
    ]
];

$wgMachineVisionGoogleSafeSearchLimits = [
	'adult' => 3,
	'medical' => 3,
	'violent' => 4,
	'racy' => 4,
];
$wgMachineVisionGCVSendFileContents = true;

// $wgMachineVisionWikidataIdBlacklist = [ 'Q5113', 'Q43238', 'Q31528', 'Q316342' ];