<?php
class ViewIncome{
    public function viewIncome()
    {
        $getIncome = file_get_contents('income.txt');
        $incomes = explode(',', $getIncome);
        $totalIncome = 0;
        foreach ($incomes as $key => $value) {
            $ex = explode('=', $value);
            if ($value) {
                $totalIncome += $ex[1];
            }
        }
        echo "Total Income is : $totalIncome \n";
        echo "------------------------- \n";
    }
}