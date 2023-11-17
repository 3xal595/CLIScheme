<?php
    namespace exl\schexe\src;


    class Functions {
        /**
         * Generates a stylized font pattern.
         *
         * @return string The generated font pattern.
         */
        public static function someFont() {
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

    /**
     * Basic interpreter for arithmetic expressions.
     *
     * @param string $code The arithmetic expression to interpret.
     * @return mixed The result of the arithmetic expression.
     * @throws \RuntimeException If the expression is empty.
     */
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
        $result = $this->calculation($tokens);

        return $result;
    }


     /**
     * Placeholder for future evaluation functionality.
     *
     * @param string $code The code to be evaluated.
     */
    public function evaluate(string $code) {
        // TODO: Implement evaluation functionality
    }


    /**
     * Performs arithmetic operations based on the provided tokens.
     *
     * @param array $tokens The array of tokens representing the expression.
     * @return float|int The result of the arithmetic expression.
     * @throws \RuntimeException If an invalid operator is encountered.
     */
    public function calculation($tokens) {
        print_r($tokens); // Display the contents of tokens

        $operator = array_shift($tokens);
        print_r($tokens); // Display the updated contents of tokens after shifting the operator

        $result = 0;

        // Iterate through the tokens and perform the arithmetic operation
        for ($i = 0; $i < count($tokens); $i++) {
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
                    if ($result == 0) {
                        $result = $tokens[$i];
                        break;
                    } else {
                        if ($tokens[$i] == 0) {
                            throw new \RuntimeException('Le diviseur est égal à zero ');
                        }
                        $result /= $tokens[$i];
                        break;
                    }
                default:
                    throw new \RuntimeException("Désolé, l'opérateur " . $operator . " n'est pas encore pris en compte");
            }
        }

        return $result;
    }
}
?>