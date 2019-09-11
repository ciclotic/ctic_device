<?php
namespace CTIC\Device\Device\Infrastructure\Repository;

use CTIC\Device\Device\Domain\Device;
use CTIC\App\Base\Infrastructure\Repository\EntityRepository;

class DeviceRepository extends EntityRepository
{
    /**
     * @return Device[]
     */
    public function findAllOrderedByName(): array
    {
        $qb = $this->createQueryBuilder('r')
            ->orderBy('r.name', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @return Device
     *
     * @throws
     */
    public function findOneRandom(): Device
    {
        $qb = $this->createQueryBuilder('r')
            ->orderBy('r.name', 'ASC')
            ->getQuery();

        /** @var Device $device */
        $device = $qb->setMaxResults(1)->getOneOrNullResult();

        return $device;
    }
}