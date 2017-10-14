<?php

namespace Doctrine\Test\DBAL\Types;


use PHPUnit\Framework\TestCase;
use Doctrine\DBAL\Types\SetType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SetTypeTest extends TestCase {

    public function testType() {

        $platform = $this->getMockForAbstractClass(AbstractPlatform::class);

        $typeBuilder = $this->getMockBuilder(SetType::class);
        $typeBuilder = $typeBuilder->disableOriginalConstructor();
        $typeBuilder = $typeBuilder->setMethods(array('getValue', 'getName'));

        /** @var SetType $type */
        $type = $typeBuilder->getMock();

        /** @var AbstractPlatform $platform */
        $result = $type->convertToPHPValue('ONE,TWO', $platform);

        $this->assertEquals(array('ONE', 'TWO'), $result);
    }
}
