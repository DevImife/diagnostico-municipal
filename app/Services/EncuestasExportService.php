<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EncuestasExportService
{
    /* =====================================================
    |  EXPORTAR POR ID
    ===================================================== */
    public function exportar($id, $hora)
    {
        $survey = $this->obtenerDatos(
            \App\Models\Survey::where('id', $id)
        );

        return $this->crearExcel($survey, "Encuesta_{$hora}.xlsx");
    }

    /* =====================================================
    |  EXPORTAR POR MUNICIPIO
    ===================================================== */
    public function exportarPorMunicipio($idMunicipio, $hora)
    {
        $survey = $this->obtenerDatos(
            \App\Models\Survey::whereHas(
                'plantel.codigo_postal.municipio',
                fn ($q) => $q->where('id', $idMunicipio)
            )
        );

        return $this->crearExcel($survey, "Encuesta_Municipio_{$hora}.xlsx");
    }

    /* =====================================================
    |  OBTENER DATOS (LÓGICA UNIFICADA)
    ===================================================== */
    private function obtenerDatos($query)
    {
        return $query->with([
            'usuario',
            'plantel',
            'plantel.codigo_postal.municipio',
        ])
            ->get()
            ->map(function ($item) {

                return [
                    'PLANTEL' => $item->plantel->nombre_plantel,
                    'MUNICIPIO' => $item->plantel->codigo_postal->municipio->nombre_municipio,
                    'CODIGO POSTAL' => $item->plantel->codigo_postal->codigo_postal,
                    'LOCALIDAD' => $item->plantel->codigo_postal->localidad,
                    'EDAD PLANTEL' => $item->plantel->edad_plantel,
                    'MATRICULA' => $this->formatearMatricula($item->matricula),
                    'AMENAZAS' => $this->formatearRespuestas($item->amenazas),
                    'MEDIDAS' => $this->formatearRespuestas($item->medidas),
                    'DOCUMENTO' => $this->formatearRespuestas($item->documentoPropiedad),
                    'SERVICIOS' => $this->formatearRespuestas($item->servicioPlantel),
                    'SERVICIOS CANTIDAD' => $this->formatearRespuestas($item->servSanitarioCantidad),
                    'TIPO DESCARGA' => $this->formatearRespuestas($item->tipoDescarga),
                    'EDIFICIOS CANTIDAD' => $this->formatearRespuestas($item->edifEspaciosCantidad),
                    'EDIFICIOS ESTRUCTURA' => $this->formatearRespuestas($item->edifTipoEstructura),
                    'EDIFICIOS CONDICIONES' => $this->formatearRespuestas($item->edifCondiciones),
                    'OBRA EXTERIOR' => $this->formatearRespuestas($item->obraExteriorEstado),
                    'OBRA EXTERIOR COMPLEMENTOS' => $this->formatearRespuestas($item->obraExteriorComplementos),
                    'NECESIDADES MEJORA' => $this->formatearRespuestas($item->necesidadMejora),
                    'ESTRUCTURA MEJORA' => $this->formatearRespuestas($item->elemEstructuraMejora),
                    'EXTERIOR MEJORA' => $this->formatearRespuestas($item->elemExteriorMejora),
                    'ACCESIBILIDAD MEJORA' => $this->formatearRespuestas($item->accesibilidadMejora),
                    'ESPACIOS MEJORA' => $this->formatearRespuestas($item->espaciosMejora),
                    'DESCRIPCION MEJORA' => $this->formatearRespuestas($item->descripcionMejora),
                    'BIENES' => $this->formatearRespuestas($item->bienes),
                    'ENERGIA' => $this->formatearRespuestas($item->energiaElectrica),
                    'FOTOGRAFIAS' => $this->formatearRespuestas($item->fotografias),
                ];
            })
            ->toArray();
    }

    /* =====================================================
    |  FORMATEAR MATRICULA
    ===================================================== */
    private function formatearMatricula($rawMatricula)
    {
        if (! $rawMatricula) {
            return '';
        }

        // Quitar doble escape si existe
        if (is_string($rawMatricula) && str_starts_with($rawMatricula, '"[')) {
            $rawMatricula = stripcslashes($rawMatricula);
            $rawMatricula = trim($rawMatricula, '"');
        }

        $matriculaArray = json_decode($rawMatricula, true);

        if (! is_array($matriculaArray)) {
            return $rawMatricula;
        }

        return collect($matriculaArray)->map(function ($m) {

            return
                "Director: {$m['nombre_director']} {$m['apellidos_director']}\n".
                "Dirección: {$m['direccion_director']}\n".
                "Teléfono: {$m['telefono_director']}\n".
                "Celular: {$m['celular_director']}\n".
                "Correo: {$m['correo_director']}\n".
                "Alumnos: {$m['alumnos']}\n".
                "Alumnas: {$m['alumnas']}\n".
                "Administrativos: {$m['administrativos']}\n".
                "Total Matrícula: {$m['total_matricula']}\n".
                "Total Personal: {$m['total_personal']}";
        })->implode("\n\n-------------------------\n\n");
    }

    /* =====================================================
    |  FORMATEAR RESPUESTAS
    ===================================================== */
    // private function formatearRespuestas($raw)
    // {
    //     if (! $raw) {
    //         return '';
    //     }

    //     if (is_string($raw) && str_starts_with($raw, '"{')) {
    //         $raw = stripcslashes($raw);
    //         $raw = trim($raw, '"');
    //     }

    //     $array = json_decode($raw, true);

    //     if (! is_array($array)) {
    //         return $raw;
    //     }

    //     return collect($array)
    //         ->map(fn ($valor, $clave) => strtoupper($clave).': '.implode(', ', $valor)
    //         )
    //         ->implode("\n");
    // }

    private function formatearRespuestas($raw)
    {
        if (! $raw) {
            return '';
        }

        if (is_string($raw) && str_starts_with($raw, '"{')) {
            $raw = stripcslashes($raw);
            $raw = trim($raw, '"');
        }

        $array = is_array($raw) ? $raw : json_decode($raw, true);

        if (! is_array($array)) {
            return $raw;
        }

        return $this->arrayToText($array);
    }

    private function arrayToText($array, $indent = 0)
    {
        $texto = '';

        foreach ($array as $clave => $valor) {

            $espacios = str_repeat('   ', $indent);

            if (is_array($valor)) {
                $texto .= "{$espacios}".strtoupper($clave).":\n";
                $texto .= $this->arrayToText($valor, $indent + 1);
            } else {
                $texto .= "{$espacios}".strtoupper($clave).": {$valor}\n";
            }
        }

        return $texto."\n";
    }

    /* =====================================================
    |  CREAR EXCEL
    ===================================================== */
    private function crearExcel($survey, $filename)
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        /* =========================
        | LOGO
        ========================= */
        $logo = new Drawing;
        $logo->setPath(public_path('images/vino.png'));
        $logo->setHeight(60);
        $logo->setCoordinates('A1');
        $logo->setWorksheet($sheet);

        /* =========================
        | ENCABEZADOS
        ========================= */
        $headers = [
            'PLANTEL',
            'MUNICIPIO',
            'CODIGO POSTAL',
            'LOCALIDAD',
            'EDAD PLANTEL',
            'MATRICULA',
            'AMENAZAS',
            'MEDIDAS',
            'DOCUMENTO',
            'SERVICIOS',
            'SERVICIOS CANTIDAD',
            'TIPO DESCARGA',
            'EDIFICIOS CANTIDAD',
            'EDIFICIOS ESTRUCTURA',
            'EDIFICIOS CONDICIONES',
            'OBRA EXTERIOR',
            'OBRA EXTERIOR COMPLEMENTOS',
            'NECESIDADES MEJORA',
            'ESTRUCTURA MEJORA',
            'EXTERIOR MEJORA',
            'ACCESIBILIDAD MEJORA',
            'ESPACIOS MEJORA',
            'DESCRIPCION MEJORA',
            'BIENES',
            'ENERGIA',
            'FOTOGRAFIAS',
        ];

        $startRow = 7;
        $col = 'A';

        foreach ($headers as $header) {
            $sheet->setCellValue($col.$startRow, $header);
            $col++;
        }

        $sheet->getStyle("A{$startRow}:Z{$startRow}")
            ->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '9F2241'],
                ],
            ]);

        /* =========================
        | DATOS
        ========================= */
        $row = $startRow + 1;

        foreach ($survey as $data) {
            $sheet->fromArray(array_values($data), null, 'A'.$row);
            $row++;
        }

        /* =========================
        | FORMATO COLUMNAS
        ========================= */
        $sheet->getColumnDimension('F')->setWidth(60);
        $sheet->getColumnDimension('G')->setWidth(60);
        $sheet->getColumnDimension('H')->setWidth(60);
        $sheet->getColumnDimension('I')->setWidth(60);
        $sheet->getColumnDimension('J')->setWidth(60);
        $sheet->getColumnDimension('K')->setWidth(60);
        $sheet->getColumnDimension('L')->setWidth(60);
        $sheet->getColumnDimension('M')->setWidth(60);
        $sheet->getColumnDimension('N')->setWidth(60);
        $sheet->getColumnDimension('O')->setWidth(60);
        $sheet->getColumnDimension('P')->setWidth(60);
        $sheet->getColumnDimension('Q')->setWidth(60);
        $sheet->getColumnDimension('R')->setWidth(60);
        $sheet->getColumnDimension('S')->setWidth(60);
        $sheet->getColumnDimension('T')->setWidth(60);
        $sheet->getColumnDimension('U')->setWidth(60);
        $sheet->getColumnDimension('V')->setWidth(60);
        $sheet->getColumnDimension('W')->setWidth(60);
        $sheet->getColumnDimension('X')->setWidth(60);
        $sheet->getColumnDimension('Y')->setWidth(60);
        $sheet->getColumnDimension('Z')->setWidth(60);
        $sheet->getStyle('F:Z')->getAlignment()->setWrapText(true);

        /* =========================
        | DESCARGA
        ========================= */
        $writer = new Xlsx($spreadsheet);
        $tempFile = tempnam(sys_get_temp_dir(), 'xlsx_');
        $writer->save($tempFile);

        return response()
            ->download($tempFile, $filename)
            ->deleteFileAfterSend(true);
    }
}
