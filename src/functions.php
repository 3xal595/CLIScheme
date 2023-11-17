<?php
    namespace exl\schexe\src;


    class Functions {
    public static function someFont($value = 1000) {
        $Graffiti='
                                  __________________________________________________________________________________________

                                  |                                                                                         |
                                  |      @@@                                                                                |
                                  |      @@@@@                                                                              |
                                  |      @  @@@                                                                             |
                                  |           @@                  _________      .__    ___________       ___________       |
                                  |          @@@                  /   _____/ ____ |  |__ \_   _____/__  ___\_   _____/      |
                                  |          @@@@                 \_____  \_/ ___\|  |  \ |    __)_\  \/  / |    __)_       |
                                  |         @@@@@                 /        \  \___|   Y  \|       \ >    <  |        \      |
                                  |        @@@  @@  @             /_______  /\___  >___|  /_______  /__/\_ \/_______  /     |
                                  |       @@@   @@@@@             \/     \/     \/        \/      \/        \/              |
                                  |      @@@@    @@@@                                                                       |
                                  |                                                                                         |
                                  ___________________________________________________________________________________________
      ';
      return $Graffiti;
    }

    public function schemeInterp($code)
    {
        // Very basic interpreter for arithmetic expressions
        $code = trim($code);
        $tokens = preg_split('/\s+/', $code); 

        // Check if the expression is empty
        if (empty($tokens)) {
            throw new \RuntimeException('Empty expression.');
        }

        // Evaluate basic arithmetic expressions
        $result = $this->evaluateArithmeticExpression($tokens);

        return $result;
    }

    public function evaluateArithmeticExpression($tokens)
    {
        //voir le contenus
        print_r($tokens);

        $operator = array_shift($tokens);

        //voir le contenus
        print_r($tokens);
        
        

        // Perform the arithmetic operation
        $result = 0 ;
        for($i = 0; $i < count($tokens); $i++) {
            switch ($operator) {
                case '+':
                    $result += $tokens[$i];
                    break;
                case '-':
                    $result -= $tokens[$i];
                    break;
                case '*':
                    $result *= $tokens[$i];
                    break;
                case '/':
                    if ($result == 0){
                        $result = $tokens[$i];
                        break;
                    }
                    else{
                        if ($tokens[$i] == 0) {
                            throw new \RuntimeException('Le diviseur est égal à zero ');
                        }
                        $result /= $tokens[$i];
                        break;
                    }
                default:
                    throw new \RuntimeException("Désolé, l'opérateur". $operator."n'est pas encore pris en compte");
            }
        }
        return $result;
    }
}
?>