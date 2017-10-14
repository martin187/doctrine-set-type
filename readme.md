# Doctrine Set Type

[![Travis CI](https://img.shields.io/travis/jungle-bay/doctrine-set-type.svg?style=flat)](https://travis-ci.org/jungle-bay/doctrine-set-type)
[![Scrutinizer CI](https://img.shields.io/scrutinizer/g/jungle-bay/doctrine-set-type.svg?style=flat)](https://scrutinizer-ci.com/g/jungle-bay/doctrine-set-type)
[![Codecov](https://img.shields.io/codecov/c/github/jungle-bay/doctrine-set-type.svg?style=flat)](https://codecov.io/gh/jungle-bay/doctrine-set-type)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/9f27fb41-a637-4fc7-a229-9096446b7dd6.svg?style=flat)](https://insight.sensiolabs.com/projects/9f27fb41-a637-4fc7-a229-9096446b7dd6)

```php
<?php

namespace Acme\Types;


use Doctrine\DBAL\Types\SetType;

class RolesType extends SetType {

    const ROLE_SUPER_USER = 'ROLE_SUPER_USER';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    const ROLE_USER = 'ROLE_USER';

    const ROLE_NONE = 'ROLE_NONE';


    protected function getValue() {
        return array(
            self::ROLE_SUPER_USER,
            self::ROLE_ADMIN,
            self::ROLE_USER,
            self::ROLE_NONE
        );
    }


    public function getName() {
        return 'roles_type';
    }
}
```

Do not forget to register the type!
