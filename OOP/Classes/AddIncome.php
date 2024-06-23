<?php
class AddIncome{

    public function addIncome($type,$income){
    $incomes = file_get_contents('income.txt');
    $incomes .= ",$type=$income";
    file_put_contents('income.txt',$incomes);
    
    echo "Add income successfully.\n";
    echo "------------------------- \n";
    }
}