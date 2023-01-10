# WPML Packages Repository

This is an unofficial repository for [wpml.org](https://wpml.org) plugins which allows their plugins to be managed along with other dependencies (such as [wpackagist.org](https://wpackagist.org) WordPress plugins) using Composer.

This repository does not provide any WPML code and is not affiliated with WPML in any way. For it to work you must have a valid WPML subscription. It uses this [composer plugin](https://github.com/lucguerraz/wpml-installer) to dynamically inject your subscription info into the download link. Your subscription info will only be transmitted to WPML and will not be displayed in `composer.lock`

This repository is updated nightly to always have the latest versions. If you want older version this repository won't help you and you must define the packages ad-hoc.

## Usage

Add this repository to the `repositories` section of your `composer.json` file

```
{
  "type": "composer",
  "url": "https://lucguerraz.github.io/wpml-packages/"
}
```

This repository works in conjunction with [`lucguerraz/wpml-installer`](https://github.com/lucguerraz/wpml-installer) to dynamically inject your WPML user id and subscription key into the download link.


The packages in this repository are defined as the `wordpress-plugins` type and require [`composer/installers`](https://packagist.org/packages/composer/installers), so that you can install the plugins in the correct location.

## Acknowledgments

This repository was created to add support to installing WPML with composer v2. It was heavily inspired by [`pernod-ricard-brandcos/wpml-installer`](https://bitbucket.org/pernod-ricard-brandcos/wpml-installer) and [`enelogic/wpml-installer`](https://github.com/enelogic/wpml-installer).
