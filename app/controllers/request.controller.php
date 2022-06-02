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
        if ($payload['annexPlayGround']) {
            $houseNumberPlayGround .= $payload['annexPlayGround'];
        }

        $houseNumberGatherLocation = $payload['houseNumberGatherLocation'];
        if ($payload['annexGatherLocation']) {
            $houseNumberGatherLocation .= $payload['annexGatherLocation'];
        }

        $houseNumberBusinessAddress = $payload['houseNumberBusinessAddress'];
        if ($payload['annexBusinessAddress']) {
            $houseNumberBusinessAddress .= $payload['annexBusinessAddress'];
        }

        $houseNumberBillingAddress = $payload['houseNumberBillingAddress'];
        if ($payload['annexBillingAddress']) {
            $houseNumberBillingAddress .= $payload['annexBillingAddress'];
        }


        $provinceGatherLocation = $payload['provincePlayGround'];
        if ($payload['provinceGatherLocation']) {
            $provinceGatherLocation = $payload['provinceGatherLocation'];
        }

        $provinceBillingAddress = $payload['provinceBusinessAddress'];
        if ($payload['provinceBillingAddress'] = 0) {
            $provinceGatherLocation = $payload['provinceBillingAddress'];
        }


        $this->requestModel->addPlayGroundRequest($payload['provincePlayGround'], $payload['cityPlayGround'], $payload['streetPlayGround'], $houseNumberPlayGround, $payload['postalCodePlayGround']);
        $this->requestModel->addGrimeLocationRequest($provinceGatherLocation, $payload['cityGatherLocation'], $payload['streetGatherLocation'], $houseNumberGatherLocation, $payload['postalCodeGatherLocation']);
        $this->requestModel->addBusinessAddressRequest($payload['requestName'], $payload['provinceBusinessAddress'], $payload['cityBusinessAddress'], $payload['streetBusinessAddress'], $houseNumberBusinessAddress, $payload['postalCodeBusinessAddress']);
        $this->requestModel->addBillingAddressRequest($provinceBillingAddress, $payload['cityBillingAddress'], $payload['streetBillingAddress'], $houseNumberBillingAddress, $payload['postalCodeBillingAddress']);
        $this->requestModel->addContactRequest($payload['clientFirstName'], $payload['clientLastName'], $payload['clientEmail'], $payload['clientPhoneNumber']);
        $this->requestModel->addRequest($payload['summary'], $payload['comments'], $payload['playDate'], $payload['playTime'], $payload['lotusCasualties']);

        $this->view("/addRequest", $data);
    }
}
