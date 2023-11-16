<?php
    function someFont($value = 1000) {
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

    function schemeInterp($code)
    {
        // Very basic interpreter for arithmetic expressions
        $code = trim($code);
        $tokens = preg_split('/\s+/', $code); 

        // Check if the expression is empty
        if (empty($tokens)) {
            throw new \RuntimeException('Empty expression.');
        }

        // Evaluate basic arithmetic expressions
        $result = evaluateArithmeticExpression($tokens);

        return $result;
    }

    function evaluateArithmeticExpression($tokens)
    {
        $operator = array_shift($tokens);

        // Check if the operator is valid
        if (!in_array($operator, ['+', '-', '*', '/'])) {
            throw new \RuntimeException('Invalid operator: ' . $operator);
        }

        // Check if there are enough operands
        if (count($tokens) < 2) {
            throw new \RuntimeException('Insufficient operands for ' . $operator);
        }

        $operand1 = array_shift($tokens);
        $operand2 = array_shift($tokens);

        // Perform the arithmetic operation
        switch ($operator) {
            case '+':
                return $operand1 + $operand2;
            case '-':
                return $operand1 - $operand2;
            case '*':
                return $operand1 * $operand2;
            case '/':
                if ($operand2 == 0) {
                    throw new \RuntimeException('Le diviseur est égal à zero ');
                }
                return $operand1 / $operand2;
            default:
                throw new \RuntimeException('Erreur inattendue, merci de le reporter à : Va te faire foutre.');
        }
    }
?>