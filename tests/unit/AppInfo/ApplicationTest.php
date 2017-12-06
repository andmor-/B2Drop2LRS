<?php
/**
 * LRSWITCHBOARDBRIDGE
 *
 * PHP Version 7
 *
 * @category  Nextcloud
 * @package   Lrswitchboardbridge
 * @author    EUDAT <b2drop-devel@postit.csc.fi>
 * @copyright 2015 EUDAT
 * @license   AGPL3 https://github.com/EUDAT-B2DROP/lrswitchboardbridge/blob/master/LICENSE
 * @link      https://github.com/EUDAT-B2DROP/lrswitchboardbridge.git
 */
namespace OCA\Lrswitchboardbridge\Tests\AppInfo;

use OCA\Lrswitchboardbridge\AppInfo\Application;
use OCA\Lrswitchboardbridge\Controller\PublishController;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase  {
    /** @var Application */
    protected $app;
    /** @var \OCP\AppFramework\IAppContainer */
    protected $container;

    protected function setUp() {
        parent::setUp();
        $this->app = new Application();
        $this->container = $this->app->getContainer();
    }

    public function testContainerAppName() {
        $this->app = new Application();
        $this->assertEquals('lrswitchboardbridge', $this->container->getAppName());
    }

    public function queryData() {
        return [
            ['PublishController', PublishController::class],
        ];

    }

    /**
     * @dataProvider queryData
     * @param string $service
     * @param string $expected
     */
    public function testContainerQuery($service, $expected = null) {
        if ($expected === null) {
            $expected = $service;
        }
        $this->assertTrue($this->container->query($service) instanceof $expected);
    }
}
