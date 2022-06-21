<?php
class RequestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requestModel = $this->model("request");
    }

    public function addRequest($payload)
    {

        $data = [
            "msg" => "message!"
        ];



        $houseNumberPlayGround = $payload['houseNumberPlayGround'];
        if (isset($payload['annexPlayGround'])) {
            $houseNumberPlayGround .= $payload['annexPlayGround'];
        }

        $houseNumberGatherLocation = $payload['houseNumberGatherLocation'];
        if (isset($payload['annexGatherLocation'])) {
            $houseNumberGatherLocation .= $payload['annexGatherLocation'];
        }

        $provinceGatherLocation = $payload['provincePlayGround'];
        if (isset($payload['provinceGatherLocation'])) {
            $provinceGatherLocation = $payload['provinceGatherLocation'];
        }


        $this->requestModel->addPlayGroundRequest($payload['provincePlayGround'], $payload['cityPlayGround'], $payload['streetPlayGround'], $houseNumberPlayGround, $payload['postalCodePlayGround']);
        $this->requestModel->addGrimeLocationRequest($provinceGatherLocation, $payload['cityGatherLocation'], $payload['streetGatherLocation'], $houseNumberGatherLocation, $payload['postalCodeGatherLocation']);
        $this->requestModel->addBusinessAddressRequest($this->requestModel->getLoggedInUser());
        $this->requestModel->addBillingAddressRequest($this->requestModel->getLoggedInUser());
        $this->requestModel->addContactRequest($this->requestModel->getLoggedInUser());
        $this->requestModel->addRequest($payload['summary'], $payload['comments'], $payload['playDate'], $payload['playTime'], $payload['lotusCasualties']);

        $this->view("/addRequest", $data);
    }
}
