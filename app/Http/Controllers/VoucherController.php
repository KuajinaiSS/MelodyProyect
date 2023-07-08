<?php
namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Voucher;
use App\Models\DetailOrder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class VoucherController extends Controller{
    public function pdf(){
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $view_html = view('example_pdf');
        $dompdf->loadHtml($view_html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        // Output the generated PDF to Browser
        return $dompdf->stream();
    }

    public function downloadPDF($id)
    {

        // Obtener la información del PDF desde la base de datos
        $pdf = Voucher::findOrFail($id);

        // Obtener la ruta del archivo PDF
        $path = storage_path('app\public\pdfs\\' . $pdf->pdf_name);


        // Obtener el nombre original del archivo
        $filename = $pdf->pdf_name;

        // Obtener el tipo MIME del archivo PDF
        $mimeType = Storage::mimeType($path);
        // Devolver el archivo PDF como una descarga
        return response()->download($path, $filename, ['Content-Type' => $mimeType]);
    }

    public function generatePDF($id_detail)
    {
        $user = auth()->user();
        $detail = DetailOrder::findOrFail($id_detail);

        // Crear una instacia de Dompdf
        $domPDF = new Dompdf();

        $data = [
            'user' => $user,
            'detail_order' => $detail,
            'date' => date("d/m/Y"),
        ];


        $view_html = view('pdf', $data)->render();

        $domPDF->loadHtml($view_html);

        $domPDF->setPaper('A4', 'portrait');

        $domPDF->render();


        $filename =  $detail->reservation_number .'_comprobante.pdf';

        // Guardar el PDF en la carpeta public
        $path = 'pdfs\\' . $filename;
        Storage::disk('public')->put($path, $domPDF->output());

        $voucher = Voucher::create([
            'pdf_name' => $filename,
            'path' => $path,
            'detail_order_id' => $id_detail,
            'date' => date("Y-m-d")
        ]);


        return view('client.thanksMsg', [
            'detail_order' => $detail,
            'voucher' => $voucher
        ]);
    }
}
