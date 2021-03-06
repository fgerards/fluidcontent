<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Flux_Core::unregisterConfigurationProvider('Tx_Fed_Provider_Configuration_ContentObjectConfigurationProvider');
Tx_Flux_Core::registerConfigurationProvider('Tx_Fluidcontent_Provider_ContentConfigurationProvider');
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Content',
	'Fluid Content Element',
	t3lib_extMgm::extRelPath('fluidcontent') . 'ext_icon.gif'
);
t3lib_extMgm::addPlugin(array('Fluid Content', 'fed_fce', t3lib_extMgm::extRelPath('fluidcontent') . 'ext_icon.gif'), 'CType');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/Common', 'Fluid Content Elements: Common');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TwitterBootstrap', 'Fluid Content Elements: Twitter Bootstrap');

$TCA['tt_content']['types']['list']['subtypes_addlist']['fed_fce'] = 'pi_flexform';
$TCA['tt_content']['types']['fed_fce']['showitem'] = '
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
	--div--;Content settings, tx_fed_fcefile;Element type, pi_flexform;Configuration,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access
	 ';
