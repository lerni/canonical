<?php

class CanonicalSiteConfigExtension extends DataExtension {
	private static $db = array(
		'CanonicalDomain' => 'Varchar(255)'
	);
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Main', LiteralField::create('Info', "<p>" . _t("Canonical.DomainInfo","The canonical domain will be added to the HTML head of your pages. It should be specified with the full protocol.") . "</p>"));
		$fields->addFieldToTab('Root.Main', TextField::create('CanonicalDomain')->setAttribute('placeholder', _t("Canonical.DomainExample", "https://domain.tld")));
		return $fields;
	}
}