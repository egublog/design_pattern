<?php
interface Employee
{
  public function __construct(string $name, float $salary);
  public function getName(): string;
  public function setSalary(float $salary);
  public function getSalary(): float;
  public function getRoles(): array;
}

class Developer implements Employee
{
  protected $salary;
  protected $name;
  protected $roles;

  public function __construct(string $name, float $salary)
  {
    $this->name = $name;
    $this->salary = $salary;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setSalary(float $salary)
  {
    $this->salary = $salary;
  }

  public function getSalary(): float
  {
    return $this->salary;
  }

  public function getRoles(): array
  {
    return $this->roles;
  }
}

class Designer implements Employee
{
  protected $salary;
  protected $name;
  protected $roles;

  public function __construct(string $name, float $salary)
  {
    $this->name = $name;
    $this->salary = $salary;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setSalary(float $salary)
  {
    $this->salary = $salary;
  }

  public function getSalary(): float
  {
    return $this->salary;
  }

  public function getRoles(): array
  {
    return $this->roles;
  }
}

// 様々な種別の従業員で構成された組織を作る
class Organization
{
    protected $employees;

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries(): float
    {
        $netSalary = 0;

        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }

        return $netSalary;
    }
}

// 使用例

// 従業員を準備
$john = new Developer('John Doe', 12000);
$jane = new Designer('Jane Doe', 15000);

// 組織に追加
$organization = new Organization();
$organization->addEmployee($john);
$organization->addEmployee($jane);

echo "正味の給与: " . $organization->getNetSalaries(); // 正味の給与: 27000
