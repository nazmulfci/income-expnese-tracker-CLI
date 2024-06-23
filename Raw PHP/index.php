<?php
$arrs = [
    1=>'Add income',
    2=>'Add expense',
    3=>'View incomes',
    4=>'View expenses',
    5=>'View savings',
    6=>'View categories',
    7=>'Exit',
];

$categories = [
    ['name' => 'Salary', 'type' => 'Income'],
    ['name' => 'Business', 'type' => 'Income'],
    ['name' => 'Loan', 'type' => 'Income'],
    ['name' => 'House Rent', 'type' => 'Expnese'],
    ['name' => 'Utility Bill', 'type' => 'Expnese'],
    ['name' => 'Yearly Zakat', 'type' => 'Expnese'],
    ['name' => 'Food Expenses', 'type' => 'Expnese'],
];


while(true)
{
foreach($arrs as $key => $value){
echo $key.'.'. $value."\n";
}
echo "------------------------- \n";
$choice = intval(readline("Enter your option : "));

if($choice==1){
    $type = readline("Enter income category : ");
    $income = intval(readline("Enter income amount : "));
    $incomes = file_get_contents('income.txt');
    $incomes .= ",$type=$income";
    file_put_contents('income.txt',$incomes);
    
    echo "Add income successfully.\n";
    echo "------------------------- \n";
}
else if($choice==2){
    $type = readline("Enter expense category : ");
    $income = intval(readline("Enter expense amount : "));
    $incomes = file_get_contents('expense.txt');
    $incomes .= ",$type=$income";
    file_put_contents('expense.txt',$incomes);
    
    echo "Add expense successfully.\n";
    echo "------------------------- \n";
}
else if($choice==3){
    $getIncome = file_get_contents('income.txt');
    $incomes = explode(',',$getIncome);
    $totalIncome = 0;
    foreach($incomes as $key=>$value){
        $ex = explode('=',$value);
        if($value){
        $totalIncome += $ex[1];
        }
    }
    echo "Total Income is : $totalIncome \n";
    echo "------------------------- \n";
}
else if($choice==4){
    $getIncome = file_get_contents('expense.txt');
    $incomes = explode(',',$getIncome);
    $totalIncome = 0;
    foreach($incomes as $key=>$value){
        $ex = explode('=',$value);
        if($value){
        $totalIncome += $ex[1];
        }
    }
    echo "Total expense is : $totalIncome \n";
    echo "------------------------- \n";
}
else if($choice==5){
    $getIncome = file_get_contents('income.txt');
    $incomes = explode(',',$getIncome);
    $totalIncome = 0;
    foreach($incomes as $key=>$value){
        $ex = explode('=',$value);
        if($value){
        $totalIncome += $ex[1];
        }
    }
    $getExpense = file_get_contents('expense.txt');
    $expenses = explode(',',$getExpense);
    $totalExpense = 0;
    foreach($expenses as $key=>$value){
        $ex = explode('=',$value);
        if($value){
        $totalExpense += $ex[1];
        }
    }
    $total = $totalIncome-$totalExpense;
    echo "income : $totalIncome, expense : $totalExpense \n";
    echo "My savings =   $total \n";
    echo "------------------------- \n";
}
else if($choice==6){
    foreach ($categories as $category) {
        echo "Name: " . $category['name'] . ", Type: " . $category['type'] . "\n";
    }
    echo "------------------------- \n";
}
else if($choice==7){
    break;
}
}

