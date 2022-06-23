<?php
class RequestController extends Controller
{
    public function __construct()
    {
        $this->requestModel = $this->model("request");
        $this->registerMiddleware(new AuthMiddleware(["addRequest", "editRequest"]));
        $this->mailModel = $this->model("mail");
    }

    public function addRequest($payload)
    {
    
        $data = [];

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
        $result = $this->requestModel->addRequest($payload['summary'], $payload['comments'],$payload['playDate'],$payload['playTime'],$payload['endTime'],$payload['lotusCasualties']);
        $this->mailModel->addRequestEmail($payload['summary'], $payload['playDate'], $payload['cityPlayGround'], $payload['streetPlayGround'], $houseNumberPlayGround);

        if ($result) {
            $data = [
                "title" => "Opdracht succesvol ingediend!",
                "subtitle" => "Uw opdracht is succesvol geplaatst, u kunt dit scherm nu afsluiten.",
                "button" => "Terug naar de overzichtspagina",
                "route" => "/overzicht"
            ];
            $this->view("/addRequest", $data);
        } else {
            $data = [
                "title" => "Er is een fout opgetreden!",
                "subtitle" => "Er is iets misgegaan, probeer het anders opnieuw.",
                "button" => "Terug naar het formulier",
                "route" => "/opdrachten/aanvragen"
            ];
            $this->view("/addRequest", $data);
        }
    }

    public function editRequest($payload)
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

        $this->requestModel->editPlayGroundRequest($payload['playGroundId'], $payload['provincePlayGround'], $payload['cityPlayGround'], $payload['streetPlayGround'], $houseNumberPlayGround, $payload['postalCodePlayGround']);
        $this->requestModel->editGrimeLocationRequest($payload['grimeLocationId'], $provinceGatherLocation, $payload['cityGatherLocation'], $payload['streetGatherLocation'], $houseNumberGatherLocation, $payload['postalCodeGatherLocation']);
        // $this->requestModel->editBusinessAddressRequest($this->requestModel->getLoggedInUser());
        // $this->requestModel->editBillingAddressRequest($this->requestModel->getLoggedInUser());
        // $this->requestModel->editContactRequest($this->requestModel->getLoggedInUser());
        $this->requestModel->editRequest($payload['requestId'], $payload['summary'], $payload['comments'], $payload['playDate'], $payload['playTime'],$payload['endTime'], $payload['lotusCasualties']);

        $this->redirect("/overzicht");
    }
}
