<?php
class ReserveController extends BaseController
{
    /**
     * - Get list of reserves
     */
    public function getReserves($id = "", $limit = "")
    {
        try {
            $reserveModel = new ReserveModel();

            if(empty($id)){
                if(!empty($limit)){
                    $arrReserves = $reserveModel->getReserves($limit);
                }else{
                    $arrReserves = $reserveModel->getReserves();
                }   
            }else{
                $arrReserves = $reserveModel->getReserve($id);
            }
                
            $responseData = json_encode($arrReserves);

        } catch (Error $e) {
            return json_encode(["message" => $e, "error" => true]);
        }

        return $responseData;
    }

    /**
     *  - Post - set one reserve to table
     */
    public function setReserves($data){
        try {
            $reserveModel = new ReserveModel();

            $arrReserves = $reserveModel->setReserves($data);
            $responseData = json_encode($arrReserves);

        }catch (Error $e) {
            return json_encode(["message" => $e, "error" => true]);
        }

        return $responseData;
    }

    /**
     * - PUT - change data reserve to table
     */
    public function putReserves($data, $id){

        try {
            $reserveModel = new ReserveModel();

            $arrReserves = $reserveModel->updateReserves($data, $id);
            $responseData = json_encode($arrReserves);

        }catch (Error $e) {
            return json_encode(["message" => $e, "error" => true]);
        }

        return $responseData;
    }

    /**
     * - DELETE - delete one reserve to table
     */
    public function deleteReserves($id){

        try {
            $reserveModel = new ReserveModel();
            $arrReserves = $reserveModel->deleteReserves($id);

            $responseData = json_encode($arrReserves);
        }catch (Error $e) {
            return json_encode(["message" => $e, "error" => true]);
        }

        return $responseData;
    }

    public function registerBudget($reserve, $data, $limit, $result){
        if($result->insert){
            if ($reserve["cantidad"] <= $limit){
                $budgetModel = new BudgetModel();
                $reserveModel = new ReserveModel();

                $lastReserve = $reserveModel->getLastReserveId();
                $data["id_reserva"] = $lastReserve[0]["id"];

                $arrBudget = $budgetModel->setBudgets($data);

                if($arrBudget["insert"]){
                    header("Location: ../php/presupuesto.php?usuario=" . $data["usuario"]);
                }
            } else {
                $response = json_encode("No debe sobrepasar el limite de capacidad del recurso");
                $currentLink = "../php/reservas.php?failed=" . $response;
                header('Location: '. $currentLink);
            }
        }else{
            $response = json_encode("Error: La reserva no ha sido creada. Revise la conexión con el servidor.");
            $currentLink = "../php/reservas.php?failed=" . $response;
            header('Location: '. $currentLink);
        }
    }

    public function getBudgets($usuario){
        try {
            $budgetModel = new BudgetModel();
            $arrBudget = $budgetModel->getBudgetByUser($usuario);
                
            $responseData = json_encode($arrBudget);

        } catch (Error $e) {
            return json_encode(["message" => $e, "error" => true]);
        }

        return $responseData;
    }
}