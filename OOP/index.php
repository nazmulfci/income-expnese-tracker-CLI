<?php
require_once __DIR__ . '/Classes/AddIncome.php';
require_once __DIR__ . '/Classes/AddExpense.php';
require_once __DIR__ . '/Classes/ViewIncome.php';

class Cli_application
{
    public $arrs = [
        1 => 'Add income',
        2 => 'Add expense',
        3 => 'View incomes',
        4 => 'View expenses',
        5 => 'View savings',
        6 => 'View categories',
        7 => 'Exit',
    ];

    public $categories = [
        ['name' => 'Salary', 'type' => 'Income'],
        ['name' => 'Business', 'type' => 'Income'],
        ['name' => 'Loan', 'type' => 'Income'],
        ['name' => 'House Rent', 'type' => 'Expnese'],
        ['name' => 'Utility Bill', 'type' => 'Expnese'],
        ['name' => 'Yearly Zakat', 'type' => 'Expnese'],
        ['name' => 'Food Expenses', 'type' => 'Expnese'],
    ];
    public $choice = 0;

    public function run()
    {


        while (true) {
            foreach ($this->arrs as $key => $value) {
                echo $key . '.' . $value . "\n";
            }
            echo "------------------------- \n";
            $this->choice = intval(readline("Enter your option : "));




            if ($this->choice == 1) {
                $type = readline("Enter income category : ");
                $amount = intval(readline("Enter income amount : "));
                $in = new AddIncome();
                $in->addIncome($type, $amount);
            }
            

           else if ($this->choice == 2) {
                $type = readline("Enter expense category : ");
                $amount = intval(readline("Enter expense amount : "));
                $ex = new AddExpense();
                $ex->addExpense($type, $amount);
            }
            
            
            
             else if ($this->choice == 3) {
               $view = new ViewIncome();
               $view->viewIncome();
            } 
            
            else if ($this->choice == 4) {
                $getIncome = file_get_contents('expense.txt');
                $incomes = explode(',', $getIncome);
                $totalIncome = 0;
                foreach ($incomes as $key => $value) {
                    $ex = explode('=', $value);
                    if ($value) {
                        $totalIncome += $ex[1];
                    }
                }
                echo "Total expense is : $totalIncome \n";
                echo "------------------------- \n";
            } else if ($this->choice == 5) {
                $getIncome = file_get_contents('income.txt');
                $incomes = explode(',', $getIncome);
                $totalIncome = 0;
                foreach ($incomes as $key => $value) {
                    $ex = explode('=', $value);
                    if ($value) {
                        $totalIncome += $ex[1];
                    }
                }
                $getExpense = file_get_contents('expense.txt');
                $expenses = explode(',', $getExpense);
                $totalExpense = 0;
                foreach ($expenses as $key => $value) {
                    $ex = explode('=', $value);
                    if ($value) {
                        $totalExpense += $ex[1];
                    }
                }
                $total = $totalIncome - $totalExpense;
                echo "income : $totalIncome, expense : $totalExpense \n";
                echo "My savings =   $total \n";
                echo "------------------------- \n";
            } else if ($this->choice == 6) {
                foreach ($this->categories as $category) {
                    echo "Name: " . $category['name'] . ", Type: " . $category['type'] . "\n";
                }
                echo "------------------------- \n";
            } else if ($this->choice == 7) {
                break;
            }
        }
    }
}

$cli = new Cli_application();
$cli->run();
