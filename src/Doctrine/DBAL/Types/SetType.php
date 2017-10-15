<?php

namespace Doctrine\DBAL\Types;


use InvalidArgumentException;
use Doctrine\DBAL\Platforms\AbstractPlatform;

abstract class SetType extends Type {

    /**
     * @return string[]
     */
    abstract protected function getValue();


    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        return empty($value) ? null : explode(',', $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {

        $allow = array_map(function ($type) {
            return '\'' . $type . '\'';
        }, $this->getValue());

        return 'SET ( ' . implode(', ', $allow) . ' )';
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform) {
        return true;
    }
}
