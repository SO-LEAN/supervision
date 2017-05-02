# PHPPRO Supervision (and Symfony 2 Bundle)

This repository contains the PHP Supervision and Symfony 2 Supervision Bundle that allows you to add supervision feature to your application.

## Usage

### Symfony 2 integration (Supervision Bundle)

This version of the bundle requires Symfony 2.7+.

## Installation

Installation is a quick 3 step process:

1. Download phppro/supervision using composer
2. Enable the Bundle
3. Configure the SupervisionBundle

### Step 1: Download phppro/supervision using composer

Add phppro/supervision dependency to your composer.json :

```json
# composer.json
{
    "require": {
        "phppro/supervision": "1.*"
    },

    ...
}
```

Then update:

``` bash
$ php composer.phar update phppro/supervision
```

Composer will install the bundle to your project's `vendor/phppro/supervision` directory and additional required
packages.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Phppro\Supervision\SupervisionBundle(),
    );
}
```

### Step 3: Configure the routing

``` yaml
# app/routing.yml
supervision:
    resource: "@SupervisionBundle/Controller/"
    type:     annotation
```

### Step 4: Configure the SupervisionBundle

``` yaml
# app/config/config.yml
supervision:
    providers:
        - {name: "symfony", provider: "Phppro\\Supervision\\Service\\SymfonyDataProvider"}
```

### Next Steps

Contact the phppro dev team for further information.
