<p align="center">
    <a href="https://github.com/martin187/doctrine-set-type">
        <img height="128" src="logo.png" alt="Doctrine Logo">
    </a>
</p>

# Set Type for [Doctrine](http://www.doctrine-project.org/)

[//]: # ([![Travis CI]&#40;https://img.shields.io/travis/martin187/doctrine-set-type.svg?style=flat&#41;]&#40;https://travis-ci.org/jungle-bay/doctrine-set-type&#41;)
[//]: # ([![Scrutinizer CI]&#40;https://img.shields.io/scrutinizer/g/martin187/doctrine-set-type.svg?style=flat&#41;]&#40;https://scrutinizer-ci.com/g/martin187/doctrine-set-type&#41;)
[//]: # ([![Codecov]&#40;https://img.shields.io/codecov/c/github/martin187/doctrine-set-type.svg?style=flat&#41;]&#40;https://codecov.io/gh/martin187/doctrine-set-type&#41;)

### Install

The recommended way to install is through [Composer](https://getcomposer.org/doc/00-intro.md#introduction):

```bash
composer require martin187/doctrine-set-type
```

### The simplest example of use

```php
<?php

namespace Acme\Types;


use Doctrine\DBAL\Types\SetType;

class RolesType extends SetType {

    const NAME = 'roles_type';

    const ROLE_SUPER_USER_VALUE = 'ROLE_SUPER_USER';
    const ROLE_ADMIN_VALUE = 'ROLE_ADMIN';
    const ROLE_USER_VALUE = 'ROLE_USER';
    const ROLE_NONE_VALUE = 'ROLE_NONE';


    protected function getValue() {
        return array(
            self::ROLE_SUPER_USER_VALUE,
            self::ROLE_ADMIN_VALUE,
            self::ROLE_USER_VALUE,
            self::ROLE_NONE_VALUE
        );
    }


    public function getName() {
        return self::NAME;
    }
}
```

##### Example use entities

```php
<?php

namespace Acme\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 *
 * @ORM\Table(
 *     name = "users"
 * )
 */
class User {

    /**
     * @ORM\Column(
     *     type = "roles_type"
     * )
     */
    private $roles;
}
```

#### Warning

> Do not forget to register the [type](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/cookbook/custom-mapping-types.html)!
>
> ```php
> \Doctrine\DBAL\Types\TypeType::addType(RolesType::NAME, RolesType::class);
>
> /** @var \Doctrine\DBAL\Connection $conn */
> $conn->getDatabasePlatform()->registerDoctrineTypeMapping('roles', RolesType::NAME);
> ```

### License

This bundle is under the [MIT license](http://opensource.org/licenses/MIT). See the complete license in the file: [here](https://github.com/martin187/doctrine-set-type/blob/master/license.txt).
