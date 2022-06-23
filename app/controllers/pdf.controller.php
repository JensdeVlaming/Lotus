<?php

require '../vendor/autoload.php';

class PdfController extends Controller
{
    public function __construct()
    {
        $this->pdf = new FPDF();
        $this->memberModel = $this->model("member");
        
        $this->w = $this->pdf->GetPageWidth();
        $this->h = $this->pdf->GetPageHeight();
    }

    public function createInvoice($data) {

        $email = Application::$app->session->get("user");
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($email, $id);
        $assignedMembers = $this->memberModel->getAllAssignedMembersByRequestId($id);

        $result = Array(
            "details" => $result,
            "assignedMembers" => $assignedMembers
        );

        $requestId = $result["details"]["requestId"];
        $location = $result["details"]["pStreet"] . " " . $result["details"]["pHouseNumber"];
        $postalCode =  $result["details"]["pPostalCode"];
        $name = $result["details"]["companyName"];
        $playGround = $result["details"]["pCity"];
        $date = $result["details"]["date"];
        $time = $result["details"]["time"];
        print_r($result["details"]);
        $endTime = $result["details"]["endTime"];
        $contactPerson = $result["details"]["clientEmail"];
        $invoiceEmail = $result["details"]["clientEmail"];
        $phoneNumber = $result["details"]["phoneNumber"];
        $instructor = "......";
        $requestComments = $result["details"]["comments"];
        $requestCasualties = $result["details"]["casualties"];

        $members = $result["assignedMembers"];

        $this->pdf->SetMargins(5, 10, 5);
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);
        
        $this->pdf->Image("../public/src/img/logo.png", 10, 5, 20, 20);
        
        // $this->pdf->Cell(20, 40, 'Gegevens aanvraag', 0, 1);
        // $this->pdf->Line(0, 45, 210, 45);

        // // Bedrijf
        // $this->pdf->SetFont('Arial', 'B', 16);
        // $this->pdf->Cell($this->w, 10, "Bedrijf", 0, 1, 'C');
        // $this->pdf->SetFont('Arial', '', 12);

        // $this->pdf->Cell(50, 10, "Naam:", 1, 0);
        // $this->pdf->Cell(140, 10, $companyName, 1, 1);

        // $this->pdf->Cell(50, 10, "Contact Persoon:", 1, 0);
        // $this->pdf->Cell(140, 10, $companyContactPerson, 1, 1);

        // $this->pdf->Cell(50, 10, "Adres:", 1, 0);
        // $this->pdf->Cell(140, 10, $companyAddress, 1, 1);

        // $this->pdf->Cell(50, 10, "Contact telefoon:", 1, 0);
        // $this->pdf->Cell(140, 10, $companyPhoneNumber, 1, 1);

        // $this->pdf->Cell(50, 10, "Contact email:", 1, 0);
        // $this->pdf->Cell(140, 10, $companyEmail, 1, 0);

        // $this->pdf->ln(15);

        // // Aanvraag
        // $this->pdf->SetFont('Arial', 'B', 16);
        // $this->pdf->Cell($this->w, 10, "Aanvraag", 0, 1, 'C');
        // $this->pdf->SetFont('Arial', '', 12);

        // $this->pdf->Cell(50, 10, "Nummer:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestId, 1, 1);

        // $this->pdf->Cell(50, 10, "Betreft:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestDescription, 1, 1);

        // $this->pdf->Cell(50, 10, "Datum:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestDate, 1, 1);

        // $this->pdf->Cell(50, 10, "Tijd:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestTime, 1, 1);

        // $this->pdf->Cell(50, 10, "Bijzonderheden:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestComments, 1, 1);

        // $this->pdf->Cell(50, 10, "Aantal slachtoffers:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestCasualties, 1, 1);

        // $this->pdf->Cell(50, 10, "Adres Speel locatie:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestPlaylocation, 1, 1);

        // $this->pdf->Cell(50, 10, "Adres Grimeer locatie:", 1, 0);
        // $this->pdf->Cell(140, 10, $requestGrimelocation, 1, 0);

        $this->pdf->ln(15);

        // Coordinatie formulier
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell($this->w, 10, 'Coordinatie formulier', 0, 1, 'C');
        $this->pdf->SetFont('Arial', '', 12);

        $this->pdf->Cell(50, 10, "Nummer:", 0, 0);
        $this->pdf->Cell(140, 10, $requestId, 0, 1);

        $this->pdf->Cell(50, 10, "Locatie:", 0, 0);
        $this->pdf->Cell(140, 10, $location, 0, 1);

        $this->pdf->Cell(50, 10, "Postcode", 0, 0);
        $this->pdf->Cell(140, 10, $postalCode, 0, 1);

        $this->pdf->Cell(50, 10, "Naam:", 0, 0);
        $this->pdf->Cell(140, 10, $name, 0, 1);

        $this->pdf->Cell(50, 10, "Straat:", 0, 0);
        $this->pdf->Cell(140, 10, $playGround, 0, 1);

        $this->pdf->Cell(50, 10, "Datum:", 0, 0);
        $this->pdf->Cell(140, 10, $date, 0, 1);
        
        $this->pdf->Cell(50, 10, "Tijd:", 0, 0);
        $this->pdf->Cell(140, 10, $time .' - '. $endTime, 0, 1);

        $this->pdf->Cell(50, 10, "Contactpersoon:", 0, 0);
        $this->pdf->Cell(140, 10, $contactPerson, 0, 1);

        $this->pdf->Cell(50, 10, "Factuur email:", 0, 0);
        $this->pdf->Cell(140, 10, $invoiceEmail, 0, 1);

        $this->pdf->Cell(50, 10, "Telefoonnummer/mobiel:", 0, 0);
        $this->pdf->Cell(140, 10, $phoneNumber, 0, 1);

        $this->pdf->Cell(50, 10, "Kaderinstructeur:", 0, 0);
        $this->pdf->Cell(140, 10, $instructor, 0, 1);

        $this->pdf->Cell(50, 10, "Bijzonderheden:", 0, 0);
        $this->pdf->Cell(140, 10, $requestComments, 0, 1);

        $this->pdf->Cell(50, 10, "Aantal slachtoffers:", 0, 0);
        $this->pdf->Cell(140, 10, count($members) . " / " . $requestCasualties, 0, 1);

        $this->pdf->ln(15);

        // Lotus slachtoffers

        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->Cell(50, 10, "Naam Lotus:", 1, 0);
        $this->pdf->Cell(140, 10, "KM", 1, 1);
        $this->pdf->SetFont('Arial', '', 12);
        
        if (count($members) == 0) {
            $this->pdf->Cell(190, 10, "Geen leden", 1, 0);
        }
        foreach ($members as $key=>$member) {
            $lastNameInitial = $this->getInitials($member["firstName"], $member["lastName"])[1];
            $this->pdf->Cell(50, 10, $member["firstName"] . " " . $lastNameInitial . ".", 1, 0);

            if ($key % 1 != 0) {
                $this->pdf->Cell(140, 10, "......", 1, 0);
            } else {
                $this->pdf->Cell(140, 10, "......", 1, 1);
            }
        }

        $this->pdf->ln(15);

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell($this->w, 10, 'Dit formulier zo spoedig mogelijk retourneren/inzenden', 0, 1);
        $this->pdf->Cell($this->w, 10, 'Aan:', 0, 1);
        $this->pdf->Cell($this->w, 5, 'Manuela Smarius', 0, 1);
        $this->pdf->Cell($this->w, 5, 'Bachlan 778', 0, 1);
        $this->pdf->Cell($this->w, 5, '5011 BS Tilburg', 0, 1);

        $this->pdf->Cell($this->w-20, 5, 'Handtekening akkoord kaderinstructeur:', 0, 0, 'R');
        $this->pdf->ln(20);
        // $this->pdf->Line($this->w-90, 238, 195, 238);
        $this->pdf->Cell($this->w-57.5, 5, 'Naam in blokletters:', 0, 0, 'R');
        // $this->pdf->Line($this->w-50, 246, 195, 246);

        $this->pdf->Output("i", "Opdracht.pdf");
    }
}
