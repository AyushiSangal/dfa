<?php

namespace App\Utilities\Jobs;


class CheckBitwiseNumber
{

    public static function run($number, $divisor)
    {
        $num = $number;
        $k   = $divisor;
        $bitwise = new CheckBitwiseNumber();
        $rem = $bitwise->isDivisible($num, $k);
        return $rem;
    }

    public function isDivisible(int $num, int $k)
    {

        $table[][] = 0;

        //create transition table
        $trans = $this->makeTransTable($k, $table);
        //fill the table
        $state = 0;    //initially control in 0 state
        $this->checkState($num, $state, $trans);
        return $state;    //final and initial state must be same
    }

    public function makeTransTable(int $n, $transTable)
    {
        $zeroTrans = 0;
        $oneTrans = 0;

        for ($state = 0; $state < $n; ++$state) {

            $zeroTrans = $state << 1; //next state for bit 0
            $transTable[$state][0] = ($zeroTrans < $n) ? $zeroTrans : $zeroTrans - $n;

            $oneTrans = ($state << 1) + 1;    //next state for bit 1
            $transTable[$state][1] = ($oneTrans < $n) ? $oneTrans : $oneTrans - $n;
        }
        return $transTable;
    }

    public function checkState(int $num, int &$state, $Table)
    {
        if ($num != 0) {
            $this->checkState($num >> 1, $state, $Table);
            $x = $num & 1;
            $state = $Table[$state][$x];
        }
    }
}
