# silverstripe-canonical
Adds a simple rel=canonical tag to SilverStripe 3.x

## Requirements
SilverStripe 3.6.x < 4

## Installation
* Install the code with `composer require lerni/silverstripe-canonical`
* Run a `dev/build?flush` to update your project

## Config
You need to set the extensions in your config.

    Page:
      extensions:
        - CanonicalExtension
    SiteConfig:
      extensions:
        - CanonicalSiteConfigExtension

## Usage
This module adds a simple canonical tag to your pages to allow for the specification of the default domain or a specific tag per Page.
The canonical tag allows you to signal to search engines like Google which is the authoritative version of the page to help reduce duplicate content issues caused by non-www versions, pages with different protocols, etc.
