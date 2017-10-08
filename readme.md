# Doctrine Set Type

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
