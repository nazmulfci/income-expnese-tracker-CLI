<?php
class ViewExpense{
    public function viewExpense(){
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
    }
}