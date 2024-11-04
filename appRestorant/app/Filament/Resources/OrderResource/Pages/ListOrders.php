<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {   
        return [
            Actions\CreateAction::make(), // Tombol New
            Actions\Action::make('cetak_laporan')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Pesanan')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }
    public static function cetakLaporan()
    {
        // Ambil data reservasi
        $data = DB::select('
            SELECT 
                customers.table_number,
                customers.name,
                menus.name AS menu_name,
                orders.quantity,
                menus.price,
                (orders.quantity * menus.price) AS total_price,
                orders.status
            FROM 
                orders
            JOIN 
                customers ON orders.customer_id = customers.customer_id
            JOIN 
                menus ON orders.menu_id = menus.menu_id LIMIT 100
        ');
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('Laporan.cetakpesanan', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan_pesanan.pdf');
    }
}
