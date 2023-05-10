<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $data = DB::select(" SELECT * FROM tbl_personas ");
        return view("welcome")->with('data', $data);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert(
                "INSERT INTO tbl_personas (nombres, apellidos, email) VALUES (?, ?, ?)",
                [
                    $request->name,
                    $request->lastname,
                    $request->email
                ]
            );
        } catch (Throwable $th) {
            $sql = false;
        }

        return ($sql) ? back()->with("exito", "Persona registrada correctamente") : back()->with('error', 'Error al registrar');
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update(
                "UPDATE tbl_personas SET nombres = ?, apellidos = ?, email = ? WHERE idpersona = ?",
                [
                    $request->name,
                    $request->lastname,
                    $request->email,
                    $request->idperson
                ]
            );
        } catch (Throwable $th) {
            $sql = false;
        }

        return ($sql) ? back()->with("exito", "Persona actualizada correctamente") : back()->with('error', 'Error al actualizar');
    }

    public function delete($id)
    {
        try {
            $sql = DB::delete("DELETE FROM tbl_personas WHERE idpersona = $id");
        } catch (Throwable $th) {
            $sql = false;
        }

        return ($sql) ? back()->with("exito", "Registro eliminado correctamente") : back()->with('error', 'Error al eliminar');
    }
}
