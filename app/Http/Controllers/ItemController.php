<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;          //carbon tallentaa uuden ajan
use Illuminate\Support\Facades\Auth;    //auth jotta saadaan kirjautuneen käyttäjän id muuttujaan
use Illuminate\Support\Facades\DB;      //Query builder


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $id = Auth::id();                        //kirjautuneen käyttäjän id muuttujaan
        
        $results = DB::table('items')
        ->where('user_id', $id)                 //Missä user_id on käyttäjän id
        ->orderBy('items.id', 'DESC')           //Järjestyksessä uusin esin
        ->get();        

  

        #Tekee Tyhjän rivin todo listalle ja tulee unshift errori tulee kun tehdään uusi tehtävä
        /* if($results->isEmpty()) {
            return response(['message' => 'Tehtäviä ei ole.']);
        } else {
            return $results;
        } */
      
        //Postman palauttaa tyhjän arrayn, jos ei ole tehtäviä
        return $results;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id = Auth::id(); 
        $newItem = new Item;    //Uuden tehtävän tallennus
        
        $newItem->name = $request->name;
        $newItem->highpriority = $request->highpriority;
        $newItem->user_id = $id;
        
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existing = Item::find($id);

        if($existing) {
            #jos tämän id:en completed on false
            if($existing->completed == false){  
                $existing->completed = $request->completed = true;              //Laita completed true       
                $existing->completed_at = $request->completed = Carbon::now();  //Laita completed_at tämän hetkinen aika
            }   else {  
                $existing->completed = $request->completed = false;      //laita completed false
                $existing->completed_at = $request->completed = null;   //Tyhjennä completed_at
            }
            $existing->save();
            return $existing;
        }


        return "Tehtävää ei löytynyt.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing = Item::find($id); //Etsi tämä id

        if($existing){    //jos löyty
            $existing->delete();    //poista

            return 'Tehtävä poistettu onnistuneesti.';
        }
        return "Tehtävää ei löytynyt.";
    }
}
