<?php

class Pdfhojavida extends FPDF
{

    public function Head($y)
    {
        //Margen
        $this->SetLineWidth(0.1);
        $this->SetFillColor(255);
        $x = 5;
        $y += 5;
        $w = 30;
        $h = 20;
        $this->Image('../public/img/logo.jpeg', $x, $y, $w, $h, 'jpeg', '');
        // $this->Cell(0,20,utf8_decode('REGISTRO DIARIO DE PACIENTES EN CONSULTA EXTERNA'),0,0,'C');

        // $this->SetTextColor(0,0,0);
        $y += 5;
        $this->setY($y);
        $this->setX(158);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(50, 10, 'FECHA IMPRESION: ' . date('Y-m-d'), 0, 0, 'L');
        // $this->Cell(50,10,'SIS-Demo-ECE',0,0,'L');
        $y += 5;
        $this->setY($y);
        $this->setX(5);
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 20, utf8_decode('HISTORIAL CLINICO DE LA MASCOTA'), 0, 0, 'C');
    }

    public function Top($y, $dataconsulta)
    {
        $x = 6;
        $this->setY($y);
        $this->setX($x);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 5, utf8_decode('Edad'), 1, 0, 'C');
        $this->ln(5);
        $this->setX($x);
        $this->SetFont('Arial', '', 7);
        $this->Cell(30, 5, $dataconsulta[0]->edad, 1, 0, 'C');

        $x = $this->GetY() + $x;
        $this->setY($y);
        $this->setX($x - 9);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, utf8_decode('Mascota'), 1, 0, 'C');
        $this->ln(5);
        $this->setX($x - 9);
        $this->SetFont('Arial', '', 7);
        $this->Cell(40, 5, utf8_decode($dataconsulta[0]->mascota), 1, 0, 'C');

        $x = $this->GetY() + $x;
        $this->setY($y);
        $this->setX($x - 8);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, utf8_decode('Especie'), 1, 0, 'C');
        $this->ln(5);
        $this->setX($x - 8);
        $this->SetFont('Arial', '', 7);
        $this->Cell(40, 5, utf8_decode($dataconsulta[0]->especie), 1, 0, 'C');

        $x = $this->GetY() + $x;
        $this->setY($y);
        $this->setX($x - 7);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 5, utf8_decode('Raza'), 1, 0, 'C');
        $this->ln(5);
        $this->setX($x - 7);
        $this->SetFont('Arial', '', 7);
        $this->Cell(30, 5, utf8_decode($dataconsulta[0]->raza), 1, 0, 'C');

        $x = $this->GetY() + $x;
        $this->setY($y);
        $this->setX($x - 16);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(60, 5, utf8_decode('Cliente'), 1, 0, 'C');
        $this->ln(5);
        $this->setX($x - 16);
        $this->SetFont('Arial', '', 7);
        $this->Cell(60, 5, utf8_decode($dataconsulta[0]->nombre_cliente), 1, 0, 'C');
    }
    
    public function Body($y, $dataservicio, $arrayServicios)
    {

        $x = 6;
        $this->setY($y);
        $this->setX($x);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(30, 6, utf8_decode('Registro de Consultas'), 0, 0, 'L');
        $this->ln();

        $y += 8;

        foreach ($dataservicio['consultas'] as $ll => $consulta) {

            $key = 0;
            $this->Ln(10);
            $this->setX($x);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(177, 6, utf8_decode('Fecha Consulta: ') . $consulta[$key]->fecha, 0, 0, 'C');
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(200, 6, utf8_decode('Peso: ') . $consulta[$key]->pesoMascota . ' KG', 0, 0, 'L');

            $y += 8;

            $this->Ln();
            $this->setX($x);
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(84, 6, utf8_decode('Servicio'), 1, 0, 'L');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(90, 6, utf8_decode('Observación'), 1, 0, 'L');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(30, 6, utf8_decode('Precio Sugerido'), 1, 0, 'L');

            $this->ln();
            $total = 0;
            $y += 6;
            foreach ($arrayServicios[$ll] as $kk => $servicio) {

                if ($consulta[$key]->id == $servicio->id) {

                    $this->Ln(0);
                    $this->setX($x);
                    $this->SetFont('Arial', '', 8);
                    $this->Cell(84, 6, utf8_decode($servicio->servicio), 1, 0, 'L');
                    $this->Cell(90, 6, utf8_decode($servicio->observacion), 1, 0, 'L');
                    $this->Cell(30, 6, '$' . utf8_decode($servicio->precio), 1, 0, 'L');
                    $this->ln();
                    $y += 6;
                }
                $total += $servicio->precio;
            }

            $this->Ln(1);
            $this->setX($x + 149);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(25, 6, utf8_decode('Total'), 1, 0, 'R');
            $this->Cell(30, 6, '$' . $total, 1, 0, 'L');

            $y += 8;
            $this->Ln(1);
            $this->setX($x);
        }
        $this->Ln(60);
        $this->setX($x + 90);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(25, 6, utf8_decode('Firma y sello'), 'T', 0, 'C');
    }
}
