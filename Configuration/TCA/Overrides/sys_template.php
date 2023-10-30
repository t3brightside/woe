<?php
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addStaticFile(
    'woe',
    'Configuration/TypoScript/SpotDetail/',
    'WOE - Spot Detail'
);

ExtensionManagementUtility::addStaticFile(
    'woe',
    'Configuration/TypoScript/SpotList/',
    'WOE - JSON Spot List'
);
