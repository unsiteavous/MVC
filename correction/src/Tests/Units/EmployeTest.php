<?php
require_once __DIR__ . '/../../autoload.php';

use PHPUnit\Framework\TestCase;
use src\Models\Employe;
use src\Repositories\EmployeRepository;

final class EmployeTest extends TestCase
{
  private $repo;
  
  public function test_Récupère_employé_par_son_id()
  {
    $this->repo = new EmployeRepository();

    $employe = $this->repo->getThisEmployesById(1);
    $this->assertNotNull($employe);
    $this->assertInstanceOf(Employe::class, $employe);
    $this->assertEquals(1, $employe->getId());
  }
}
