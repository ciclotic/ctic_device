<?php
declare(strict_types=1);

namespace CTIC\Device\Device\Test\Application;

use CTIC\Device\Device\Application\CreateDevice;
use CTIC\Device\Device\Domain\Command\DeviceCommand;
use CTIC\Device\Device\Domain\Device;
use PHPUnit\Framework\TestCase;

final class CreateDeviceTest extends TestCase
{
    public function testCreateAssert()
    {
        $deviceCommandRyu = new DeviceCommand();
        $deviceCommandRyu->name = 'ryu';
        $deviceRyu = CreateDevice::create($deviceCommandRyu);

        $this->assertEquals(Device::class, get_class($deviceRyu));
    }
}