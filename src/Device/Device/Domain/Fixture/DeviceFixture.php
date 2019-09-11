<?php
namespace CTIC\Device\Device\Domain\Fixture;

use CTIC\App\Company\Infrastructure\Repository\CompanyRepository;
use CTIC\App\Company\Domain\Company;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use CTIC\Device\Device\Application\CreateDevice;
use CTIC\Device\Device\Domain\Command\DeviceCommand;

class DeviceFixture extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        /** @var CompanyRepository $companyRepository
         */
        $companyRepository = $manager->getRepository(Company::class);
        $companyDefecto = $companyRepository->findOneByTaxName('Defecto');

        $deviceCommandGeneral = new DeviceCommand();
        $deviceCommandGeneral->name = 'General';
        $deviceCommandGeneral->enabled = true;
        $deviceCommandGeneral->company = $companyDefecto;
        $deviceGeneral = CreateDevice::create($deviceCommandGeneral);
        $manager->persist($deviceGeneral);

        $manager->flush();
    }
}