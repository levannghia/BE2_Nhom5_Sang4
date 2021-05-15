<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;

class CatalogController extends Controller
{
    public function getAllCatalog() {
        $catalogs = Catalog::all();
        return view('partial/header', ['catalogs' => $catalogs]);
    }
}
