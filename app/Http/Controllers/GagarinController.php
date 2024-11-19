<?php

namespace App\Http\Controllers;

use App\Models\GagarinFlight;
use Illuminate\Http\Request;

class GagarinController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): array
    {
        return [
            'data' => GagarinFlight::query()->get()->map->data
        ];
    }
}
