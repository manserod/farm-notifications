<?php
/**
 * Libreria responser
 *
 * @author Manuel
 * @since 30/10/2020
 * @version 1.0
 *
 */

namespace App\Http\Traits;


trait farmResponser
{
    /**
     * Responser para api
     *
     * @param string $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    private function response($data = "Success", $code = 200)
    {
        return response()->json(['data' => $data, 'code' => $code], 200);
    }

    /**
     * Responser para command
     *
     * @param $arrayData
     */
    private function responseConsole($arrayData){

        echo "\n\n -------- ENVIANDO NOTIFICACIÓN --------\n\n";

        foreach ($arrayData as $name => $data) {

            echo str_pad($name . ": ", 10);

            switch (true){
                case is_bool($data):
                    echo $data ? 'true' : 'false';
                    break;
                default:
                    echo $data;
                    break;
            }
            echo "\n";
        }

        echo "\n\n -------- NOTIFICACIÓN ENVIADA. GRACIAS. --------\n\n";
    }

}
