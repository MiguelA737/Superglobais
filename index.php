<!DOCTYPE HTML>
<html>
    <head>
        <title>Superglobais</title>
    </head>
    <body>

        <?php

            //Este programa exibe o conteúdo de todas as variáveis superglobais do PHP.

            //Chamando $_SERVER para exibi-la entre os elementos de $GLOBALS.
            $_SERVER;

            //*RECOMENDAÇÃO*: Insira alguns dados na URL para que estes possam ser exibidos junto à variável $_GET :)

            //Layout básico
            echo "<h2>Superglobais</h2>";
            echo "<br><br>";

            //Criação de tabela e chamada para a função writeContent
            echo "<table>";
            writeContent($GLOBALS);
            echo "</table>";

            echo "<p>(C)opyright 2020, Miguel Aguena (Miih737)<p>";

            //Essa função realiza um looping para escrever os elementos presentes em um array associativo.
            function writeContent($array) {

                //Looping que realizará o acesso ao conteúdo de $GLOBALS (variável que contém todas as globais disponíveis).
                foreach ($array as $key => $value) {
                    
                    //Exibir conteúdo
                    echo "  <tr>";
                    
                    //Esse if evita que GLOBALS seja impressa infinitamente, o que causaria um looping infinito.
                    if($key != "GLOBALS") {
                     
                        echo "      <td style='border: solid black 1px'>" . $key . "</td>";

                        //Esse if verifica se o valor da iteração é um array. Se for, a função chama a ela mesma para imprimi-lo.
                        if(is_array($value)) {

                            echo "      <td><table>";

                            //Auto-chamada para a impressão do array.
                            writeContent($value);
                            echo "      </table></td>";

                        }

                        //Caso o valor não seja um array, o mesmo é tratado como se fosse uma string e é impresso desse jeito.
                        else {
                            echo "      <td style='border: solid black 1px'>" . $value . "</td>";
                        }

                    }

                    echo "  </tr>";

                }                

            }

        ?>

    </body>
</html>