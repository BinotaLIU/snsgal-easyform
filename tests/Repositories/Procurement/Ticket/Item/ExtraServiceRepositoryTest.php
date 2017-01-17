<?php

use App\Eloquent\Procurement;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExtraServiceRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var \App\Repositories\Procurement\Ticket\Item\ExtraServiceRepository
     */
    protected $extraServiceRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->extraServiceRepository = app('App\Repositories\Procurement\Ticket\Item\ExtraServiceRepository');
    }

    /**
     * @return ProcurementTicket\Item\ExtraService
     */
    public function createExtraService(): Procurement\Item\ExtraService
    {
        return factory(ProcurementTicket\Item\ExtraService::class)->create();
    }

    public function testAddService()
    {
        $expected = 10;
        for ($i = 0; $i < $expected; $i++) {
            $this->extraServiceRepository->addService('日拍競標', 50, true);
        }

        $actual = ProcurementTicket\Item\ExtraService::all()->count();
        $this->assertEquals($expected, $actual);
    }

    public function testGetServices()
    {
         $service = $this->createExtraService();
         $expected = $service->name;

         $actual = $this->extraServiceRepository->getServices()[0]->name;

         $this->assertEquals($expected, $actual);
    }

    public function testUpdateService()
    {
        $expected = '代找';
        $service = $this->createExtraService();
        $this->extraServiceRepository->updateService($service->id, $expected, $service->price, $service->show);

        $actual = ProcurementTicket\Item\ExtraService::find($service->id)->name;

        $this->assertEquals($expected, $actual);
    }

    public function testRemoveService()
    {
        $expected = 10;
        $service = null;
        for ($i = 0; $i <= $expected; $i++) {
            $service = $this->createExtraService();
        }
        $this->extraServiceRepository->removeService($service->id);

        $actual = ProcurementTicket\Item\ExtraService::all()->count();
        $this->assertEquals($expected, $actual);
    }
}
