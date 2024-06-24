<?php

spl_autoload_register(function($className){
    $dir = "Classes/";
    require_once $dir.$className.".php";
});

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
        ['name' => 'Rent', 'type' => 'Expnese'],
        ['name' => 'Utility', 'type' => 'Expnese'],
        ['name' => 'Zakat', 'type' => 'Expnese'],
        ['name' => 'Fooding', 'type' => 'Expnese'],
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
                top:
                $type = trim(readline("Enter income category : "));
                $status = 0;
                foreach ($this->categories as $category) {
                    
                    if($category['name']==$type && $category['type']=='Income'){
                        $status = 1;
                        //echo "Name: " . $category['name'] . ", Type: " . $category['type'] . "\n";
                        break;
                    }
                    
                    
                }
                if($status ==0){
                goto top;
                }

                $amount = intval(readline("Enter income amount : "));
                $in = new AddIncome();
                $in->addIncome($type, $amount);
            }
            

           else if ($this->choice == 2) {
            top1:
            $type = trim(readline("Enter expense category : "));
            $status = 0;
            foreach ($this->categories as $category) {
                
                //echo "Name: " . $category['name'] . ", Type: " . $type . "\n";

                if($category['name']==$type && $category['type']=='Expnese'){
                    $status = 1;
                    break;
                }
                
            }
            if($status ==0){
            goto top1;
            }
                $amount = intval(readline("Enter expense amount : "));
                $ex = new AddExpense();
                $ex->addExpense($type, $amount);
            }
            
            
            
             else if ($this->choice == 3) {
               $view = new ViewIncome();
               $view->viewIncome();
            } 
            
            else if ($this->choice == 4) {
                $view = new ViewExpense();
                $view->viewExpense();
            }
            
            else if ($this->choice == 5) {
                $view = new ViewSavings();
                $view->viewSavings();
            } 
            
            else if ($this->choice == 6) {
                foreach ($this->categories as $category) {
                    echo "Name: " . $category['name'] . ", Type: " . $category['type'] . "\n";
                }
                echo "------------------------- \n";
            } 
            
            else if ($this->choice == 7) {
                break;
            }
        }
    }
}

$cli = new Cli_application();
$cli->run();


// 1. condition 
// 2. autoload
