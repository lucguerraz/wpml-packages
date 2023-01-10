#!/usr/bin/env php
<?php

$wpml_json = @file_get_contents("https://d2salfytceyqoe.cloudfront.net/wpml33-products.json");

if ($wpml_json === null) {
  exit(1);
}

$data = json_decode($wpml_json);

if ($data === null || json_last_error() !== JSON_ERROR_NONE || !isset($data->downloads->plugins)) {
  exit(1);
}

$packages_json = new stdClass();
$packages_json->packages = new stdClass();

foreach ($data->downloads->plugins as $slug => $details) {

  $slug = "wpml/" . $slug;
  $version = $details->version;

  $packages_json->packages->$slug = new stdClass();
  $packages_json->packages->$slug->$version = new stdClass();

  $packages_json->packages->$slug->$version->name = $slug;

  $packages_json->packages->$slug->$version->description = $details->name;
  $packages_json->packages->$slug->$version->version = $version;
  $packages_json->packages->$slug->$version->type = "wordpress-plugin";
  $packages_json->packages->$slug->$version->license = "proprietary";

  $packages_json->packages->$slug->$version->support = (object) [
    "docs" => "https://wpml.org/documentation/wpml-core-and-add-on-plugins/",
    "forum" => "https://wpml.org/forums/forum/english-support/"
  ];

  $packages_json->packages->$slug->$version->homepage = "https://wpml.org/";
  $packages_json->packages->$slug->$version->keywords = "wpml, multilingual, content";

  $packages_json->packages->$slug->$version->dist = (object) [
    "type" => "zip",
    "url" => $details->url
  ];

  $packages_json->packages->$slug->$version->require = (object) [
    "lucguerraz/wpml-installer" => "^0.1",
    "composer/installers" => "~1.0"
  ];

}

if (file_put_contents('new_packages.json', json_encode($packages_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) === false) {
  exit(1);
}
