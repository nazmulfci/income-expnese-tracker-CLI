<?php
class ViewSavings{
    public function viewSavings(){
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
    }
}