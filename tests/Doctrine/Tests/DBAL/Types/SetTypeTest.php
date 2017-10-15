<?php

namespace Doctrine\Test\DBAL\Types;


use PHPUnit\Framework\TestCase;
use Doctrine\DBAL\Types\SetType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SetTypeTest extends TestCase {

    /**
     * @return AbstractPlatform
     */
    public function getPlatform() {
        return $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    /**
     * @return SetType
     */
    public function getType() {

        $typeBuilder = $this->getMockBuilder(SetType::class);
        $typeBuilder = $typeBuilder->disableOriginalConstructor();
        $typeBuilder = $typeBuilder->setMethods(array('getValue', 'getName'));

        /** @var SetType $type */
        $type = $typeBuilder->getMock();

        return $type;
    }

    public function testConvertsToPHPValue() {

        $result = $this->getType()->convertToPHPValue('ONE,TWO', $this->getPlatform());

        $this->assertEquals(array('ONE', 'TWO'), $result);
    }

    public function testNullConvertsToPHPValue() {

        $result = $this->getType()->convertToPHPValue(null, $this->getPlatform());

        $this->assertEquals(null, $result);
    }
}
