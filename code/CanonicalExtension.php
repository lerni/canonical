<?php

class CanonicalExtension extends DataExtension {
    private static $db = array(
		"CanonicalURL" => "Text"
	);

    public function updateCMSFields(FieldList $fields) {
		$MetaToggle = $fields->fieldByName("Root.Main.Metadata");
		$MetaToggle->push($MetaCanonical = TextField::create("CanonicalURL", _t("Canonical.LinkOverride","Canonical URL - Override your own URL")));
		$MetaCanonical->setAttribute('placeholder', $this->getorsetCanonicalURL());
    }

	function getorsetCanonicalURL() {
		$siteConfig = SiteConfig::current_site_config();
		if (method_exists($this->owner, 'CanonicalLink')) {
			// if something dynamic
			$link = $this->owner->CanonicalLink();
		}
		if ($this->owner->CanonicalURL) {
			// Canonical Tag is set on Page
    		$link = $this->owner->CanonicalURL;
		}
		if (!isset($link) && $siteConfig->CanonicalDomain != '') {
			// if a global CanonicalDomain is set
			$canonicalBase = trim($siteConfig->CanonicalDomain, '/');
			$link = $canonicalBase . $this->owner->Link();
		}
		if (!isset($link)) {
			// default just link
			$link = Director::protocolAndHost() . $this->owner->Link();
		}
		return $link;
	}
	function contentControllerInit($controller) {
		Requirements::insertHeadTags(sprintf(
			'<link rel="canonical" href="%s" />',
			$this->getorsetCanonicalURL()
		));
	}
}