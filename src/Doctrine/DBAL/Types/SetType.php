<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <sommelier.jungle@gmail.com>
 * Date: 12.06.17
 * Time: 23:26
 */

namespace Doctrine\DBAL\Types;


use InvalidArgumentException;
use Doctrine\DBAL\Platforms\AbstractPlatform;

abstract class SetType extends Type {

    /**
     * @return string[]
     */
    protected abstract function getValue();


    public function convertToDatabaseValue($value, AbstractPlatform $platform) {

        if (empty($value)) {

            return $value;
        }

        foreach ($value as $item) {

            if (in_array($item, $this->getValue())) {

                continue;
            }

            throw new InvalidArgumentException('Invalid ' . $this->getName() . ' type.');
        }

        return implode(',', $value);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform) {
        return explode(',', $value);
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {

        $allow = array_map(function ($type) {
            return '\'' . $type . '\'';
        }, $this->getValue());

        return 'SET ( ' . implode(', ', $allow) . ' )';
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform) {
        return true;
    }
}
