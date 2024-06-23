<?php
class AddExpense{

    public function addExpense($type,$income){
    $incomes = file_get_contents('expense.txt');
    $incomes .= ",$type=$income";
    file_put_contents('expense.txt',$incomes);
    
    echo "Add expense successfully.\n";
    echo "------------------------- \n";
    }
}