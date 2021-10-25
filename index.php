<?php
class Context
{

    private $strategy; #Here we put our method in this variable

    public function __construct(Algorithm $strategy)
    {
        $this->strategy = $strategy; #Here substitute value in variable
    }

    public function setStrategy(Algorithm $strategy)
    {
        $this->strategy = $strategy; #Update var in real time
    }

    public function doSomeBuisnessLogic() : void #Just logic, algorithm
    {
        $result = $this->strategy->doAlg([1, 4, 2, 9, 11, 2, 4, 16, 99, 0, 5]);
        print_r($result);
    }

}

interface Algorithm
{
    public function doAlg(array $arr): array;
}

class Method1 implements Algorithm
{
    public function doAlg(array $arr): array
    {
        if(count($arr) <= 1)
        {
            return $arr;
        }
        $greater = $less = [];
        for($i = 1;$i < count($arr);$i++)
        {
            if($arr[$i] >= $arr[0])
            {
                $greater[] = $arr[$i];
            }
            else
            {
                $less[] = $arr[$i];
            }
            {
            }
        }
        return array_merge($this->doAlg($less), array($arr[0]), $this->doAlg($greater));
    }
}
class Method2 implements Algorithm
{
    public function doAlg(array $arr): array
    {

        for($i = 0;$i < count($arr);$i++)
        {
            for($j = 0;$j < count($arr)-1;$j++)
            {
                if($arr[$j] >= $arr[$j+1])
                {
                    $tmp = $arr[$j+1];
                    $arr[$j+1] = $arr[$j];
                    $arr[$j] = $tmp;

                }
            }

        }
        return $arr;
    }
}

$model = new Context(new Method2());
$model->doSomeBuisnessLogic();
