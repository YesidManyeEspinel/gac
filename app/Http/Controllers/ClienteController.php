<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\PdfRequest;
use UxWeb\SweetAlert\SweetAlert;

//models
use App\Cliente;
use App\Credito;
use App\Tipoarchivo;
use App\Tipocredito;
use App\Archivo;

class ClienteController extends Controller
{
	public function searchClient (Request $request) {

		$documento = $this->confirmDocument($request->tipo,$request->documento);

        $query = Cliente::select('id')->where('documento','=',$documento)->first();

        if ($query) {
            return redirect()->route('cliente.show',$query->id);
        }else{
        	alert()->warning('El cliente '.$documento.' no esta registrado','¡ADVERTENCIA!')->autoclose(5000);
    		return redirect()->route('home');
    	}
	}

	public function showClient ($id) {
		$client = Cliente::find($id);
		$listado = Tipoarchivo::all();
		$listadoc = Tipocredito::all();
		$credits = Credito::where('cliente_id','=',$id)->orderby('id','DESC')->paginate(4);
		$credits->each(function($credits){
            $credits->tipocredito;
        });
		$pdfs = Archivo::where('cliente_id','=',$id)->get();
		$pdfs->each(function($pdfs){
            $pdfs->tipoarchivo;
        });
		// dd($pdfs);
		return view('client.show')
		->with('list',$listado)
		->with('listc',$listadoc)
		->with('pdfs',$pdfs)
		->with('credits',$credits)
		->with('infoClient',$client);
	}

	public function editClient(Request $request, $id)
	{
		$updClient = Cliente::find($id);
		$updClient->fill($request->all());
		$updClient->nombre = strtoupper($request->nombre);
		$updClient->apellido = strtoupper($request->apellido);
        $updClient->save();

        alert()->success('Se actualizo '.$updClient->documento.' correcamente','¡ACTUALIZADO!');
        
        return redirect()->route('cliente.show',$id);
	}

    public function addClient (ClienteRequest $request) {

		$documento = $this->confirmDocument($request->tipo,$request->documento);

        $query = Cliente::where('documento','=',$documento)->first();

        if ($query) {
            alert()->warning('El cliente '.$documento.' ya esta registrado','¡ADVERTENCIA!')->autoclose(5000);
            // return redirect()->getUrlGenerator()->previous();
        }else{
        
        $addClient = new Cliente($request->all());
        $addClient->nombre = strtoupper($request->nombre);
        $addClient->apellido = strtoupper($request->apellido);
        $addClient->documento = $documento;
        $addClient->save();

        alert()->success('Se registro '.$request->nombre.' '.$request->apellido.' correcamente','REGISTRADO')->autoclose(5000);
    	}

    	return redirect()->route('home');
    }

    public function addPdf (PdfRequest $request, $id)
    {
    	//Manipulacion de pdf
        $file = $request->file('archivo');
        $namepdf = 'gac_'.$request->documento.'_'.date('Y-m-d').'_'.time().'.'.$file->clientExtension();
        $path = $request->file('archivo')->storeAs('public/'.$request->documento, $namepdf);
    	//fin Manipulacion de pdf
    	//validar si existe el tipo de archivo
		$query_pdf = Archivo::where('cliente_id','=',$id)->where('tipoarchivo_id','=',$request->tipo)->first();

		if ($query_pdf) {
			$query_pdf->nombre = $namepdf;
			$query_pdf->save();

			alert()->success('Se actualizo el archivo correcamente','ACTUALIZADO')->autoclose(5000);
		}else{
			$archivo = new Archivo($request->all());
	    	$archivo->tipoarchivo_id = $request->tipo;
	    	$archivo->cliente_id = $id;
	    	$archivo->nombre = $namepdf;
	    	$archivo->save();

	    	alert()->success('Se registro el archivo correcamente','REGISTRADO')->autoclose(5000);
		}
    	//fin validar si existe el tipo de archivo

    	return redirect()->route('cliente.show',$id);
    }

    public function addCredit (Request $request, $id)
    {
    	// dd($request->all());
    	$addCredit = new Credito($request->all());
    	$addCredit->cliente_id = $id;
    	$addCredit->tipocredito_id = $request->tipo;
    	$addCredit->save();

    	alert()->success('Se registro el credito correcamente','REGISTRADO')->autoclose(5000);
    	return redirect()->route('cliente.show',$id);
    }

    public function updCredit($id)
    {
        
        $updCredit = Credito::find($id);

        if ($updCredit->vigente == 'SI') {
            $updCredit->vigente = 'NO';
        }else{
            $updCredit->vigente = 'SI';
        }

        $updCredit->save();

        alert()->success('El credito se actualizo correcamente','ACTUALIZADO')->autoclose(5000);
        return redirect()->route('cliente.show',$updCredit->cliente_id);
    }

    public function confirmDocument($tipo, $documento)
    {
    	if ($tipo == 'ce' || $tipo == 'pp' || $tipo == 'nit') {
            $doc = $tipo.$documento;
        }else{
            $doc = $documento;
        }

        return $doc;
    }
}