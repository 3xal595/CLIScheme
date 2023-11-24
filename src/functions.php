<?php

namespace exl\schexe\src;

class Functions {

    /**
     * Génère un motif de police stylisé.
     *
     * @return string Le motif de police généré.
     */
    public static function someFont() {
        $Graffiti = '
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
     * Interpréteur de base pour les expressions arithmétiques.
     *
     * @param string $code L'expression arithmétique à interpréter.
     * @return mixed Le résultat de l'expression arithmétique.
     * @throws \RuntimeException Si l'expression est vide.
     */
    public function interpreter($code)
    {
        // Supprime les espaces inutiles autour de l'expression
        $code = trim($code);

        // Ajoute un espace avant chaque parenthèse ouvrante et après chaque parenthèse fermante
        $code = preg_replace('/\(/', '( ', $code);
        $code = preg_replace('/\)/', ' )', $code);

        // Convertit la chaîne en tableau en supprimant les espaces autour de chaque élément
        $tokens = array_map('trim', preg_split('/\s+/', $code));

        // Supprime les espaces vides du tableau
        $tokens = array_filter($tokens);

        // Vérifie si l'expression est vide
        if (empty($tokens)) {
            throw new \RuntimeException('Expression vide.');
        }

        // Valide que le code ressemble à la syntaxe Scheme
        if (!$this->isScheme($tokens)) {
            throw new \RuntimeException('Code Scheme invalide.');
        }

        // Évalue les expressions arithmétiques de base
        $tokens = $this->removeFirstAndLastParentheses($tokens);
        $result = $this->calculation($tokens);

        return $result;
    }

    /**
     * Évalue les expressions arithmétiques de base.
     *
     * @param array $tokens Les jetons de l'expression arithmétique.
     * @return mixed Le résultat de l'expression arithmétique.
     */
    public function calculation($tokens) {
        // Initialise le résultat à 0
        $result = 0;
        print_r($tokens);
    
        // Continue tant que le tableau de jetons n'est pas vide
        foreach($tokens as $token) {
                
            // Si le jeton est une parenthèse ouvrante, évalue récursivement l'expression imbriquée
            if ($token == '(') {
                $tokens = $this->removeFirstAndLastParentheses($tokens);
                $result = $this->calculation($tokens);
            } else {

                // Convertit le jeton en minuscules pour éviter les erreurs de casse
                $token = strtolower($token);
    
                // Si le jeton est un nombre, effectue l'opération arithmétique
                if ($token == '+' ||$token == '-' ||$token == '*' ||$token == '/' ||$token == 'modulo' ) {
                        // Si le jeton est un opérateur, défini l'opérateur
                        $operator = $token;
                        print_r($operator);
                }
                else
                {
                    // Vérifie si un opérateur a été défini précédemment
                    if (isset($operator)) {
                        // Effectue l'opération arithmétique en fonction de l'opérateur
                        switch ($operator) {
                            case '+':
                                $result += $token;
                                break;
                            case '-':
                                $result -= $token;
                                break;
                            case '*':
                                $result *= $token;
                                break;
                            case '/':
                                if ($result == 0) {
                                    $result = $token;
                                } else {
                                    if ($token == 0) {
                                        throw new \RuntimeException('Le diviseur est égal à zéro');
                                    }
                                    $result /= $token;
                                }
                                break;
                            case 'modulo':
                                if ($result == 0) {
                                    $result = $token;
                                } else {
                                    $result %= $token;
                                }
                                break;
                            default:
                                throw new \RuntimeException("Désolé, l'opérateur " . $operator . " n'est pas encore pris en compte");
                        }
                    } else {
                        // Si aucun opérateur n'a été défini
                        throw new \RuntimeException("Désolé, l'opérateur n'est pas défini");
                    }
                }
            }   
        }
        return $result;
    }
    

    /**
     * Ajoute ou supprime les espaces avant de transformer la chaîne en tableau.
     *
     * @param string $code La chaîne à ajuster.
     * @return string La chaîne ajustée.
     */
    public function adjustSpaces($code)
    {
        // Ajoute un espace après chaque parenthèse ouvrante
        $code = preg_replace('/\(/', '( ', $code);

        // Ajoute un espace avant chaque parenthèse fermante
        $code = preg_replace('/\)/', ' )', $code);

        return $code;
    }

    /**
     * Valide si le code fourni a des parenthèses équilibrées.
     *
     * @param array $code Le code Scheme à valider.
     * @return bool True si les parenthèses sont équilibrées, false sinon.
     */
    private function isScheme($code) {
        // Initialise le compteur de parenthèses à 0
        $parenthesesCount = 0;

        // Parcourt tous les jetons du code
       

 foreach ($code as $token) {
            // Supprime les espaces autour du jeton
            $token = trim($token);

            // Met à jour le compteur de parenthèses en fonction du jeton
            $parenthesesCount += substr_count($token, '(');
            $parenthesesCount -= substr_count($token, ')');

            // Si le compteur devient négatif, il y a une parenthèse fermante sans ouverture correspondante
            if ($parenthesesCount < 0) {
                return false;
            }
        }

        // Si le compteur final est différent de zéro, il y a des parenthèses ouvertes non fermées
        return $parenthesesCount == 0;
    }

    /**
     * Supprime la première et la dernière parenthèse d'un tableau.
     *
     * @param array $inputArray Le tableau d'entrée.
     * @return array Le tableau modifié.
     */
    public function removeFirstAndLastParentheses($inputArray) {
        // Initialise une pile pour suivre les parenthèses
        $stack = [];

        // Parcourt chaque caractère du tableau d'entrée
        foreach ($inputArray as $char) {
            // Si le caractère est une parenthèse ouvrante, l'ajoute à la pile
            if ($char === '(') {
                array_push($stack, $char);
            } 
            // Si le caractère est une parenthèse fermante
            elseif ($char === ')') {
                // Si la pile n'est pas vide, dépile la parenthèse ouvrante correspondante
                if (!empty($stack)) {
                    array_pop($stack);
                }
            }
        }

        // Si la pile est vide, cela signifie que les parenthèses sont équilibrées
        if (empty($stack)) {
            // Supprime la première et la dernière parenthèse du tableau
            array_shift($inputArray);
            array_pop($inputArray);
        }

        // Retourne le tableau modifié
        return $inputArray;
    }
}
?>