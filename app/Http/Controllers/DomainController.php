<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DomainController extends Controller
{
    public function checkDomain(Request $request)
    {
        $domain = $request->input('domain');
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://portal.qwords.com/apitest/whois.php', [
                'query' => ['domain' => $domain],
            ]);
            $body = json_decode($response->getBody(), true);
            if (isset($body['status'])) {
                if ($body['status'] === 'available') {
                    $available = true;
                    $message = 'Selamat! Domain ' . $domain . ' tersedia.';
                } else {
                    $available = false;
                    $message = 'Maaf, domain ' . $domain . ' tidak tersedia.';
                }
            } else {
                $available = false;
                $message = 'Status tidak ditemukan dalam respons.';
            }
        } catch (\Exception $e) {
            $available = false;
            $message = 'Terjadi kesalahan saat mengecek domain: ' . $e->getMessage();
        }
        return view('homepage', [
            'domain' => $domain,
            'available' => $available,
            'message' => $message,
        ]);
    }
}
