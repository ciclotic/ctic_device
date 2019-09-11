<?php
namespace CTIC\Device\Device\Application;

use CTIC\App\Company\Domain\Company;
use CTIC\App\Base\Application\CreateInterface;
use CTIC\App\Base\Domain\Command\CommandInterface;
use CTIC\App\Base\Domain\EntityInterface;
use CTIC\Device\Device\Domain\Command\DeviceCommand;
use CTIC\Device\Device\Domain\Device;

class CreateDevice implements CreateInterface
{
    /**
     * @param CommandInterface|DeviceCommand $command
     * @return EntityInterface|Device
     */
    public static function create(CommandInterface $command): EntityInterface
    {
        $device = new Device();
        $device->setId($command->id);
        $device->name = (empty($command->name))? '' : $command->name;
        $device->enabled = (empty($command->enabled))? false : true;
        if (!empty($command->company) && get_class($command->company) == Company::class) {
            $device->setCompany($command->company);
        }

        return $device;
    }
}